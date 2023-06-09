
import {requestData,createFormData,showMessage,getActionMenu,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';

var corps;
var fridges;
var slots;
var corpId;
var slotId;
var corpse;
var totalCorpse;
$(document).ready(function(){
    var accountdetails = fetchAccountType();
    accountdetails.usertype == "admin"?$(".admin-menu").show():$(".admin-menu").hide();
    $('#header').attr('data-action',accountdetails.usertype);
    $('.usernametext').html("Welcome " + accountdetails.username);
    fetchFridges();
    fetchCorpse();
    fetchSlots();
    fetchTotalCorpse();

    // $('.next').click(function(){
    //     var currentNumberOfElementInList = list.length - startDisplayFrom // (12) - (5) = 7; //3
    //     if(currentNumberOfElementInList > 5){
    //         for ( var i = startDisplayFrom; i < (startDisplayFrom+5); i++){
    //             console.log(list[i]); displayCorpse(start,end)
    //         }
    //         startDisplayFrom = startDisplayFrom + 5; //
    //         console.log(currentNumberOfElementInList);
    //     }else if (currentNumberOfElementInList > 0  && currentNumberOfElementInList < 5 ){
    //         for (var i=startDisplayFrom; i< startDisplayFrom + currentNumberOfElementInList; i++){
    //             console.log(list[i]);
    //             //populatetable(index,bound);
    //         }
    //         startDisplayFrom = startDisplayFrom + currentNumberOfElementInList;
    //         console.log(currentNumberOfElementInList);
    //     }else if ((startDisplayFrom + currentNumberOfElementInList) == list.length){
    //         console.log("No item to display");
    //     }
        
    // });
    // $('.previous').click(function(){
    //     var currentNumberOfElementInList = list.length + startDisplayFrom // (12) - (5) = 7; //3
    //     if(currentNumberOfElementInList < 5){
    //         for ( var i = startDisplayFrom; i < (startDisplayFrom+5); i++){
    //             console.log(list[i]);
    //         }
    //         startDisplayFrom = startDisplayFrom + 5; //
    //         console.log(currentNumberOfElementInList);
    //     }else if (currentNumberOfElementInList > 5){
    //         for (var i=startDisplayFrom; i< startDisplayFrom + currentNumberOfElementInList; i++){
    //             console.log(list[i]);
    //             //populatetable(index,bound);
    //         }
    //         startDisplayFrom = startDisplayFrom + currentNumberOfElementInList;
    //         console.log(currentNumberOfElementInList);
    //     }else if ((startDisplayFrom + currentNumberOfElementInList) == list.length){
    //         console.log("No item to display");
    //     }
        
    // });
    $("#addcorplink").click(function(){
        showOrHideSection('.addcorpsection');
        resetForm('#registercorpform');
        $('#corpseregistrationtext').html('');
        $('#corpseinstruction').html('');
        $('#corpseregistrationtext').html('Corpse Registration Form');
        $('#corpseinstruction').html('Complete the registration below to create a new Corp registration');
        $('#freeslot').hide();
        $('.availableslot').hide();
        $('#registerbtn').html('Register');
        $('.availableslots').show();
        populateFridges();
    });

    // $('input[type="date"]').change(function(){
    //     var formattedDate = "";
    //     var dateParts = ($(this).val().split("-").reverse());
    //     for(var index=0; index < dateParts.length; index++){
    //         if(index == 2){
    //             formattedDate += dateParts[index]
    //         }else{
    //             formattedDate += dateParts[index] + "/";
    //         }
    //     }
    //   ($(this).val(formattedDate))
    // });

    $("#viewcorplink").click(function(){
        fetchCorpse();
        fetchTotalCorpse();
        showOrHideSection('.viewcorpsection');
        populateCorpView();
    });
    $('.fridgename').change(function(){
        $('#sloterrormessage').hide();
        var fridgeId = getFridgeIdByName(($(this).val()));
        fetchAvailableSlotByFidgeId(fridgeId)
    });
    $('.printbtn').click(function(){
         //printPageSection('#corpsecontent');
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
         $('#corpsecontent').printArea( option );

        //  $('#corpsecontent').printThis({
        //     importCSS:true,
        //     loadCSS:"/css/style.css",
        //     importStyle: true,
        //     base:"http://localhost/MortuaryManagementSystem/public/"
        // });
    });

    // $('#registercorpform').submit(function(e){
    //     e.preventDefault();
    //     var state = $(".registerbtn").html();
    //     var fridgeId =getFridgeIdByName($('.fridgename').val());
    //     var slotId = getSlotIdByName($('.availableslots').val());
    //     var code = generateCorpseUniqueId();
    //     if(state == 'Register'){
    //         if(confirm(stringValue("CREATE_CORPSE_CONFIRMATION"))){
    //             var formData = createFormData($("#registercorpform")[0],['fridgeId','slotId','corpseCode'],[fridgeId,slotId,code])
    //             requestData('userdashboard/createcorp',"POST",formData).
    //             then((data)=>{
    //                 if(data.success){
    //                     showMessage(data.success,"REGISTERED_SUCCESS",null,true);
    //                     resetForm('#registercorpform');
    //                 }else{
    //                     data.isAdmissionDateValid ?$('#admissiondateerror').hide(): $('#admissiondateerror').show();
    //                     data.isCollectionDateValid ?$('#collectiondateerror').hide(): $('#collectiondateerror').show();
    //                     data.isCorpseNameValid ?$('#nameError').hide(): $('#nameError').show();
    //                     data.homeTownValidator ?$('#hometownError').hide(): $('#hometownError').show();
    //                     data.isRelativeNameValid ?$('#relativeNameError').hide(): $('#relativeNameError').show();
    //                     data.isReleasedByValid ?$('#releasedByError').hide(): $('#releasedByError').show();
    //                     data.isAgeValid ?$('#ageError').hide(): $('#ageError').show();
    //                     data.isSexValid ?$('#sexError').hide(): $('#sexError').show();
    //                     data.isContactOneValid ?$('#contactOneError').hide(): $('#contactOneError').show();
    //                     data.isContactTwoValid ?$('#contactTwoError').hide(): $('#contactTwoError').show();
    //                     data.isCommentValid ?$('#remarksError').hide(): $('#remarksError').show();
    //                     data.isSlotValid ?$('#sloterrormessage').hide(): $('#sloterrormessage').show();
    //                     data.isFridgeValid ?$('#remarksError').hide(): $('#remarksError').show();
    //                     showMessage(data.isCorpCreated,"REGISTERED_ERROR",null,true);
    //                 }
    //             })
            
    //     }
    // }else if(state == 'Update'){
    //     createCorpUrl = $('.forminstructon').attr('data-action')
    //     if(confirm(stringValue('UPDATE_CORPSE_CONFIRMATION'))){
    //         response = requestData(createCorpUrl,"POST",createFormData($("#registercorpform")[0],['fridgeId','slotId','corpId','corpseCode'],[fridgeId,slotId,corpId,code])). 
    //         then((data)=>{
    //             (data.success)?showMessage(data.success,"UPDATE_SUCCESS",null,true):showMessage(data.success,"UPDATE_ERROR",null,true);
    //         })
              
    //     }
    // } 
    // })
   
    $("#registerbtn").click(function(e){
        e.preventDefault();
        var state = $("#registerbtn").html();
        var fridgeId =getFridgeIdByName($('.fridgename').val());
        var slotsId = getSlotIdByName($('.availableslots').val());
        var code = generateCorpseUniqueId();
        if(state == 'Register'){
            if(confirm(stringValue("CREATE_CORPSE_CONFIRMATION"))){
                var createCorpseUrl = $('#registercorpform').attr('data-action');
                var formData = createFormData($("#registercorpform")[0],['fridgeId','slotId','corpseCode'],[fridgeId,slotsId,code])
                var response = requestData(createCorpseUrl,"POST",formData);
                if(response.success){
                    showMessage(response.success,"REGISTERED_SUCCESS",null,true);
                    resetForm('#registercorpform');
                    fetchCorpse();
                    showErrorMessage(response.validationResult)
                }else{
                    showErrorMessage(response.validationResult)
                }
            
        }
    }else if(state == 'Update'){
       var  createCorpUrl = $('#corpseupdateurl').attr('data-action');
        if(confirm(stringValue('UPDATE_CORPSE_CONFIRMATION'))){
            slotId = getSlotIdByName($('.availableslots').val());
            // if($('.availableslots').val() != null){
            //     slotId = getSlotIdByName($('.availableslots').val());
            // }
            var response = requestData(createCorpUrl,"POST",createFormData($("#registercorpform")[0],['fridgeId','slotId','corpId','corpseCode'],[fridgeId,slotId,corpId,code])); 
            if(response.success){
                showMessage(response.success,"UPDATE_SUCCESS",null,true);
                fetchCorpse();
                $('#freeslot').show()
                $('.availableslots').hide();
                showErrorMessage(response.validationResult)
            }else{
                showErrorMessage(response.validationResult)
                showMessage(response.isCorpCreated,"UPDATE_ERROR",null,true);
               
                
            }  
        }
    } 
    });
    $('#freeslot').click(function(){
        if(confirm(stringValue('UPDATE_CORPSE_CONFIRMATION'))){
            var freeSlotURL = $('#freeslot').attr('data-action');
            //fetchAvailableSlotByFidgeId(getFridgeIdByName($('.fridgename').val()));
            var response = requestData(freeSlotURL,"POST",createFormData(null,['slotId'],[slotId]));
            if(response.success){
                showMessage(response.success,"SLOT_FREE",null,true);
                $('.availableslots').show();
                $('#freeslot').hide();
                fetchAvailableSlotByFidgeId(getFridgeIdByName(($('.fridgename').val())));
                //populateSlots();
            }else{
                //$('#sloterrormessage').show();
            }
        }
        
    });
    $('.searchcorpbtn').click(function(){
        var searchCorpUrl = $('.searchcorp').attr('data-action');
        var response = requestData(searchCorpUrl,"POST",createFormData(null,['corpId'],[$('.searchcorp').val()]));
        if(response.corps == null){
            showMessage(true,"CORP_NOT_FOUND",null,true)
        }else{
            corps = [response.corps];
            populateCorpView();
        }
        $('.searchcorp').val("");
    });
    
}); // end of $(document).ready function

function showErrorMessage(validationresult){
    if(validationresult == null){
        $('#admissiondateerror').hide()
        $('#collectiondateerror').hide()
        $('#nameError').hide()
        $('#hometownError').hide()
        $('#relativeNameError').hide()
        $('#releasedByError').hide()
        $('#ageError').hide()
        $('#sexError').hide()
        $('#contactOneError').hide()
        $('#contactTwoError').hide()
        //$('#remarksError').hide()
        $('#sloterrormessage').hide()
        $('#fridgeerrormessage').hide()
        
    }else{
        validationresult.isAdmissionDateValid ?$('#admissiondateerror').hide(): $('#admissiondateerror').show();
        validationresult.isCollectionDateValid ?$('#collectiondateerror').hide(): $('#collectiondateerror').show();
        validationresult.isCorpseNameValid ?$('#nameError').hide(): $('#nameError').show();
        validationresult.homeTownValidator ?$('#hometownError').hide(): $('#hometownError').show();
        validationresult.isRelativeNameValid ?$('#relativeNameError').hide(): $('#relativeNameError').show();
        validationresult.isReleasedByValid ?$('#releasedByError').hide(): $('#releasedByError').show();
        validationresult.isAgeValid ?$('#ageError').hide(): $('#ageError').show();
        validationresult.isSexValid ?$('#sexError').hide(): $('#sexError').show();
        validationresult.isContactOneValid ?$('#contactOneError').hide(): $('#contactOneError').show();
        validationresult.isContactTwoValid ?$('#contactTwoError').hide(): $('#contactTwoError').show();
        //validationresult.isCommentValid ?$('#remarksError').hide(): $('#remarksError').show();
        validationresult.isSlotValid ?$('#sloterrormessage').hide(): $('#sloterrormessage').show();
        validationresult.isFridgeValid ?$('#fridgeerrormessage').hide(): $('#fridgeerrormessage').show();
        
    }
    
}

function fetchAvailableSlotByFidgeId(fridgeId){
    var availableSlotUrl = $('#slots').attr('data-action'); 
    var response = requestData(availableSlotUrl,"POST",createFormData(null,['fridgeid'],[fridgeId]));
    (response.length == 0 || response==null)?$('.sloterrormessage').show():populateAvailableSlots(response.slots);  
}
function fetchAccountType(){
    var acctypeUrl = $('.acctype').attr('data-action');
    var formData = createFormData(null,[''],['']);
    var response = requestData(acctypeUrl,"get",formData);
    return response.accountdetails;
}
function fetchFridges(){
    var fridgesUrl = $('#fridges').attr('data-action');
    var formData = createFormData(null,[''],['']);
    var response = requestData(fridgesUrl,"POST",formData);
    fridges = response.fridges;
    
}
function fetchTotalCorpse(){
    var response = requestData($('.totalcorpse').attr('data-action'),"GET",createFormData(null,[''],['']));
    totalCorpse = response.totalCorpse;
}
function fetchSlots(){
    var slotUrl = $('.fetchslot').attr('data-action');
    var response = requestData(slotUrl,"GET",createFormData(null,[''],['']));
    slots = response.slots;
}
function fetchCorpse(){
    var fetchCorpUrl = $('.fetchcorpse').attr('data-action');
    var formData = createFormData(null,[''],[""]);
    var response = requestData(fetchCorpUrl,"GET",formData);
    corps = response.corps;
    
}
function populateCorpView(){
    
    $('.datarow').remove();
    $('#displayNumber').html(corps.length);
    $('#totalNumber').html(totalCorpse);
    var position = 0;
    if(corps.length >= 1 ){
        corps.forEach(corp => {
            viewCorpseInformation(corp,position)
            position++;
        });
    }
    else{
        showMessage("" ,"CORP_NOT_FOUND",null,true);
    }
function viewCorpseInformation(corpse,position) {
    
    $('.corpsviewtable').append(
        "<tr class='datarow'><td class='sn'>"+(position+1)+"</td><td>"+
        corpse.corpseCode +"</td><td>"+
        corpse.name +"</td><td>"+
        corpse.sex +"</td><td>"+
        corpse.admissionDate +"</td><td>"+
        corpse.collectionDate +"</td><td>"+
        corpse.dueDays +"</td><td>"+
        corpse.category + "</td><td>"+
        corpse.relativeName + "</td><td>"+
        corpse.relativeContactOne + "</td><td>"+
        corpse.relativeContactTwo+
        getActionMenu()
        )
}
 
    $('.choose').change(function(){
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete this corpse")){
                var deleteBillUrl = $('.deletecorp').attr('data-action');
                corpId = getCorpIdByName(parseInt($(this).parent().siblings('.sn').html())-1);
              var  response = requestData(deleteBillUrl,"POST",createFormData(null,['corpid'],[corpId]));
              if(response.success){
                showMessage(response.success,"DELETE_SUCCESS",null,true);
                fetchCorpse();
                populateCorpView();
            }
        }
        }else if(($(this).val() == "Update")){
            fetchSlots();
            showOrHideSection('.addcorpsection');
            $('#registerbtn').html('Update');
            $('#freeslot').show();
            $('.availableslots').hide();
            populateFridges();
            corpId = getCorpIdByName(parseInt($(this).parent().siblings('.sn').html())-1);
            var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
            slotId = getSlotIdByName(corps[currentCorpIndexNumber].slotName);
            console.log(corps[currentCorpIndexNumber])
            populateCoprsForm(corps[currentCorpIndexNumber],checkSlotEquality());
            fetchAvailableSlotByFidgeId(getFridgeIdByName($('.fridgename').val()))
        }else if(($(this).val() == "Details")){
            showOrHideSection('.corpdetailsection');
            var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
            corpId = getCorpIdByName(currentCorpIndexNumber);
            corpse = corps[currentCorpIndexNumber];
            populateCorpDetail();
        }
    });
    
}
function getCorpseId(index){
    return  corps[index].id;
}
function getCorpseById(id){
    corps.forEach(corp => {
        if(id == corp.corpseCode){
            return corp;
        }
    })
}
function populateFridges(){
    
    if(fridges != null){
        $('.fridges').remove();
        fridges.forEach(fridge=>{
            $('.fridgename').append('<option class="fridges">'+fridge.name+'</option>');
        });
    }
}
function populateSlots(){
    if(slots.length != 0){
        $('.slotnames').remove();
        slots.forEach(slot => {
            (slot.state == 'free')?$('.availableslots').append('<option class="slotnames">'+slot.name+'</option>'):""; 
        });
    }else{
        $('.slotnames').remove();
    }
    
}
function populateAvailableSlots(data){
    $('.slotnames').remove();
    if(data.length == 0 || data == null){
       //$('#sloterrormessage').show();
    }else{
        data.forEach(availableslot => {
            $('#slots').append('<option class="slotnames">'+availableslot.name+'</option>') 
        });
    }
}
function populateCorpDetail(){
    
        $('#date').html(new Date().toISOString().slice(0,10))
            $('#coprseId').html(corpse.corpseCode)  
            $('#corpName').html(corpse.name)
            $('#corpSex').html(corpse.sex)
            $('#corpCategory').html(corpse.category)
            $('#corpAdmissionDate').html(corpse.admissionDate)
            $('#corpCollectionDate').html(corpse.collectionDate)
            $('#dayInFridge').html(corpse.dueDays);

}
function populateCoprsForm(corp,status){
    $('#corpseregistrationtext').html('');
    $('#corpseinstruction').html('');
    $('#corpseregistrationtext').html('Corps Update Form');
    $('#corpseinstruction').html('Complete the form below to update a Corp information');
    $('#admissionDate').val(corp.admissionDate);
    $('#collectionDate').val(corp.collectionDate);
    $('#name').val(corp.name);
    $('#age').val(corp.age);
    $('#hometown').val(corp.hometown);
    $('.fridgename').val(corp.fridgeName);
    $('#remarks').val(corp.remarks);
    $('#sex').val(corp.sex);
    $('#relativeName').val(corp.relativeName);
    $('#relativeContactOne').val(corp.relativeContactOne);
    $('#relativeContactTwo').val(corp.relativeContactTwo);
    $('#releasedBy').val(corp.releasedBy);
    $('#registercorpbtn').html('Update');
    $('.category').val(corp.category);
    
    if(status){
        $('.availableslots').show()
        $('#freeslot').hide()
    }else{
        $('.availableslots').hide()
        $('#freeslot').show()
    }
}
function getFridgeIdByName(name){
    var id;
    fridges.forEach(fridge => {
        (fridge.name == name )?id = fridge.id:null
    });
    return id;
}
function getSlotIdByName(name){
    var id=null;
    slots.forEach(slot => {
        (slot.name == name )?id = slot.id:null
    });
    return id;
}
function getSlotNameById(id){
    var name=null;
    slots.forEach(slot => {
        (slot.id == id )?name = slot.name:null
    });
    return name;
}

