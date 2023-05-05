import {requestData,createFormData,showMessage,showOrHideSection,stringValue,getActionMenu,resetForm} from '../js/library.js';
var accounttype;
var accounts;
var state;
var accountId;
$(document).ready(function(){
    
    var requestMethod = "POST";
    $(".password-eye").click(function(){
        var typeValue = $('.password').attr('type') === 'password' ? 'text' : 'password';
        $('.password').attr('type',typeValue);
    });

    // validation call
    $("#username").change(function(){
        var accountUsernameValidationRoute = $('#username').attr('data-action');
        var formData = createFormData(null,['username'],[$("#username").val()]);
        var response = requestData(accountUsernameValidationRoute,requestMethod,formData);
        if(!response.isUsernameValid){
            showMessage(response.isUsernameValid,"USERNAME_VALIDATION_ERROR",'',true);
        }
        
    });
    $("#adduserlink").click(function(){
        showOrHideSection('.addaccountsection');
        resetForm('#createaccountform');
    });
    $('#viewaccountlink').click(function(){
        fetchAccount();
        showOrHideSection('.viewaccountsection');
        populateAccountView();
    })

    $('.password').change(function(){
        var accountPasswordValidationRoute = $('.password').attr('data-action');
        var formData = createFormData(null,['password'],[$(".password").val()]);
        var response = requestData(accountPasswordValidationRoute,requestMethod,formData);
        if(!response.isUsernameValid){
            showMessage(response.isPasswordValid,"PASSWORD_VALIDATION_ERROR",'',true); 
        }
        
    });

    // login , register call
    $("#loginform").submit(function(e){
        e.preventDefault();
        var accountLoginRoute = $('#loginform').attr('data-action');
       var formData = createFormData($("#loginform")[0],['action'],['login']);
       var response =  requestData(accountLoginRoute,requestMethod,formData);
        if(response.success){
            window.location.href = $('#dashboardroute').attr('data-action');
            windows.acctype = ($('.type').val());
        }else{
            showMessage(response.isAccountFound,"ACCOUNT_NOT_FOUND","",true);
        }
        
    });//end of loginformsubmit

    $('.createaccountbtn').click(function(){
        state = $('.createaccountbtn').html();
        if(state == "Add Account"){
            if(confirm(stringValue("CREATE_ACCOUNT_CONFIRMATION"))){
                var createBillingURL = $('#createaccountform').attr('data-action');
                var response = requestData(createBillingURL,"POST",createFormData($("#createaccountform")[0],[''],['']));
                if(response.success){
                    showMessage(response.success,"ACCOUNT_CREATION_SUCCESS",null,true);
                    resetForm('#createaccountform');
                }else if(response.isExisting){
                    showMessage(response.isExisting,"USERNAME_TAKEN",null,true);
                }else{
                    showErrorMessage(response.validationresult)
                }
            }
        }else if(state == "Update Account"){
            if(confirm(stringValue("UPDATE_ACCOUNT_CONFIRMATION"))){
                var updateAccountURL = $('.updateaccount').attr('data-action');
                var response = requestData(updateAccountURL,"POST",createFormData($("#createaccountform")[0],['accountId'],[accountId]));
                if(response.success){
                    showMessage(response.success,"ACCOUNT_UPDATE_SUCCESS",null,true);
                }else{
                    showErrorMessage(response.validationresult)
                }
            }
        }
    })
});
function showErrorMessage(validationresult){
    if(validationresult == null){
        $('.dateerror').hide();
        $('.usernameerror').hide();
        $('.passworderror').hide();
        $('.privillege').hide();
    }

}
 function fetchAccount (){
    var accountUrl = $('.viewaccountsection').attr("data-action");
    var response = requestData(accountUrl,"GET",createFormData(null,[''],['']));
        if(response.account != null){
            accounts = response.account
        }

}
function populateAccountView(){
$('.displayNumber').html(accounts.length);
    $('.totalNumber').html((accounts.length));
    $('.datarow').remove();
    // $('#displayNumber').html(corps.length);
    // $('#totalNumber').html(totalCorpse);
    var position = 0;
    if(accounts.length >= 1 ){
        accounts.forEach(account => {
            viewAccountInformation(account,position)
            position++;
        });
    }
    else{
        showMessage("" ,"CORP_NOT_FOUND",null,true);
    }
}
function viewAccountInformation(account,position) {
    $('.accountviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        account.date +"</td><td>"+
        account.username +"</td><td>"+
        account.password +"</td><td>"+
        account.accountType +"</td>"+
        getActionMenu()
        )

 
    $('.choose').change(function(){
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete this Bill")){
                var deleteBillUrl = $('#deletebill').attr('data-action');
                console.log(parseInt($(this).parent().siblings('.sn').html())-1)
                billId = getBillId(parseInt($(this).parent().siblings('.sn').html())-1);
              var  response = requestData(deleteBillUrl,"POST",createFormData(null,['billId'],[billId]));
              if(response.success){
                showMessage(response.success,"DELETE_SUCCESS",null,true);
                populateBillView();
            }
        }
        }else if(($(this).val() == "Details")){
            showOrHideSection('.accountdetailssection');
            var currentIndexOfBill = parseInt($(this).parent().siblings('.sn').html())-1;
            populateAccountDetail(currentIndexOfBill);
        }else if (($(this).val() == "Update")){
            showOrHideSection('.addaccountsection');
            $('.createaccountbtn').html('Update Account');
            state = $('#createaccountbtn').html();
            $('.accountregistrationtext').html("Update Account")
            $('.accountinstruction').html('Complete the form below to update this Account.');
            accountId = getAccountId(parseInt($(this).parent().siblings('.sn').html())-1);
           account = getAccountById(accountId)
            var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
            populateAccountForm(accounts[currentCorpIndexNumber]);
        }
    });
}
function populateAccountForm(account){
    resetForm('#createaccountform');
    $('.datecreated').val(account.date);
    $('.username').val(account.username)
    $('.password').val(account.password)
    $('.previllege').val(account.accountType)
   

}
function getAccountId(index){
    return  accounts[index].id;
}
function populateAccountDetail(index){
    fetchAccount();
        $('.date').html(new Date().toISOString().slice(0,10))
            $('.accountid').html(accounts[index].id)  
            $('.username').html(accounts[index].username)
            $('.password').html(accounts[index].password)
            $('.accounttype').html(accounts[index].accountType)
}
function getAccountById(id){
    var currentAccount;
    accounts.forEach(account => {
        if(account.id == id){
            currentAccount = account
        }
    });
    return currentAccount;
}

