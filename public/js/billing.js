

import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var services;
var corpse;
var bill;
var bills;
var billId;

$(document).ready(function(){
   // fetchServices();
   // populateServices();
    fetchAllBills()

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
        populateBillView();
        
    });
    $('.printbtn').click(function(){
        //printPageSection('#corpsecontent');
        $('.billcontent').printThis({
           importCSS:true,
           loadCSS:"/css/style.css",
           importStyle: true,
           base:"http://localhost/MortuaryManagementSystem/public/"
       });
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
    $('.searchbtn').click(function(){
        var searchBillUrl = $('.searchbtn').attr('data-action');
        var response = requestData(searchBillUrl,"POST",createFormData(null,['id'],[$('.searbill').val()]));
        if(response.bill == null){
            showMessage(true,"CORP_NOT_FOUND",null,true)
        }else{
            bill = response.bill;
            populateBillView(bill);
        }
        $('.searchcorp').val("");
    });
    

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
            //var serviceIds = getServiceIds(services,$('#services').val());
            var dueDays = 0;
            var extraDays = 0;
            if(bill == null){
                dueDays = corpse.dueDays;
                extraDays = corpse.extraDays;
            }
            var response = requestData(createBillingURL,"POST",createFormData($("#createbillingform")[0],['amount','extraDays','dueDays'],[$('#subtotal').val(),extraDays,dueDays]));
            if(response.success){
                showMessage(response.success,"BILL_CREATION_SUCCESS",null,true);
                resetForm('#createbillingform');
            }else{
                showErrorMessage(response.validationresult)
            }
        }
        });


}); // end of $(document).ready function
function fetchAllBills(){
    var serviceUrl = 'userdashboard/viewbillings'
    var response = requestData(serviceUrl,"POST",createFormData(null,[''],['']));
    bills = response.bills;
}
function showErrorMessage(validationData){
    (validationData.isBillAmountValid)?$('#billamounterror').hide():$('#billamounterror').show()
    (validationData.isBillDescriptionValid)?$('#descriptionerror').hide():$('#descriptionerror').show()
    (validationData.isCorpseIdValid)?$('#corpseIdError').hide():$('#corpseIdError').show()
    (validationData.isDateValid)?$('#dateerror').hide():$('#dateerror').show()
    (validationData.isServiceFeeValid)?$('#feeerror').hide():$('#feeerror').show()

}
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
function populateBillView(){
    fetchAllBills();
    $('.displayNumber').html(bills.length);
    $('.totalNumber').html((bills.length));
    $('.datarow').remove();
    // $('#displayNumber').html(corps.length);
    // $('#totalNumber').html(totalCorpse);
    var position = 0;
    if(bills.length >= 1 ){
        bills.forEach(bill => {
            viewCorpseInformation(bill,position)
            position++;
        });
    }
    else{
        showMessage("" ,"CORP_NOT_FOUND",null,true);
    }
function viewCorpseInformation(bill,position) {
    $('.billsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        bill.date +"</td><td>"+
        bill.corpseCode +"</td><td>"+
        parseInt(bill.amount).toFixed(2) +"</td>"+
        "<td><select class='choose form-control'><option disabled selected>choose</option><option>Delete</option><option>Details</option></select></td></tr>"
        )
}
 
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
            showOrHideSection('.billdetailsection');
            var currentIndexOfBill = parseInt($(this).parent().siblings('.sn').html())-1;
            populateBillDetail(currentIndexOfBill);
        }
    });
    function populateBillDetail(index){
        fetchAllBills();
            $('.date').html(new Date().toISOString().slice(0,10))
                $('.billId').html(bills[index].id)  
                $('.corpseId').html(bills[index].corpseCode)
                $('#fee').html(bills[index].servicefee)
                $('#day').html(bills[index].dueDays + bills[index].extraDays);
                $('#total').html(parseInt(bills[index].amount).toFixed(2));
    }
    function populateBillForm(bill){
        resetForm('#createbillingform');
        $('#datecreated').val(bill.date);
        $('#corpseId').val(bill.corpseCode)
        $('#services').val(bill.servicefee)
        $('#subtotal').val(bill.amount)
        $('#billfor').val(bill.billPurpose)

    }

    function getBillId(index){
        return  bills[index].id;
    }
    
}