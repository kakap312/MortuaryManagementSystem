import {requestData,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var statistics;
$(document).ready(function(){
fetchStatistics()
populateStaticsView()
$('.statisticsview').click(function(){
    fetchStatistics()
    showOrHideSection('.statisticssection');
    populateStaticsView()
})
});


function fetchStatistics(){
    var statisticsUrl = $('.statisticssection').attr('data-action');
        var response = requestData(statisticsUrl,"GET",createFormData(null,[''],['']));
        (response.statistics == null)?statistics = []:statistics = response.statistics;
       
}
function populateStaticsView(){
    $('.totalCorpse').html(statistics.totalCorpse);
    $('.corpsedueforcollectiontoday').html(statistics.corpsReadyForCollectionToday);
    $('.totalbill').html(statistics.totalBill);
    $('.totalpayments').html(statistics.totalPayment)
}