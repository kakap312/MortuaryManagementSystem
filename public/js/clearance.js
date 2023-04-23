import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var corpse;
var clearance;
var clearanceId;

$(document).ready(function(){

    fetchClearance();

$('#clearacnelink').click(function(){
    showOrHideSection('.addclearancesection');
    $('#createclearanceform').reset();
    
    $('.corpseregistrationtext').html('');
    $('.billinfinstruction').html('');
    $('.corpseregistrationtext').html('Clearance  Form');
    $('.billinfinstruction').html('Complete the form below to clear a  corpse');
    $('#clearcorpsebtn').html('Update Clearance');
})
$('.printbtn').click(function(){
    var option = {
        mode:"popup" , //printable window is either iframe or browser popup
        popHt: 500 ,  // popup window height
        popWd: 400,  // popup window width
        popX: 500  , // popup window screen X position
        popY: 600,  //popup window screen Y position
        popTitle:"", // popup window title element
        popClose: false,  // popup window close after printing
        strict: false // strict or looseTransitional html 4.01 document standard or undefined to not include at all only for popup option
     }
     $('.clearancecontent').printArea( option );
})

$('#viewclearancelink').click(function(){
    fetchClearance();
    showOrHideSection('.viewclearancesection');
    populateClearanceView();
});

$('.corpseCode').change(function(){
    $('#clearcorpsebtn').attr('disabled',true);
    var corpseId = $('.corpseCode').val();
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
$('.clearcorpsebtn').click(function(){
    var state = $('.clearcorpsebtn').html();
    if(state == "Add Clearance"){
        if(confirm(stringValue("CLEAR_CORPSE_CONFIRMATION"))){
            var ClearcorpseURL = $('#createclearanceform').attr('data-action');
            var response = requestData(ClearcorpseURL,"POST",createFormData($("#createclearanceform")[0],[''],['']));
            if(response.success){
                showMessage(response.success,"CORPSE_CLEARED_SUCCESS",null,true);
                resetForm('#createclearanceform');
            }else if(response.isExisting){
                showMessage(response.success,"CORPSE_CLEARED_ERROR",null,true);
            }else if(response.outsandingamount > 0){
                alert("Sorry!, You have an oustanding amount of " + " GHC " + parseInt(response.outsandingamount ).toFixed(2) + " to pay.");
            }else{
                showErrorMessage(response.validationresult);
            }
        }
    }else if(state == 'Update Clearance'){
        if(confirm(stringValue("CLEAR_CORPSE_CONFIRMATION"))){
            var updateURL = $('#updateclearance').attr('data-action')
            var response = requestData(updateURL,"POST",createFormData($("#createclearanceform")[0],['id'],[clearanceId])); 
            if(response.success){
                showMessage(response.success,"CORPSE_CLEARED_SUCCESS",null,true);
               
            }else{
                showErrorMessage(response.validationresult)
            }
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
        clearance.forEach(clear => {
            viewCorpseInformation(clear,position)
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
        clearance.corpseCode +"</td><td>"+
        clearance.state +"</td>"+
        "<td><select class='choose form-control'><option disabled selected>choose</option><option>Update</option><option>Details</option></select></td></tr>"
        )

        $('.choose').change(function(){
            if(($(this).val() == "Update")){
                showOrHideSection('.addclearancesection');
                $('#clearcorpsebtn').html('Update Clearance');
                var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
                clearanceId = getClearanceIdByName(currentCorpIndexNumber);
                populatClearanceForm(clearance);
            }else if(($(this).val() == "Details")){
                showOrHideSection('.clearancedetailsection');
                var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
                populateCorpDetail(clearance);
            }
        });
}
function populateCorpDetail(data){
    $('.date').html(new Date().toISOString().slice(0,10))
    $('.clearanceId').html(data.id);
    $('.corpseId').html(data.corpseCode);
    $('.Status').html(data.state == "true"?'Cleared':'Not Cleared');

}
function getClearanceIdByName(index){
    var id=clearance[index].id;
    return id;
}
function populatClearanceForm(data){
    $('.corpseregistrationtext').html('');
    $('.billinfinstruction').html('');
    $('.corpseregistrationtext').html('Clearance Update Form');
    $('.billinfinstruction').html('Complete the form below to update corpse clearance');
    $('.datecreated').val(data.date);
    $('.corpseCode').val(data.corpseCode);
    (data.state)?$('.state').val('true'):$('.state').val('false');

}

