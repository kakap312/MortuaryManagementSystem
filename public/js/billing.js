import {requestDataFromSever,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var services;
var corpse;
$(document).ready(function(){
    services = fetchServices();
    populateServices(services);

    $('#addbilling').attr('disabled',true);
    $('.js-example-basic-multiple').select2({
        allowClear:true,
        placeholder:"Select Services"
    });
    $("#addbillinglink").click(function(){
        showOrHideSection('.addbillingsection');
    });
    $('#viewbillinglink').click(function() {
        showOrHideSection('.viewbillingsection');
    });
    $('#corpseId').change(function(){
        $('#addbilling').attr('disabled',true);
        var corpseId = $('#corpseId').val();
        if(corpseId.length == 13){
            var searchCorpUrl = $('.searchcorp').attr('data-action');
            var response = requestDataFromSever(searchCorpUrl,"POST",createFormData(null,['corpId'],[corpseId]));
            if(response.corps != null){
                $('#corpseIdError').hide();
                corpse = response.corps;
                $('#addbilling').attr('disabled',false);
            }else{
                $('#corpseIdError').show();
                clearForm();
            }    
        }else{
            $('#corpseIdError').show()
            clearForm();
        }
    })

    $('#services').change(function(){
        var serviceNames = $('#services').val();
        var dueAmount = calculateBillSubTotal(getServiceFees(services,serviceNames),corpse.dueDays);
        var extraAmount = calculateBillSubTotal(getServiceFees(services,serviceNames),corpse.extraDays);
        var subTotal = dueAmount + extraAmount;
        $('#duedays').val(parseInt(dueAmount).toFixed(2));
        $('#extradays').val(parseInt(extraAmount).toFixed(2))
        $('#subtotal').val(parseInt(subTotal).toFixed(2));
    })
    $('#addbilling').click(function() {

        if(confirm(stringValue("CREATE_BILLING_CONFIRMATION"))){
            var createBillingURL = $('#createbillingform').attr('data-action');
            var serviceIds = getServiceIds(services,$('#services').val());
            var response = requestDataFromSever(createBillingURL,"POST",createFormData($("#createbillingform")[0],['serviceIds','amount'],[serviceIds,$('#subtotal').val()]));
            if(response.success){
                showMessage(response.success,"BILL_CREATION_SUCCESS",null,true);
                clearForm();
            }
            console.log(response.success)
        }
        });


}); // end of $(document).ready function
function fetchServices() {
var serviceUrl = $('#fetchservices').attr('data-action'); 
var response = requestDataFromSever(serviceUrl,"GET",createFormData(null,[''],['']));
return response.services; 
}
function clearForm() {
    $('#subtotal').val("");
    $('#duedays').val("");
    $('#extradays').val("");
    $('#services').val("").trigger('change');
}
function  populateServices(services) {
    if(services.lenght != 0){
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
    var subTotal=0;
    serviceFees.forEach(fee=>{
        subTotal += fee*days;
    });
    return subTotal;
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