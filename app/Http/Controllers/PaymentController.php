<?php

namespace App\Http\Controllers;
use App\payment\domain\factory\PaymentFactory;
use App\payment\domain\validation\PaymentFieldValidation;
use App\payment\presentation\PaymentViewModel;
use App\payment\domain\factory\RepositoryImpFactory;
use App\Payment\presentation\mappers\DomainToUiPaymentMapper;
use App\Billing\data\repository\BillingRepositoryImp;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    private $repositoryFactoryImp;

    public function __construct(){
        $this->repositoryFactoryImp = new RepositoryImpFactory();
    }

    

    public function createPayment(Request $req){
        // validateInputs
        //maps domain to db model
        //insert data into database
        $savedPaymentInfo = PaymentFactory::makeSavedPaymentInfo($req);
        $validationResult = new PaymentFieldValidation($savedPaymentInfo);
        if($validationResult->isAllFieldsValid()){
            $result = $this->repositoryFactoryImp->makePaymentRepositoryImp()->makePayment($savedPaymentInfo);
            return response()->json(PaymentViewModel::mapOfSuccess($result->getSuccess()));
        }else{
            return response()->json(PaymentViewModel::mapOfValidation($validationResult->mapOfFieldValidation()));
        }
    }
    public function viewAllPayment(){
        $result = $this->repositoryFactoryImp->makePaymentRepositoryImp()->fetchAllPayment();
        if($result->getSuccess()){
            $payments = $result->getData();
            $uiPayments = array_map(function($payment){
                return DomainToUiPaymentMapper::map($payment);
            },$payments);
            return response()->json(PaymentViewModel::mapOfPayment($uiPayments));
        }else{
            return response()->json(PaymentViewModel::mapOfPayment($result->getData()));
        }
        
    }
    public function searchPayment(Request $req){
        $billingId = (new BillingRepositoryImp)->fetchBillingByCorpseId($req->get('id'))->getData()[0]->getId();
        $result = $this->repositoryFactoryImp->makePaymentRepositoryImp()->fetchPaymentById($billingId);
        if($result->getSuccess()){
            $payments = $result->getData();
            $uiPayments = array_map(function($payment){
                return DomainToUiPaymentMapper::map($payment);
            },$payments);
            return response()->json(PaymentViewModel::mapOfPayment($uiPayments));
        }else{
            return response()->json(PaymentViewModel::mapOfPayment($result->getSuccess()));
        }
    }
    public function erasePayment(Request $req){
        $result = $this->repositoryFactoryImp->makePaymentRepositoryImp()->deletePayment($req->get('id'));
        return ($result->getSuccess())?
        response()->json(PaymentViewModel::mapOfSuccess($result->getSuccess())):
        response()->json(PaymentViewModel::mapOfSuccess($result->getSuccess()));
        
    }
    public function correctPayment(Request $req){
        $savedPaymentInfo = PaymentFactory::makeSavedPaymentInfo($req);
        $validationResult = new PaymentFieldValidation($savedPaymentInfo);
        if($validationResult->isAllFieldsValid()){
            $result = $this->repositoryFactoryImp->makePaymentRepositoryImp()->updatePaymentById($savedPaymentInfo,$req->get('id'));
            return response()->json(PaymentViewModel::mapOfSuccess($result->getSuccess()));
        }else{
            return response()->json(PaymentViewModel::mapOfValidation($validationResult->mapOfFieldValidation()));
        }
    }
    
}
