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
        var response = requestDataFromSever(accountUsernameValidationRoute,requestMethod,formData);
        showMessage(response.isUsernameValid,"USERNAME_VALIDATION_ERROR",'.usernamemessage');
    });

    $('.password').change(function(){
        var accountPasswordValidationRoute = $('.password').attr('data-action');
        var formData  = createFormData(null,['password'],[$(".password").val()]);
        var response = requestDataFromSever(accountPasswordValidationRoute,requestMethod,formData);
        showMessage(response.isPasswordValid,"PASSWORD_VALIDATION_ERROR",'.passwordmessage');
    });

    // login , register call
    $("#loginform").submit(function(e){
        e.preventDefault();
        var accountLoginRoute = $('#loginform').attr('data-action');
        var formData  = createFormData($("#loginform")[0],['action'],['login']);
        var response = requestDataFromSever(accountLoginRoute,requestMethod,formData);
        if(response.content != null){
            window.location.href = $('#dbroute').attr('data-action');;
        }
    });//end of loginformsubmit
});
