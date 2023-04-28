import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';

$(document).ready(function(){

    $('#addservicelink').click(function(){
        showOrHideSection('.addservicesection');
    })
    $('#addservicebtn').click(function(){
        var state = $('.addservicebtn').html();
    if(state == "Add Service"){
        if(confirm(stringValue("CREATE_SERVICE_CONFIRMATION"))){
            var createserviceURL = $('#createserviceform').attr('data-action');
            var response = requestData(createserviceURL,"POST",createFormData($("#createserviceform")[0],[''],['']));
            if(response.success){
                showMessage(response.success,"SERVICE_CREATED_SUCCESS",null,true);
                resetForm('#createclearanceform');
            }else if(response.isExisting){
                showMessage(response.success,"SERVICE_CREATED_ERROR",null,true);
            }else{
                showErrorMessage(response.validationresult);
            }
        }
    }else if(state == "Update Service"){

    }

    })
    
})