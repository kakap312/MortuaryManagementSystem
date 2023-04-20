<?php
namespace App\Report\presentation\model;
class UiFinancialReport{
    public $corpseCode;
    public $corpseName;
    public $admissionDate;
    public $dischargeDate;
    public $serviceType;
    public $totalNumberOfDays;// extra Days + due Days
    public $amountPaid;
    public $amountDue;
    public $outstandingAmount;
    public $totalAmountDue;
    public $subtotal; // amountAmountPaid

    public function __construct(
        $corpseCode,
        $corpseName,
        $admissionDate,
        $dischargeDate,
        $serviceType,
        $totalNumberOfDays,
        $amountPaid,
        $amountDue,
        $outstandingAmount
        )
        {
            $this->corpseCode = $corpseCode ;
            $this->corpseName = $corpseName;
            $this->admissionDate = $admissionDate;
            $this->dischargeDate = $dischargeDate;
            $this->serviceType = $serviceType;
            $this->totalNumberOfDays = $totalNumberOfDays;
            $this->amountPaid = $amountPaid;
            $this->amountDue = $amountDue;
            $this->outstandingAmount = $outstandingAmount;

        }
}
