<?php
namespace App\Report\presentation\mappers;
use App\Report\presentation\model\UiFinancialReport;
class DomainToFinancialReportUiMapper{

    public static function map($corpse,$dischargeDate,$totalDays,$amountPaid,$amountDue){
        
        return new UiFinancialReport(
            $corpse->getCorpseCode(),
            $corpse->getName(),
            $corpse->getAdmissionDate(),
            $dischargeDate,
            $corpse->getCategory(),
            $totalDays,
            $amountPaid,
            $amountDue,
            ($amountDue - $amountPaid)
            
        );
       
    }
}