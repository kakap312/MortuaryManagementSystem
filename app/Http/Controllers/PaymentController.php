<?php

namespace App\Http\Controllers;
use App\payment\domain\factory\PaymentFactory;
use App\payment\domain\validation\PaymentFieldValidation;
use App\payment\presentation\PaymentViewModel;
use App\payment\domain\factory\RepositoryImpFactory;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    private $repositoryFactoryImp;

    public function __construct(){
        $this->repositoryFactoryImp = new RepositoryImpFactory();
    }

    

    public function createPayment(){
        // validateInputs
        //maps domain to db model
        //insert data into database
        $savedPaymentInfo = PaymentFactory::makeSavedPaymentInfo();
        $validationResult = new PaymentFieldValidation($savedPaymentInfo);
        if($validationResult->isAllFieldsValid()){
            $result = $this->repositoryFactoryImp->makePaymentRepositoryImp()->makePayment($savedPaymentInfo);
            return response()->json(PaymentViewModel::mapOfSuccess($result->getSuccess()));
        }else{
            response()->json(PaymentViewModel::mapOfValidation($validationResult->mapOfFieldValidation()));
        }
    }
}
