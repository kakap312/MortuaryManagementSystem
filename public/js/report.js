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
$('.reportbtn').click(function(){
    if(confirm(stringValue("GENERATE_REPORT_CONFIRMATION"))){
        var generateReportUrl = $('.reportbtn').attr('data-action');

        var response = requestData(generateReportUrl,"POST",createFormData($(".reportForm")[0],[''],['']));
        if(response.report != null){
            $('.corpsereportview').show();
            displayCorpseReportInfo(response.report);
        }else{
            showErrorMessage(response.validationresult)
        }
    }
});

});
function displayCorpseReportInfo(data){
    $('.reportDate').html(new Date().toISOString().slice(0,10));
    $('.type').html($('.reportType').val());
    $('.captured').html($('.fromdate').val() + " to " + $('.todate').val() );
    $('.totalcorpse').html(data.corpse.length)
    $('.corpsedischarged').html(data.totalNumberOfCorpseDischarged)
    $('.malecorpse').html(data.totalNumberOfMaleCorpse);
    $('.femalecorpse').html(data.totalNumberOfFemaleCorpse);
    populateCorpView(data.corpse)
}
function populateCorpView(corps){
    
    $('.datarow').remove();
    var position = 0;
    if(corps.length >= 1 ){
        corps.forEach(corp => {
            viewCorpseInformation(corp,position)
            position++;
        });
    }
}
function viewCorpseInformation(corpse,position) {
    $('.corpsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        corpse.corpseCode +"</td><td>"+
        corpse.name +"</td><td>"+
        corpse.sex +"</td><td>"+
        corpse.category + "</td><td>"+
        corpse.category + "</td><td>"+
        corpse.relativeName + "</td><td>"+
        corpse.relativeContactOne + "</td><td>"+
        corpse.relativeContactTwo + "</rd>"
        )
}
