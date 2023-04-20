import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
$(document).ready(function(){

$('.reportlink').click(function(){
    showOrHideSection('.viewreportsection')
    $('.corpsereportview').hide();
    $('.financialreportview').hide()
})
$('.reportprintbtn').click(function(){
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
     $('.corpsereportarea').printArea( option );

})
$('.financialreportbtn').click(function(){
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
     $('.financialreportprintarea').printArea( option );
})
$('.reportbtn').click(function(){
    if(confirm(stringValue("GENERATE_REPORT_CONFIRMATION"))){
        var reporttype = $('.reportType').val();
        if(reporttype == "Corpse"){
            var generateReportUrl = $('.reportbtn').attr('data-action');

        var response = requestData(generateReportUrl,"POST",createFormData($(".reportForm")[0],[''],['']));
        if(response.report != null){
            $('.financialreportview').hide();
            $('.corpsereportview').show();
            displayCorpseReportInfo(response.report,reporttype);
        }else{
            showErrorMessage(response.validationresult)
        }
        }else{
            var generateReportUrl = $('.reportbtn').attr('data-action');

        var response = requestData(generateReportUrl,"POST",createFormData($(".reportForm")[0],[''],['']));
        if(response.report != null){
            $('.financialreportview').show();
            $('.corpsereportview').hide();
            displayCorpseReportInfo(response.report,reporttype);
        }else{
            showErrorMessage(response.validationresult)
        }
        }
        
    }
});

});
function displayCorpseReportInfo(data,reportType){
    $('.reportDate').html(new Date().toISOString().slice(0,10));
    $('.type').html($('.reportType').val());
    $('.captured').html($('.fromdate').val() + " to " + $('.todate').val() );
    $('.totalcorpse').html(data.length)
    $('.corpsedischarged').html(data[0].totalNumberOfCorpseDischarged)
    $('.malecorpse').html(data[0].totalNumberOfMaleCorpse);
    $('.femalecorpse').html(data[0].totalNumberOfFemaleCorpse);
    populateCorpView(data,reportType)
}
function populateCorpView(corps,reportType){
    
    $('.datarow').remove();
    var position = 0;
    if(corps.length >= 1 ){
        corps.forEach(corp => {
            if(reportType == "Corpse"){
                viewCorpseInformation(corp,position)
                position++;
            }else if(reportType == "Financial"){
                viewFinancialReportInfo(corp,position)
                position++;
            }
            
        });
    }
}
function viewFinancialReportInfo(corpse,position){
    $('.corpsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        corpse.corpseCode +"</td><td>"+
        corpse.corpseName +"</td><td>"+
        corpse.admissionDate +"</td><td>"+
        corpse.dischargeDate +"</td><td>"+
        corpse.serviceType + "</td><td>"+
        corpse.totalNumberOfDays + "</td><td>"+
        parseInt(corpse.amountPaid).toFixed(2) + "</td><td>"+
        parseInt(corpse.amountDue).toFixed(2) + "</td><td style='color:red;'>"+
        parseInt(corpse.outstandingAmount).toFixed(2) + "</td>"
        )
}
function viewCorpseInformation(corpse,position) {
    $('.corpsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        corpse.corpseCode +"</td><td>"+
        corpse.corpseName +"</td><td>"+
        corpse.sex +"</td><td>"+
        corpse.serviceType +"</td><td>"+
        corpse.status + "</td><td>"+
        corpse.relativeName + "</td><td>"+
        corpse.relativeNumberOne + "</td><td>"+
        corpse.relativeNumberTwo + "</rd>"
        )
}
