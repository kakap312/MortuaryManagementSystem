<?php
namespace App\Report\presentation\mappers;
use App\Report\presentation\model\UiFinancialReport;
class DomainToFinancialReportUiMapper{

    public static function map($corpse,$totalDays,$amountPaid,$amountDue,$totalAmountDue,$totalAmountPaid){
        
        return new UiFinancialReport(
            $corpse->getCorpseCode(),
            $corpse->getName(),
            $corpse->getAdmissionDate(),
            $corpse->getCollectionDate(),
            $corpse->getCategory(),
            $totalDays,
            $amountPaid,
            $amountDue,
            ($amountDue - $amountPaid),
            $totalAmountDue,
            $totalAmountPaid
        );
       
    }
}