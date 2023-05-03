import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from '../js/library.js';
var accounttype;
var state;
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
    });

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
                }else{
                    showErrorMessage(response.validationresult)
                }
            }
        }else if(state == "Update Billing"){
            if(confirm(stringValue("UPDATE_BILLING_CONFIRMATION"))){
                var updateBillingURL = $('.updateBillingUrl').attr('data-action');
                var serviceIds = getServiceIds($('#services').val());
                var bill = getBillById(billId)
                var dueDays = bill.dueDays;
                var extraDays = bill.extraDays;
                var response = requestData(updateBillingURL,"POST",createFormData($("#createbillingform")[0],['amount','extraDays','dueDays','serviceids','billId'],[$('.billsubtotal').val(),extraDays,dueDays,serviceIds,billId]));
                if(response.success){
                    showMessage(response.success,"BILL_UPDATE_SUCCESS",null,true);
                }else{
                    showErrorMessage(response.validationresult)
                }
            }
        }
    })
});

