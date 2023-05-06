import {requestData,createFormData,showMessage,showOrHideSection,stringValue,getActionMenu,resetForm} from './library.js';
var services;
var service;
var serviceId;
var state;
$(document).ready(function(){
    fetchServices()

    $('#addservicelink').click(function(){
        showOrHideSection('.addservicesection');
        $('#serviceregistrationtext').html("Create Service")
        $('#serviceinstruction').html('Complete the form below to add a service.');
        $('.addservicebtn').html('Add Service');
    })
    $('#addservicebtn').click(function(){
    state = $('.addservicebtn').html();
    if(state == "Add Service"){
        if(confirm(stringValue("CREATE_SERVICE_CONFIRMATION"))){
            var createserviceURL = $('#createserviceform').attr('data-action');
            var response = requestData(createserviceURL,"POST",createFormData($("#createserviceform")[0],[''],['']));
            if(response.success){
                showMessage(response.success,"SERVICE_CREATED_SUCCESS",null,true);
                resetForm('#createclearanceform');
            }else if(response.isExisting){
                showMessage(response.success,"SERVICE_CREATED_ERROR",null,true);
            }else{
                showErrorMessage(response.validationresult);
            }
        }
    }else if(state == "Update Service"){
        if(confirm(stringValue("UPDATE_SERVICE_CONFIRMATION"))){
            var createserviceURL = $('#updateservice').attr('data-action');
            var response = requestData(createserviceURL,"POST",createFormData($("#createserviceform")[0],['serviceId','updatedat'],[serviceId,(new Date().toISOString().slice(0,10))]));
            if(response.success){
                showMessage(response.success,"SERVICE_UPDATE_SUCCESS",null,true);
                resetForm('#createclearanceform');
            }else if(response.isExisting){
                showMessage(response.success,"UPDATE_ERROR",null,true);
            }else{
                showErrorMessage(response.validationresult);
            }
        }
    }

    })

    $('#viewserviceslink').click(function(){
        showOrHideSection('.viewservicesection');
        fetchServices()
        populateServiceView()
    })
    $('.serviceprintbtn').click(function(){
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
         $('.servicecontent').printArea( option );
       });

    $('.searchservicebtn').click(function(){
        var searchServiceUrl = $('.searchservicebtn').attr('data-action');
        var response = requestData(searchServiceUrl,"POST",createFormData(null,['serviceId'],[$('.searchservice').val()]));
        if(response.services == null){
            showMessage(true,"SERVICE_NOT_FOUND",null,true)
            populateServiceView();
        }else{
            services = response.services;
            populateServiceView();
        }
        $('.searchservice').val("");
    });
    
})
function showErrorMessage(validationData){
    if(validationData == null){
        $('.dateerror').hide()
        $('.servicenameError').hide()
        $('#stateerror').hide()
    }else{
        if(validationData.isDateValid){$('.dateerror').hide()}else{$('.dateerror').show()}
        if(validationData.isServiceFeeValid){$('.stateerror').hide()}else{$('.stateerror').show()}
        if(validationData.isServiceNameValid){$('.servicenameError').hide()}else{$('.servicenameError').show()}
    }
}
function populateServiceDetail(index){
        $('.date').html(new Date().toISOString().slice(0,10))
            $('.servideid').html(services[index].id)  
            $('.name').html(services[index].name)
            $('.servicefee').html(services[index].fee)
            $('#per').html(services[index].per );
}
function fetchServices(){
    var fetchServicesUrl = $('.viewservicesection').attr('data-action');
    var response = requestData(fetchServicesUrl,"GET",createFormData(null,[''],['']));
    services = response.services;

}
function populateServiceView(){

    $('.displayNumber').html(services.length);
    $('.totalNumber').html((services.length));
    $('.datarow').remove();
    // $('#displayNumber').html(corps.length);
    // $('#totalNumber').html(totalCorpse);
    var position = 0;
    if(services.length >= 1 ){
        services.forEach(service => {
            viewServicesInformation(service,position)
            position++;
        });
    }
    else{
        showMessage("" ,"CORP_NOT_FOUND",null,true);
    }
}
function viewServicesInformation(service,position){
    $('.servicesviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        service.dateCreated +"</td><td>"+
        service.name +"</td><td>"+
        parseInt(service.fee).toFixed(2) +"</td><td>"+
        service.per +"</td>"+
        getActionMenu()
        )

 
    $('.choose').change(function(){
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete this Service")){
                var deleteBillUrl = $('.deleteserviceURL').attr('data-action');
                serviceId = getServiceId(parseInt($(this).parent().siblings('.sn').html())-1);
              var  response = requestData(deleteBillUrl,"POST",createFormData(null,['serviceId'],[serviceId]));
              if(response.success){
                showMessage(response.success,"DELETE_SUCCESS",null,true);
                fetchServices();
                populateServiceView();
            }
        }
        }else if(($(this).val() == "Details")){
            showOrHideSection('.servicedetailsection');
            var currentServiceIndex = parseInt($(this).parent().siblings('.sn').html())-1;
            populateServiceDetail(currentServiceIndex);
        }else if (($(this).val() == "Update")){
            showOrHideSection('.addservicesection');
            $('#serviceregistrationtext').html("Update Service")
            $('#serviceinstruction').html('Complete the form below to update this service.');
            $('.addservicebtn').html('Update Service');
            state = $('.addservicebtn').html();
            serviceId = getServiceId(parseInt($(this).parent().siblings('.sn').html())-1);
            service = getServiceById(serviceId)
            var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
            populateServiceForm(service);
        }
    })
}
function getServiceId(index){
    return  services[index].id;
}
function getServiceById(id){
    var currentService;
    services.forEach(service => {
        if(service.id == id){
            currentService = service
        }
    });
    return currentService;
}
function populateServiceForm(service){
    resetForm('#createserviceform');
    $('.datecreated').val(service.dateCreated);
    $('#servicename').val(service.name)
    $('.per').val(service.per)
    $('#servicefee').val(service.fee);
    

}