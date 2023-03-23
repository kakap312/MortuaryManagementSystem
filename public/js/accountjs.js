import {requestDataFromSever,createFormData,showMessage} from '../js/library.js';

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
        requestDataFromSever(accountUsernameValidationRoute,requestMethod,formData).
        then((data)=>{
            showMessage(data.isUsernameValid,"USERNAME_VALIDATION_ERROR",'.usernamemessage');
        })
        
    });

    $('.password').change(function(){
        var accountPasswordValidationRoute = $('.password').attr('data-action');
        var formData  = createFormData(null,['password'],[$(".password").val()]);
        requestDataFromSever(accountPasswordValidationRoute,requestMethod,formData).
        then((data)=>{
            showMessage(data.isPasswordValid,"PASSWORD_VALIDATION_ERROR",'.passwordmessage');
        });
        
    });

    // login , register call
    $("#loginform").submit(function(e){
        e.preventDefault();
        var accountLoginRoute = $('#loginform').attr('data-action');
        var formData  = createFormData($("#loginform")[0],['action'],['login']);
        requestDataFromSever(accountLoginRoute,requestMethod,formData).
        then((data)=>{
            if(data.content.length == 1){
                window.location.href = $('#dbroute').attr('data-action');
            }else{
                showMessage(data.isAccountFound,"ACCOUNT_NOT_FOUND","",true);
            }
        })
        
    });//end of loginformsubmit
});
