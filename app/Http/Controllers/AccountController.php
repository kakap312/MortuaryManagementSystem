<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Account\data\db\dao\AccountDao;
use App\Account\data\AccountRepositoryImp;
use App\Account\domain\validators\PasswordValidation;
use App\Account\domain\validators\UsernameValidation;
use App\Account\presentation\AccountViewModel;
use App\Account\presentation\model\AccountLoginUiModel;
use App\Account\domain\factory\AccountFactory;
use App\Account\domain\validators\AccountFieldValidator;


class AccountController extends Controller
{
    private $accountFieldValidator;
    private $accountRepositoryImp;
    //

    public function __construct(){
        $this->accountRepositoryImp = new AccountRepositoryImp();
    }
    function renderAccountView(){
        return view('accountview.account');
    }
    function accountLogin(Request $req){
        $savedAccountInfo = AccountFactory::makeSavedAccountInfo($req);
        $accountResult = $this->accountRepositoryImp->Login($savedAccountInfo);
        if(!is_null($accountResult->getData())){
            Session::put("username",$savedAccountInfo->getUserName());
            Session::put("usertype", $savedAccountInfo->getAccountType());
            return response()->json(AccountViewModel::mapOfSuccess($accountResult->getSuccess()));
        }else{
            return response()->json(AccountViewModel::mapOfSuccess($accountResult->getSuccess()));
        }
    }
    function isAccountFound($username){
        $result =  $this->accountRepositoryImp->fetchAccount($username); 
        return $result->getSuccess();
    }
    function validateUsername(Request $req){
        $savedAccountInfo = AccountFactory::makeSavedAccountInfo($req);
        $isUsernameValid = UsernameValidation::validate($savedAccountInfo->getUserName());
        return response()->json((AccountViewModel::mapOfUsernameValidator($isUsernameValid)));
    }
    function validatePassword(Request $req){
        $savedAccountInfo = AccountFactory::makeSavedAccountInfo($req);
        $isPasswordValid = UsernameValidation::validate($savedAccountInfo->getPassword());
        return response()->json((AccountViewModel::mapOfUsernameValidator($isPasswordValid)));
    }
    function accountType(){
        return  response()->json((AccountViewModel::mapOfAccoubtType(Session::get("usertype")))); ;
    }
    function createAccount(Request $req){
        $savedAccountInfo = AccountFactory::makeSavedAccountInfo($req);
        $this->accountFieldValidator = new AccountFieldValidator($savedAccountInfo);
        if($this->accountFieldValidator->isAllFieldValid()){
            if(self::isAccountFound($savedAccountInfo->getUserName())){
                $accountResult = $this->accountRepositoryImp->createAccount($savedAccountInfo);
                if($accountResult->getSuccess()){
                    return response()->json(AccountViewModel::mapOfSuccess($accountResult->getData()));
                }else{
                    return response()->json(AccountViewModel::mapOfSuccess($accountResult->getData()));
                }
            }else{
                return response()->json(AccountViewModel::mapOfAccountExisting(self::isAccountFound($savedAccountInfo->getUsername())));
            }
            
        }else{
            return response()->json(AccountViewModel::mapOfValidation($this->accountFieldValidator->mapOfFieldValidation()));
        }

    }
}
