<?php
namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Account\data\db\dao\AccountDao;
use App\Account\data\AccountRepositoryImp;
use App\Account\domain\validators\PasswordValidation;
use App\Account\domain\validators\UsernameValidation;
use App\Account\presentation\AccountViewModel;


class AccountController extends Controller
{
    //
    function renderAccountView(){
        return view('accountview.account');
    }
    function accountLogin(Request $req){

        $result = (new AccountRepositoryImp())->Login($req->get('username'),$req->get('password'));
        if(is_null($result->getData())){
            $accountViewModel = new AccountViewModel(false,false,false,null);
            return response()->json(json_decode(json_encode($accountViewModel),true));
        }else{
            $accountViewModel = new AccountViewModel(false,false,false,$result->getData());
            Session::put("username",$req->get('username'));
            return response()->json(json_decode(json_encode($accountViewModel),true));

        }
    }
    function validateUsername(Request $req){
        $accountViewModel = new AccountViewModel(
            UsernameValidation::validate($req->get('username')),false,false,null);
        return response()->json(json_decode(json_encode($accountViewModel),true));
    }
    function validatePassword(Request $req){
        $accountViewModel = new AccountViewModel(false,PasswordValidation::validate($req->get('password')),false,null);
        return response()->json(json_decode(json_encode($accountViewModel),true));
    }
}
