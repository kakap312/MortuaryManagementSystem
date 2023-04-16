<?php
namespace App\Report\domain\factory;
use App\Report\domain\model\SavedReportInfo;

class ReportFactory{
    static function makeSavedReportInfo($request){
          return new SavedReportInfo(
            is_null($request->get('reporttype'))?"":$request->get('reporttype'),
            is_null($request->get('from'))?"":$request->get('from'),
            is_null($request->get('to'))?"":$request->get('to'),
          );
    }
}