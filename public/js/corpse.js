
import {requestDataFromSever,createFormData,showMessage,showOrHideSection,stringValue,printPageSection,resetForm} from './library.js';
var corps;
var fridges;
var slots;
var corpId;
var slotId;
$(document).ready(function(){
    fetchFridges();
    populateFridges();
    fetchCorpse();
    
    validation();
    var list = [1,2,3,4,5,6,7,8,4,7,9,3];
    var maximumDisplayDigit = 5; 
    var startDisplayFrom = maximumDisplayDigit; //2


    $('.next').click(function(){
        var currentNumberOfElementInList = list.length - startDisplayFrom // (12) - (5) = 7; //3
        if(currentNumberOfElementInList > 5){
            for ( var i = startDisplayFrom; i < (startDisplayFrom+5); i++){
                console.log(list[i]);
            }
            startDisplayFrom = startDisplayFrom + 5; //
            console.log(currentNumberOfElementInList);
        }else if (currentNumberOfElementInList > 0  && currentNumberOfElementInList < 5 ){
            for (var i=startDisplayFrom; i< startDisplayFrom + currentNumberOfElementInList; i++){
                console.log(list[i]);
                //populatetable(index,bound);
            }
            startDisplayFrom = startDisplayFrom + currentNumberOfElementInList;
            console.log(currentNumberOfElementInList);
        }else if ((startDisplayFrom + currentNumberOfElementInList) == list.length){
            console.log("No item to display");
        }
        
    });
    $('.previous').click(function(){
        var currentNumberOfElementInList = list.length + startDisplayFrom // (12) - (5) = 7; //3
        if(currentNumberOfElementInList < 5){
            for ( var i = startDisplayFrom; i < (startDisplayFrom+5); i++){
                console.log(list[i]);
            }
            startDisplayFrom = startDisplayFrom + 5; //
            console.log(currentNumberOfElementInList);
        }else if (currentNumberOfElementInList > 5){
            for (var i=startDisplayFrom; i< startDisplayFrom + currentNumberOfElementInList; i++){
                console.log(list[i]);
                //populatetable(index,bound);
            }
            startDisplayFrom = startDisplayFrom + currentNumberOfElementInList;
            console.log(currentNumberOfElementInList);
        }else if ((startDisplayFrom + currentNumberOfElementInList) == list.length){
            console.log("No item to display");
        }
        
    });
    $("#addcorplink").click(function(){
        showOrHideSection('.addcorpsection');
        resetForm('#registercorpform');
        $('#registercorpbtn').html('Register');
        $('#corpseregistrationtext').html('');
        $('#corpseinstruction').html('');
        $('#corpseregistrationtext').html('Corpse Registration Form');
        $('#corpseinstruction').html('Complete the registration below to create a new Corp registration');
    });

    $("#viewcorplink").click(function(){
        showOrHideSection('.viewcorpsection');
        fetchCorpse();
        populateCorpView();
    });
    $('.fridgename').change(function(){
        var fridgeId = getFridgeIdByName(($(this).val()));
        fetchAvailableSlotByFidgeId(fridgeId)
        populateSlots();
    });
    $('#printbtn').click(function(){
         //printPageSection('#corpsecontent');
         $('#corpsecontent').printThis({
            importCSS:true,
            loadCSS:"/css/style.css",
            importStyle: true,
            base:"http://localhost/MortuaryManagementSystem/public/"
        });
    });
    $("#registercorpbtn").click(function(e){
        var state = $("#registercorpbtn").html();
        var fridgeId =getFridgeIdByName($('.fridgename').val());
        var slotId = getSlotIdByName($('.availableslots').val());
        var createCorpUrl = $('#registercorpform').attr('data-action');
        if(state == 'Register'){
            if(confirm(stringValue("CREATE_CORPSE_CONFIRMATION"))){
                var corpseCode = generateCorpseUniqueId();
                var response = requestDataFromSever(createCorpUrl,"POST",createFormData($("#registercorpform")[0],['fridgeId','slotId','corpseCode'],[fridgeId,slotId,corpseCode]));
            if(response.success){
                showMessage(response.success,"REGISTERED_SUCCESS",null,true);
                resetForm('#registercorpform');
            }else{
                response.isAdmissionDateValid ?$('#admissiondateerror').hide(): $('#admissiondateerror').show();
                response.isCollectionDateValid ?$('#collectiondateerror').hide(): $('#collectiondateerror').show();
                response.isCorpseNameValid ?$('#nameError').hide(): $('#nameError').show();
                response.homeTownValidator ?$('#hometownError').hide(): $('#hometownError').show();
                response.isRelativeNameValid ?$('#relativeNameError').hide(): $('#relativeNameError').show();
                response.isReleasedByValid ?$('#releasedByError').hide(): $('#releasedByError').show();
                response.isAgeValid ?$('#ageError').hide(): $('#ageError').show();
                response.isSexValid ?$('#sexError').hide(): $('#sexError').show();
                response.isContactOneValid ?$('#contactOneError').hide(): $('#contactOneError').show();
                response.isContactTwoValid ?$('#contactTwoError').hide(): $('#contactTwoError').show();
                response.isCommentValid ?$('#remarksError').hide(): $('#remarksError').show();
                response.isSlotValid ?$('#sloterrormessage').hide(): $('#sloterrormessage').show();
                response.isFridgeValid ?$('#remarksError').hide(): $('#remarksError').show();
                showMessage(response.isCorpCreated,"REGISTERED_ERROR",null,true);
            }
        }
        }else if(state == 'Update'){
            createCorpUrl = $('.forminstructon').attr('data-action')
            if(confirm(stringValue('UPDATE_CORPSE_CONFIRMATION'))){
                var response = requestDataFromSever(createCorpUrl,"POST",createFormData($("#registercorpform")[0],['fridgeId','slotId','corpId'],[fridgeId,slotId,corpId]));
                (response.success)?showMessage(response.success,"UPDATE_SUCCESS",null,true):showMessage(response.success,"UPDATE_ERROR",null,true);  
            }
        }  
    });
    $('#freeslot').click(function(){
        var freeSlotURL = $('#freeslot').attr('data-action');
        fetchAvailableSlotByFidgeId(getFridgeIdByName($('.fridgename').val()));
        var response = requestDataFromSever(freeSlotURL,"POST",createFormData(null,['slotId'],[slotId]));
        if(response.success){
            showMessage(response.success,"SLOT_FREE",null,true);
            $('.availableslots').show();
            $('#freeslot').hide();
            fetchAvailableSlotByFidgeId(getFridgeIdByName(($('.fridgename').val())));
            populateSlots();
        }
    });
    $('#searchbtn').click(function(){
        var searchCorpUrl = $('.searchcorp').attr('data-action');
        var response = requestDataFromSever(searchCorpUrl,"POST",createFormData(null,['corpId'],[$('.searchcorp').val()]));
        corps = response.corps;
        (response.corps == null)?showMessage(true,"CORP_NOT_FOUND",null,true):populateCorpView();
        $('.searchcorp').val("");
    });
    
}); // end of $(document).ready function

