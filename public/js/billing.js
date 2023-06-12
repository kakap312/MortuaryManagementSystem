

import {requestData,createFormData,showMessage,showOrHideSection,stringValue,getActionMenu,resetForm} from './library.js';
var services;
var corpse;
var bill;
var bills;
var billId;
var state;
var totalServiceFeeForOneTimeServices;
var remainingExtraDays = 0;
var remainingDueDays = 0;

$(document).ready(function(){
   fetchServices();
   populateServices();
    fetchAllBills()

    $('#addbilling').attr('disabled',true);
    $('.js-example-basic-multiple').select2({
        allowClear:true,
        placeholder:"Select Services"
    });
    $("#addbillinglink").click(function(){
        showOrHideSection('.addbillingsection');
        $('.addbilling').html('Add Billing');
            state = $('.addbilling').html();
            $('#billingregistrationtext').html("Create Billing")
            $('#billinfinstruction').html('Complete the form below to create a Bill.');
        resetForm('#createbillingform');
        fetchServices();
       $('.services').empty()
        populateServices();
    });
    $('#viewbillinglink').click(function() {
        fetchAllBills();
        
        showOrHideSection('.viewbillingsection');
        populateBillView();
        
    });

    $('.printbillbtn').click(function(){
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
         $('.billcontent').printArea( option );
       });
    
    $('.searchbillbtn').click(function(){
        var searchBillUrl = $('.searchbillbtn').attr('data-action');
        var response = requestData(searchBillUrl,"POST",createFormData(null,['id'],[$('.searbill').val()]));
        if(response.bill == null){
            showMessage(true,"BILL_NOT_FOUND",null,true)
        }else{
            bills = response.bill;
            populateBillView();
        }
        $('.searchcorp').val("");
    });
    $('#corpseseachId').change(function(){
        $('#addbilling').attr('disabled',true);
        var corpseId = $('.corpseseachId').val();
            fetchCorpseById(corpseId);
            if(corpse != null){
                $('.billIdError').hide();
                
                fetchBillByCorpseId(corpseId);
                $('#addbilling').attr('disabled',false);
            }else{
                $('.billIdError').show();
                clearForm();
            }
    })
    

    $('#services').on('change',function(){
        var serviceFees = getServiceFees($('#services').val());
       // var serviceFee =(parseInt($('#services').val()) == null || parseInt($('#services').val()) == 0 )? 0:parseInt($('#services').val())
        if(bill == null){
           performBillingCalculation(serviceFees)
        }else{
            performBillingCalculation(serviceFees)
        }

       
    })
    $('#addbilling').click(function() {
        state = $('.addbilling').html();
        if(state == "Add Billing"){
            if(confirm(stringValue("CREATE_BILLING_CONFIRMATION"))){
                var createBillingURL = $('#createbillingform').attr('data-action');
                var serviceIds = getServiceIds($('#services').val());
                
                
                var response = requestData(createBillingURL,"POST",createFormData($("#createbillingform")[0],['amount','extraDays','dueDays','serviceids'],[$('.billsubtotal').val(),remainingExtraDays,remainingDueDays,serviceIds]));
                if(response.success){
                    showMessage(response.success,"BILL_CREATION_SUCCESS",null,true);
                    resetForm('#createbillingform');
                    $('.addbilling').html('Add Billing');
                    $('.js-example-basic-multiple').empty();
                    populateServices();
                    showErrorMessage(response.validationresult)
                    
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
       
        });


}); // end of $(document).ready function
function getBillById(billId){
    var currentBill;
    bills.forEach(bill => {
        if(bill.id == billId){
            currentBill = bill
        }
    });
    return currentBill;
}
function performBillingCalculation(serviceFees){
    var dueAmount = calculateBillSubTotal(serviceFees,'due');
    var extraAmount = calculateBillSubTotal(serviceFees,'extra');
    var subTotal = dueAmount + extraAmount + totalServiceFeeForOneTimeServices;
    $('.duedaysamount').val(parseInt(dueAmount).toFixed(2));
    $('#extradaysamount').val(parseInt(extraAmount).toFixed(2))
    $('.billsubtotal').val(parseInt(subTotal).toFixed(2));
}
// function getOneTimeServices(){
//     services.forEach(service=>{
//         if(service.per == "once"  ){
//             serviceFees += service.fee;
//         }
//     })
// }
function fetchCorpseById(corpseId){
    var searchCorpUrl = $('.searchcorp').attr('data-action');
    var response = requestData(searchCorpUrl,"POST",createFormData(null,['corpId'],[corpseId]));
    if(response.corps != null){
        corpse = response.corps;
    }else{
        corpse = {};
    }
   
}
function fetchAllBills(){
    var serviceUrl = 'userdashboard/viewbillings'
    var response = requestData(serviceUrl,"POST",createFormData(null,[''],['']));
    bills = response.bills;
}
function showErrorMessage(validationData){
    if(validationData == null){
        $('#servideiderror').hide()
        $('.billamounterror').hide()
        $('.billIdError').hide()
        $('.dateerror').hide()
    }else{
        if(validationData.isServiceIdValid){$('#servideiderror').hide()}else{$('#servideiderror').show()}
        if(validationData.isBillAmountValid){$('.billamounterror').hide()}else{$('.billamounterror').show()}
        // if(validationData.isBillDescriptionValid){$('.billdescriptionerror').hide()}else{$('.billdescriptionerror').show()}
        if(validationData.isCorpseIdValid){$('.billIdError').hide()}else{$('.billIdError').show()}
        if(validationData.isDateValid){$('.dateerror').hide()}else{$('.dateerror').show()}
    }
    
    
}
function fetchBillByCorpseId(id){
    var serviceUrl = $('.searchbillbtn').attr('data-action');
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
    if(services != null){
        services.forEach(service=>{
            $('#services').append('<option>'+service.name+'</option>');
        })
    }
}
function populateDueDays(days){
    
}
function getServiceNamesById(serviceIds){
    var serviceName = [];
    serviceIds.forEach(ids => {
        if(services.length != 0){
            services.forEach(service=>{
                if(ids == service.id ){
                    serviceName.push(service.name);
                }
            })
        }

    });
    return serviceName;
    
}
function populateExtraDays(days){
    (days)<0 ?$('#extradays').val(0):$('#extradays').val(days);
    ;
}
function  calculateBillSubTotal(serviceFees,days) {
    var sumOfExtra = 0;
    var sumOfDueDays = 0;
    var subTotal = 0;
    if(state == "Add Billing"){
        if(bill != null){
            bill.forEach(bil=>{
                sumOfExtra += bil.extraDays;
                sumOfDueDays += bil.dueDays;
            });
        }
        if(days == "extra"){
            remainingExtraDays = corpse.extraDays - sumOfExtra;
            subTotal = serviceFees * remainingExtraDays;
            return subTotal;
        }else if(days =="due"){
            remainingDueDays =  corpse.dueDays - sumOfDueDays;
            console.log(corpse.dueDays)
            subTotal = serviceFees*remainingDueDays;
            return subTotal;
        } 
    }else if(state == "Update Billing"){
        var currentBill = getBillById(billId);
        if(days == "extra"){
            subTotal = serviceFees * currentBill.extraDays;
            return subTotal;
        }else if(days =="due"){
            subTotal = serviceFees*currentBill.dueDays;
            return subTotal;
        } 
    }
    
    //(remainingDays == 0 || remainingDays == 0)? $('#addbilling').attr('disabled',true): $('#addbilling').attr('disabled',false);  
}
function getServiceFees(serviceNames) {
    var serviceFees = 0;
    totalServiceFeeForOneTimeServices= 0;
    serviceNames.forEach(serviceName=>{
        services.forEach(service=>{
            if(corpse.category == "Regular"){
                if(service.name == serviceName && service.per == "daily"){
                    serviceFees += service.regularFee;
                }else if(service.name == serviceName && service.per == "once"){
                    totalServiceFeeForOneTimeServices += service.regularFee;
                }
            }else if(corpse.category == "VIP"){
                if(service.name == serviceName && service.per == "daily"){
                    serviceFees += service.vipFee;
                }else if(service.name == serviceName && service.per == "once"){
                    totalServiceFeeForOneTimeServices += service.vipFee;
                }
            }
            
        })
    })
    return serviceFees;
}
function getServiceIds(serviceNames) {
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
        bill.date +"</td><td>" +
        bill.corpseCode +"</td><td>" +
        bill.id +"</td><td>"+
        parseInt(bill.amount).toFixed(2) +"</td>"+
        getActionMenu()
        )
}
 
    $('.choose').change(function(){
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete this Bill")){
                var deleteBillUrl = $('#deletebill').attr('data-action');
                billId = getBillId(parseInt($(this).parent().siblings('.sn').html())-1);
              var  response = requestData(deleteBillUrl,"POST",createFormData(null,['billId'],[billId]));
              if(response.success){
                showMessage(response.success,"DELETE_SUCCESS",null,true);
                fetchAllBills();
                populateBillView();
            }
        }
        }else if(($(this).val() == "Details")){
            showOrHideSection('.billdetailsection');
            var currentIndexOfBill = parseInt($(this).parent().siblings('.sn').html())-1;
            billId = getBillId(parseInt($(this).parent().siblings('.sn').html())-1);
            bill = getBillById(billId)
            fetchCorpseById(bill.corpseCode);
            populateBillDetail(currentIndexOfBill);
        }else if (($(this).val() == "Update")){
            showOrHideSection('.addbillingsection');
            $('.addbilling').html('Update Billing');
            state = $('.addbilling').html();
            $('#billingregistrationtext').html("Update Billing")
            $('#billinfinstruction').html('Complete the form below to update this Bill.');
            billId = getBillId(parseInt($(this).parent().siblings('.sn').html())-1);
            bill = getBillById(billId)
            fetchCorpseById(bill.corpseCode);
            var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
            populateBillForm(bills[currentCorpIndexNumber]);
            var serviceFees = getServiceFees($('#services').val());
            performBillingCalculation(serviceFees)
        }
    });
    function populateBillDetail(index){
        fetchAllBills();
            $('.date').html(new Date().toISOString().slice(0,10))
                $('.corpsename').html(corpse.name)
                $('.billId').html(bills[index].id)  
                $('.corpseId').html(bills[index].corpseCode)
                $('#serviceFee').html(getServiceAndFeeString(bills[index].servicesIds))
                $('#day').html(bills[index].dueDays + bills[index].extraDays);
                $('#total').html(parseInt(bills[index].amount).toFixed(2));
    }
    function getServiceAndFeeString(serviceIds){
        var serviceAndFeeString = "";
        serviceIds.forEach(id => {
            services.forEach(service => {
                if(id == service.id){
                    if(corpse.category == "Regular"){
                        serviceAndFeeString += service.name /*+ " (" + parseInt(service.regularFee).toFixed(2) + ") " */ + " ,"
                    }else{
                        serviceAndFeeString += service.name  /* + " (" + parseInt(service.vipFee).toFixed(2) + ") " */ + " ,"
                    }
                    
                } 
            });  
        });
        return serviceAndFeeString;
    }
    function populateBillForm(bill){
        resetForm('#createbillingform');
        $('.datecreated').val(bill.date);
        $('#corpseseachId').val(bill.corpseCode).trigger('change')
        $('#services').val(getServiceNamesById(bill.servicesIds))
        $('#services').select2().trigger('change');
        $('.duedaysamount').val(bill.dueDays * getServiceFees($('#services').val()))
        $('#extradaysamount').val(bill.extraDays * getServiceFees($('#services').val()))
        $('.billsubtotal').val(bill.amount)
        $('#billfor').val(bill.billPurpose)
    }

    function getBillId(index){
        return  bills[index].id;
    }
    
}