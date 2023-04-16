<?php
namespace App\Report\domain\model;

class SavedReportInfo{
    private $reportType;
    private $startDate;
    private $endDate;

    public function __construct($reportType, $startDate, $endDate){
        $this->reportType = $reportType;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function getReportType(){return $this->reportType;}
    public function getStartDate(){return $this->startDate;}
    public function getEndDate(){return $this->endDate;}
}