function checkSlotEquality(){
    var isEqual;
    slots.forEach(slot => {
        if(slot.id == slotId && slot.state=='free'){
            isEqual= true;
        }
    }); 
    return isEqual;
}

function getCorpIdByName(index){
    var id=corps[index].corpseCode;
    return id;
}

// function validation(){
//     $("#name").change(function(){
//         var CorpseValidatonURL = $('.validatename').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#name').val()]));
//         response.isNameValid?$('#nameError').hide():$('#nameError').show();
//     });
//     $("#age").change(function(){
//         var CorpseValidatonURL = $('#validateage').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['age'],[$('#age').val()]));
//         response.isAgeValid?$('#ageError').hide():$('#ageError').show();
//     });
//     $('#hometown').change(function () {
//         var CorpseValidatonURL = $('.validatename').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#hometown').val()]));
//         response.isNameValid?$('#hometownError').hide():$('#hometownError').show();
//     });
//     $('#relativeName').change(function () {
//         var CorpseValidatonURL = $('.validatename').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#relativeName').val()]));
//         response.isNameValid?$('#relativeNameError').hide():$('#relativeNameError').show();
//     });
    
//     $('#remarks').change(function () {
//         var CorpseValidatonURL = $('#remarksURL').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['remarks'],[$('#remarks').val()]));
//         response.isRemarksValid?$('#remarksError').hide():$('#remarksError').show();
//     });
//     $('#releasedBy').change(function () {
//         var CorpseValidatonURL = $('.validatename').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#releasedBy').val()]));
//         response.isNameValid?$('#releasedByError').hide():$('#releasedByError').show();
//     });
//     $('#relativeContactOne').change(function () {
//         var CorpseValidatonURL = $('#contactURL').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['contact'],[$('#relativeContactOne').val()]));
//         response.isContactValid?$('#contactOneError').hide():$('#contactOneError').show();
//     });
//     $('#relativeContactTwo').change(function () {
//         var CorpseValidatonURL = $('#contactURL').attr('data-action');
//         var response = requestData(CorpseValidatonURL,"POST",createFormData(null,['contact'],[$('#relativeContactTwo').val()]));
//         response.isContactValid?$('#contactTwoError').hide():$('#contactTwoError').show();
//     });

    
// }
function generateCorpseUniqueId(){
    var splittedCorpseName;
    var corpseInitials;
    if(new RegExp('/\s/').test( $('#name').val())){
        splittedCorpseName = $('#name').val().split(' ');
        corpseInitials = splittedCorpseName[0].charAt(0) + splittedCorpseName[1].charAt(0)
    }else{
        corpseInitials = $('#name').val().charAt(0);
    }
    var morgeInitials ="OVM";
    var fridgeInitials = "FRG";
    var FridgeName = $(".fridgename").val();
    var slotNumber = $(".availableslots").val() == null?getSlotNameById(slotId):$(".availableslots").val();
    return morgeInitials + "-" + corpseInitials + "-" + fridgeInitials + "-" + FridgeName + "-" + slotNumber;

}


