import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var bill;
var payments;
var paymentId;
var payment;

$(document).ready(function(){
    fetchPayments();


    $('#addpayment').click(function(){
        showOrHideSection('.addPaymentsection');
        resetForm('.createPaymentform');
        $('.addpaymentbtn').html('Add Payment');
        $('#paymentregistrationtext').html('Create Payment  Form')
        $('#paymentinstruction').html('Complete the Payment form below to create a Payment.');
    });
    $('#viewpayment').click(function(){
        fetchPayments();
        showOrHideSection('.viewpaymentsection');
        populatePaymentView();
    });
    $('#billId').change(function(){
        $('#addpayment').attr('disabled',true);
            var billId = $('#billId').val();
            var searchBillUrl = $('.searchbill').attr('data-action');
            var response = requestData(searchBillUrl,"POST",createFormData(null,['id'],[billId]));
            if(response.bill != null){
                $('#billIdError').hide();
                bill = response.bill;
                $('#addpayment').attr('disabled',false);
            }else{
                $('#billIdError').show();
                clearForm();
            }    
    })
    $('.searchpaymentbtn').click(function(){
        var searchBillUrl = $('.searchpaymentbtn').attr('data-action');
        var response = requestData(searchBillUrl,"POST",createFormData(null,['id'],[$('.searchpayment').val()]));
        if(response.payments == null){
            showMessage(true,"CORP_NOT_FOUND",null,true)
        }else{
            payments = response.payments;
            populatePaymentView();
        }
        $('.searchpayment').val("");
    });
    $('.addpaymentbtn').click(function(){
        var buttonState = $('.addpaymentbtn').html();
        
            if( buttonState == "Add Payment"){
                if(confirm(stringValue("CREATE_PAYMENT_CONFIRMATION"))){
                var  createPaymentUrl = $('.createPaymentform').attr('data-action');
                var response = requestData(createPaymentUrl,"POST",createFormData($("#createPaymentform")[0],[''],['']));
                if(response.success){
                    showMessage(response.success,"PAYMENT_CREATION_SUCCESS",null,true);
                    resetForm('#createPaymentform');
                }else{
                    showErrors(response.validation)
                }
            } 

            }else if(buttonState == "Update Payment"){
                if(confirm(stringValue("UPDATE_PAYMENT_CONFIRMATION"))){
                    var  createPaymentUrl = $('.updatepayment').attr('data-action');
                    var response = requestData(createPaymentUrl,"POST",createFormData($("#createPaymentform")[0],['id'],[paymentId]));
                    if(response.success){
                        showMessage(response.success,"PAYMENT_UPDATION_SUCCESS",null,true);
                    }else{
                        showErrors(response.validation)
                    }
                }
            }
            
                                                                                                                                                                                                                                                                     
    })
});
function fetchBillById(id){
var response = requestData(serviceUrl,"POST",createFormData(null,['billId'],[id]));
bill = response.bill;
}
function fetchPayments(){
    var paymentUrl = $('.viewpaymentsection').attr('data-action');
    var response = requestData(paymentUrl,"GET",createFormData(null,[''],['']))
    payments = response.payments;
}
function clearForm() {
    resetForm('#createPaymentform');
}
function showErrors(validationResult){
(validationResult.isAmountValid)?$('.amounterror').hide():$('.amounterror').show();
(validationResult.isDateValid)?$('.paymentdateerror').hide():$('.paymentdateerror').show();
(validationResult.isDescriptionValid)?$('.descriptionerror').hide():$('.descriptionerror').show();
(validationResult.isIdValid)?$('.billIdError').hide():$('.billIdError').show();
 }
 function populateUpdateScreen(){
    $('.datecreated').val(payment.createdAt);
    $('.searchbill').val(payment.billId);
    $('.amount').val(payment.amount);
    $('.billfor').val(payment.description);
 }
 function populatePaymentView(){

    $('.displayNumber').html(payments.length);
    $('.totalNumber').html((payments.length));
    $('.datarow').remove();
    // $('#displayNumber').html(corps.length);
    // $('#totalNumber').html(totalCorpse);
    var position = 0;
    if(payments.length >=1 ){
        payments.forEach(payment => {
            viewPaymentInformation(payment,position)
            position++;
        });
    }
    else{
        showMessage("" ,"CORP_NOT_FOUND",null,true);
    }
    
}
function viewPaymentInformation(payment,position) {
    $('.billsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        payment.createdAt +"</td><td>"+
        payment.billId +"</td><td>"+
        parseInt(payment.amount).toFixed(2) +"</td>"+
        "<td><select class='choose form-control'><option disabled selected>choose</option><option>Update</option></select></td></tr>"
        )

        $('.choose').change(function(){
            if(($(this).val() == "Delete")){
                if(confirm("Are you sure you want to delete this payment")){
                    var deleteBillUrl = $('#deletepayment').attr('data-action');
                    paymentId = getPaymentId(parseInt($(this).parent().siblings('.sn').html())-1);
                    console.log(paymentId)
                  var  response = requestData(deleteBillUrl,"POST",createFormData(null,['id'],[paymentId]));
                  if(response.success){
                    showMessage(response.success,"DELETE_SUCCESS",null,true);
                    fetchPayments();
                    populatePaymentView();
                }
            }
            }else if(($(this).val() == "Update")){
                showOrHideSection('.addPaymentsection');
                $('.addpaymentbtn').html('Update Payment');
                $('#paymentregistrationtext').html('Update Payment  Form')
                $('#paymentinstruction').html('Complete the Payment form below to Update a Payment.');
                paymentId = getPaymentId(parseInt($(this).parent().siblings('.sn').html())-1);
                getPaymentById(paymentId);
                populateUpdateScreen();
                //console.log(payment)
            }
        });
}
function getPaymentId(index){
    return  payments[index].paymentId;
}
function getPaymentById(id){
    fetchPayments()
    payments.forEach((pay)=>{
        if(pay.paymentId == id){
            payment = pay;
        }
    })
}

