import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var corpse;
var clearance;

$(document).ready(function(){

    fetchClearance();

$('#clearacnelink').click(function(){
    showOrHideSection('.addclearancesection');
    $('#createclearanceform').reset();
})

$('#viewclearancelink').click(function(){
    showOrHideSection('.viewclearancesection');
    populateClearanceView();
});

$('.corpseCode').change(function(){
    $('#clearcorpsebtn').attr('disabled',true);
    var corpseId = $('.corpseCode').val();
    alert(corpseId)
        var searchCorpUrl = $('.searchcorp').attr('data-action');
        var response = requestData(searchCorpUrl,"POST",createFormData(null,['corpId'],[corpseId]));
        if(response.corps != null){
            $('.corpseIdError').hide();
            corpse = response.corps;
            $('#clearcorpsebtn').attr('disabled',false);
        }else{
            $('.corpseIdError').show();
        }    
})
$('.searchclearancebtn').click(function(){
    var searchCorpUrl = $('.searchclearancebtn').attr('data-action');
    var response = requestData(searchCorpUrl,"POST",createFormData(null,['id'],[$('.searchClearance').val()]));
    if(response.clearance == null){
        showMessage(true,"CORP_NOT_FOUND",null,true)
    }else{
        clearance = [response.clearance];
        populateClearanceView();
    }
    $('.searchcorp').val("");
});
$('#clearcorpsebtn').click(function(){
    if(confirm(stringValue("CLEAR_CORPSE_CONFIRMATION"))){
        var ClearcorpseURL = $('#createclearanceform').attr('data-action');
        var response = requestData(ClearcorpseURL,"POST",createFormData($("#createclearanceform")[0],[''],['']));
        if(response.success){
            showMessage(response.success,"CORPSE_CLEARED_SUCCESS",null,true);
            resetForm('#createbillingform');
        }else if(response.isExisting){
            showMessage(response.success,"CORPSE_CLEARED_ERROR",null,true);
        }else if(response.outsandingamount > 0){
            alert("Sorry!, You have an oustanding amount of " + " GHC " + parseInt(response.outsandingamount ).toFixed(2) + " to pay.");
        }else{
            showErrorMessage(response.validationresult)
        }
    }
})
})

function showErrorMessage(validation){
    (validation.isDateValid)?$('.dateerror').hide():$('.dateerror').show();
    (validation.isCorpseIdValid)?$('.corpseIdError').hide():$('.corpseIdError').show();
    (validation.isStateValid)?$('#stateerror').hide():$('#stateerror').show();
}
function fetchClearance(){
    var clearanceUrl =  $('.viewclearancesection').attr('data-action');
    var response = requestData(clearanceUrl,"GET",createFormData(null,[''],['']));
    clearance = response.clearance;
}
function populateClearanceView(){
    $('.displayNumber').html(clearance.length);
    $('.totalNumber').html((clearance.length));
    $('.datarow').remove();
    // $('#displayNumber').html(corps.length);
    // $('#totalNumber').html(totalCorpse);
    var position = 0;
    if(clearance.length >= 1 ){
        clearance.forEach(clearance => {
            viewCorpseInformation(clearance,position)
            position++;
        });
    }
    else{
        showMessage("" ,"CORP_NOT_FOUND",null,true);
    }
}
function viewCorpseInformation(clearance,position) {
    $('.billsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        clearance.date +"</td><td>"+
        clearance.id +"</td><td>"+
        clearance.state +"</td>"+
        "<td><select class='choose form-control'><option disabled selected>choose</option><option>Delete</option></select></td></tr>"
        )
}

