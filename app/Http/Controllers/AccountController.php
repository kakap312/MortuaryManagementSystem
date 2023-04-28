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


class AccountController extends Controller
{
    //
    function renderAccountView(){
        return view('accountview.account');
    }
    function accountLogin(Request $req){
        $savedAccountInfo = AccountFactory::makeSavedAccountInfo($req);
        $accountResult = (new AccountRepositoryImp())->Login($savedAccountInfo);
        if(!is_null($accountResult->getData())){
            Session::put("username",$savedAccountInfo->getUserName());
            Session::put("usertype", $savedAccountInfo->getAccountType());
            return response()->json(AccountViewModel::mapOfSuccess($accountResult->getSuccess()));
        }else{
            return response()->json(AccountViewModel::mapOfSuccess($accountResult->getSuccess()));
        }
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
}
