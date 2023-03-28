

import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var services;
var corpse;
var bill;

$(document).ready(function(){
    fetchServices();
    populateServices();

    $('#addbilling').attr('disabled',true);
    $('.js-example-basic-multiple').select2({
        allowClear:true,
        placeholder:"Select Services"
    });
    $("#addbillinglink").click(function(){
        showOrHideSection('.addbillingsection');
        resetForm('#createbillingform');
    });
    $('#viewbillinglink').click(function() {
        showOrHideSection('.viewbillingsection');
    });
    $('#corpseId').change(function(){
        $('#addbilling').attr('disabled',true);
        var corpseId = $('#corpseId').val();
            var searchCorpUrl = $('.searchcorp').attr('data-action');
            var response = requestData(searchCorpUrl,"POST",createFormData(null,['corpId'],[corpseId]));
            if(response.corps != null){
                $('#corpseIdError').hide();
                corpse = response.corps;
                fetchBillByCorpseId(corpseId);
                $('#addbilling').attr('disabled',false);
            }else{
                $('#corpseIdError').show();
                clearForm();
            }    
    })

    $('#services').on('keypress keyup',function(){
        var serviceFee =(parseInt($('#services').val()) == null || parseInt($('#services').val()) == 0 )? 0:parseInt($('#services').val())
        if(bill == null){
            var dueAmount = calculateBillSubTotal(serviceFee,'due');
            var extraAmount = calculateBillSubTotal(serviceFee,'extra');
            var subTotal = dueAmount + extraAmount;
            $('#duedays').val(parseInt(dueAmount).toFixed(2));
            $('#extradays').val(parseInt(extraAmount).toFixed(2))
            $('#subtotal').val(parseInt(subTotal).toFixed(2));
        }else{
            // loop through the bills and then find the difference between their extra value and the corpse extra value 
            var dueAmount = calculateBillSubTotal(serviceFee,'due');
            var extraAmount = calculateBillSubTotal(serviceFee,'extra');
            var subTotal = dueAmount + extraAmount;
            $('#duedays').val(parseInt(dueAmount).toFixed(2));
            $('#extradays').val(parseInt(extraAmount).toFixed(2))
            $('#subtotal').val(parseInt(subTotal).toFixed(2));
           
        }

       
    })
    $('#addbilling').click(function() {
        if(confirm(stringValue("CREATE_BILLING_CONFIRMATION"))){
            var createBillingURL = $('#createbillingform').attr('data-action');
            var serviceIds = getServiceIds(services,$('#services').val());
            var dueDays = 0;
            var extraDays = 0;
            if(bill == null){
                dueDays = corpse.dueDays;
                extraDays = corpse.extraDays;
            }
            var response = requestDataFromSever(createBillingURL,"POST",createFormData($("#createbillingform")[0],['serviceIds','amount','extraDays','dueDays'],[serviceIds,$('#subtotal').val(),extraDays,dueDays]));
            if(response.success){
                showMessage(response.success,"BILL_CREATION_SUCCESS",null,true);
                clearForm();
            }
            console.log(response.success)
        }
        });


}); // end of $(document).ready function
function fetchBillByCorpseId(id){
    var serviceUrl = 'userdashboard/viewbillingsbycorpsid'; 
var response = requestData(serviceUrl,"POST",createFormData(null,['corpseId'],[id]));
bill = response.bill;
}
function fetchServices() {
var serviceUrl = 'userdashboard/fetchservices'; 
var response = requestData(serviceUrl,"GET",createFormData(null,[''],['']));
services = response.services;
}
function clearForm() {
    $('#subtotal').val("");
    $('#duedays').val("");
    $('#extradays').val("");
    $('#services').val("").trigger('change');
}
function  populateServices() {
    if(services.length != 0){
        services.forEach(service=>{
            $('#services').append('<option>'+service.name+'</option>');
        })
    }
}
function populateDueDays(days){
    
}
function populateExtraDays(days){
    (days)<0 ?$('#extradays').val(0):$('#extradays').val(days);
    ;
}
function  calculateBillSubTotal(serviceFees,days) {
    var sumOfExtra = 0;
    var sumOfDueDays = 0;
    var subTotal = 0;
    var remainingDays = 0;
    if(bill != null){
        bill.forEach(bil=>{
            sumOfExtra += bil.extraDays;
            sumOfDueDays += bil.dueDays;
        });
    }
    if(days == "extra"){
        remainingDays = corpse.extraDays - sumOfExtra;
        console.log(corpse.extraDays);
        subTotal = serviceFees * remainingDays;
        return subTotal;
    }else if(days =="due"){
        remainingDays =  corpse.dueDays - sumOfDueDays;
        console.log(corpse.extraDays);
        subTotal = serviceFees*remainingDays;
        return subTotal;
    } 
    //(remainingDays == 0 || remainingDays == 0)? $('#addbilling').attr('disabled',true): $('#addbilling').attr('disabled',false);  
}
function getServiceFees(services,serviceNames) {
    var serviceFees = [];
    serviceNames.forEach(serviceName=>{
        services.forEach(service=>{
            if(service.name == serviceName){
                serviceFees.push(service.fee);
            }
        })
    })
    return serviceFees;
}
function getServiceIds(services,serviceNames) {
    var serviceids = [];
    serviceNames.forEach(serviceName=>{
        services.forEach(service=>{
            if(service.name == serviceName){
                serviceids.push(service.id);
            }
        })
    })
    return serviceids;
}