<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report\domain\factory\ReportFactory;
use App\Report\domain\validator\ReportFieldValidation;
use App\Corp\data\repository\CorpRepositoryImp;
use App\Clearance\data\factory\ClearanceRepositoryFactory;
use App\Report\presentation\MapOfUiModel;
use App\Report\presentation\mappers\DomainToCorpseReportUiMapper; 

class ReportController extends Controller
{
    //
    private $reportFieldValidator;
    private $clearanceRepositoryImpFactory;

    public function __construct(){
        $this->clearanceRepositoryImpFactory = new ClearanceRepositoryFactory();
    }

    public function makeReport(Request $req){
        $savedReportInfo = ReportFactory::makeSavedReportInfo($req);
        $reportType = $savedReportInfo->getReportType();
        //validate input
        $this->reportFieldValidator = new ReportFieldValidation($savedReportInfo);
        if($this->reportFieldValidator->isAllFieldValid()){
            if($reportType == "Financial"){
                //$uiFinancialReport = self::makeFinancialReport();
            }else if($reportType == "Corpse"){
                $uiCorpseReport = self::makeCorpseReport($savedReportInfo->getStartDate(),$savedReportInfo->getEndDate());
                return response()->json(MapOfUiModel::mapOfReport($uiCorpseReport));
            }
        }else{
            return response()->json(MapOfUiModel::mapofValidation($this->reportFieldValidator->mapOfFieldValidation()));
        }
       
    }
    public function makeFinancialReport($startDate,$endDate){
       
        //return a uifinancialreport
    }
    public function makeCorpseReport($startDate,$endDate){

        $corpse = CorpRepositoryImp::findCorpseByDate($startDate,$endDate);
        $totalNumberOfCorpseDischarged = $this->clearanceRepositoryImpFactory->getClearanceRepositoryImp()-> totalNumberOfClearance();
        $numberOfFemaleCorpse = CorpRepositoryImp::findCorpseByDateAndSex($startDate,$endDate,"F");
        $numberOfMaleCorpse =CorpRepositoryImp::findCorpseByDateAndSex($startDate,$endDate,"M");
        $uiCorpseReport = DomainToCorpseReportUiMapper::map($corpse,$totalNumberOfCorpseDischarged,$numberOfFemaleCorpse,$numberOfMaleCorpse);
        return $uiCorpseReport;
    }
}