function fetchAvailableSlotByFidgeId(fridgeId){
    var availableSlotUrl = $('.availableslots').attr('data-action'); 
        var response = requestDataFromSever(availableSlotUrl,"POST",createFormData(null,['fridgeid'],[fridgeId]));
        slots = response.slots;
}
function fetchFridges(){
    var fridgesUrl = $('.fridgename').attr('data-action');
    requestDataFromSever(fridgesUrl,"GET",createFormData(null,[''],['']))
    .then((data)=>{
        fridges = data.fridges;
    });
    
}
function fetchSlots(){
    var slotUrl = $('#slotsurl').attr('data-action');
    var response = requestDataFromSever(slotUrl,"GET",createFormData(null,[''],['']));
    slots = response.slots;
}
function fetchCorpse(){
    var fetchCorpUrl = $('.viewcorpsection').attr('data-action');
    var response = requestDataFromSever(fetchCorpUrl,"GET",createFormData(null,[''],[""]));
    corps = response.corps;
}
function populateCorpView(){
    $('.datarow').remove();
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
        "</td><td><select class='choose form-control'><option disabled selected>choose</option><option>Delete</option><option>Update</option><option>Details</option></select></td></tr>"
        )
}
 
    $('.choose').change(function(){
        ;
        if(($(this).val() == "Delete")){
            if(confirm("Are you sure you want to delete corp")){
                var deleteCorpUrl = $('.deletecorp').attr('data-action');
                corpId = getCorpIdByName(parseInt($(this).parent().siblings('.sn').html())-1);
                var response = requestDataFromSever(deleteCorpUrl,"POST",createFormData(null,['corpid'],[corpId]));
                if(response.success){
                    showMessage(response.isCorpDeleted,"DELETE_SUCCESS",null,true);
                    fetchCorpse();
                    populateCorpView();
                }else{

                }
            }
        }else if(($(this).val() == "Update")){
            showOrHideSection('.addcorpsection');
            corpId = getCorpIdByName(parseInt($(this).parent().siblings('.sn').html())-1);
            var currentCorpIndexNumber = parseInt($(this).parent().siblings('.sn').html())-1;
            slotId = getSlotIdByName(corps[currentCorpIndexNumber].slotName);
            populateCoprsForm(corps[currentCorpIndexNumber],checkSlotEquality());
        }else if(($(this).val() == "Details")){
            showOrHideSection('.corpdetailsection');
            corpId = getCorpIdByName(parseInt($(this).parent().siblings('.sn').html())-1);
            populateCorpDetail();
        }
    });
    
}
function populateFridges(){
    if(fridges != null){
        fridges.forEach(fridge=>{
            $('.fridgename').append('<option>'+fridge.name+'</option>');
        });
    }
}
function populateSlots(){
    $('.slotnames').remove();
    slots.forEach(slot => {
        (slot.state == 'free')?$('.availableslots').append('<option class="slotnames">'+slot.name+'</option>'):""; 
    });
}
function populateCorpDetail(){
    corps.forEach(corp => {
        if(corp.id == corpId){
            $('#date').html(new Date().toISOString().slice(0,10))
            $('#coprseId').html(corp.id)  
            $('#corpName').html(corp.name)
            $('#corpSex').html(corp.sex)
            $('#corpStatus').html("Cleared")
            $('#corpCategory').html("VIP")
            $('#corpAdmissionDate').html(corp.admissionDate)
            $('#corpCollectionDate').html(corp.collectionDate)
            $('#dayInFridge').html(corp.dueDays);
        }
    });
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
    $('#fridgename').val(corp.fridgeName);
    $('#remarks').val(corp.remarks);
    $('#sex').val(corp.sex);
    $('#relativeName').val(corp.relativeName);
    $('#relativeContactOne').val(corp.relativeContactOne);
    $('#relativeContactTwo').val(corp.relativeContactTwo);
    $('#releasedBy').val(corp.releasedBy);
    $('#registercorpbtn').html('Update');
    if(status){
        $('.availableslots').hide()
        $('#freeslot').show()
    }else{
        $('.availableslots').show()
        $('#freeslot').hide()
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
    fetchSlots()
    slots.forEach(slot => {
        (slot.name == name )?id = slot.id:null
    });
    return id;
}

function checkSlotEquality(){
    var isEqual;
    slots.forEach(slot => {
        if(slot.id == slotId && slot.state=='used'){
            isEqual= true;
        }
    }); 
    return isEqual;
}

function getCorpIdByName(index){
    var id=corps[index].id;
    return id;
}

function validation(){
    $("#name").change(function(){
        var CorpseValidatonURL = $('.validatename').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#name').val()]));
        response.isNameValid?$('#nameError').hide():$('#nameError').show();
    });
    $("#age").change(function(){
        var CorpseValidatonURL = $('#validateage').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['age'],[$('#age').val()]));
        response.isAgeValid?$('#ageError').hide():$('#ageError').show();
    });
    $('#hometown').change(function () {
        var CorpseValidatonURL = $('.validatename').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#hometown').val()]));
        response.isNameValid?$('#hometownError').hide():$('#hometownError').show();
    });
    $('#relativeName').change(function () {
        var CorpseValidatonURL = $('.validatename').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#relativeName').val()]));
        response.isNameValid?$('#relativeNameError').hide():$('#relativeNameError').show();
    });
    
    $('#remarks').change(function () {
        var CorpseValidatonURL = $('#remarksURL').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['remarks'],[$('#remarks').val()]));
        response.isRemarksValid?$('#remarksError').hide():$('#remarksError').show();
    });
    $('#releasedBy').change(function () {
        var CorpseValidatonURL = $('.validatename').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['name'],[$('#releasedBy').val()]));
        response.isNameValid?$('#releasedByError').hide():$('#releasedByError').show();
    });
    $('#relativeContactOne').change(function () {
        var CorpseValidatonURL = $('#contactURL').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['contact'],[$('#relativeContactOne').val()]));
        response.isContactValid?$('#contactOneError').hide():$('#contactOneError').show();
    });
    $('#relativeContactTwo').change(function () {
        var CorpseValidatonURL = $('#contactURL').attr('data-action');
        var response = requestDataFromSever(CorpseValidatonURL,"POST",createFormData(null,['contact'],[$('#relativeContactTwo').val()]));
        response.isContactValid?$('#contactTwoError').hide():$('#contactTwoError').show();
    });

    
}
function generateCorpseUniqueId(){
    var splittedCorpseName = $('#name').val().split(' ');
    var morgeInitials ="OVM";
    var corpseInitials = splittedCorpseName[0].charAt(0) + splittedCorpseName[1].charAt(0)
    var fridgeInitials = "FRG";
    var FridgeName = $(".fridgename").val();
    var slotNumber = $(".availableslots").val();
    return morgeInitials + "-" + corpseInitials + "-" + fridgeInitials + "-" + FridgeName + "-" + slotNumber;

}

