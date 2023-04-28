import {requestData,createFormData,showMessage,setUserType} from '../js/library.js';
var accounttype;
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
});

