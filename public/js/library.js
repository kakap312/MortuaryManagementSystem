/* 
parameters - these are attribute sent to the functions on server.
values - these are values attached to parameters
existingFormData - is an already existing formData which needs an append
*/

export function createFormData(existingFormData,parameters,values){
   let  createdFormData;
    if(existingFormData == null){
        createdFormData = new FormData();
        for (let index = 0; index < parameters.length; index++) {
            createdFormData.append(parameters[index],values[index]);
        }
        return createdFormData;
    }else{
        createdFormData = new FormData(existingFormData);
        for (let index = 0; index < parameters.length; index++) {
            createdFormData.append(parameters[index],values[index]);
        }
        return createdFormData;
    }
}
export function showMessage(status,stringName,messageContainer,alertStatus=false){
    if(!alertStatus){
        status? $(messageContainer).html(""): $(messageContainer).html(stringValue(stringName)).css("color","orange").show();
    }else{
        alert(stringValue(stringName));
    }
    
}

export function requestDataFromSever(url,method,formdata){
    var requestData;
    $.ajax({
        url:url,
        type:method,
        data:formdata,
        processData:false,
        cache:false,
        async:false,
        headers:{'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')},
        contentType:false,
        dataType:"JSON",
        success:function(data){
            requestData = data;
        },
        error: function(XMLHTTPRequest, textStatus, errorThrown){
            alert(errorThrown);
        }
    });//end of ajax
    return requestData;
}
export function showOrHideSection(sectionname){
     var sections = ['.renamedrugssection','.addbillingsection','.viewbillingsection','.viewcorpsection','.addcorpsection','.statisticssection','.corpdetailsection']
    for (let index = 0; index < sections.length; index++) {
        if(sectionname == sections[index]){
            $(sections[index]).show()
        }else{
            $(sections[index]).hide()
        } 
    }
}
export function resetForm(formId) {
    $(formId).trigger('reset');
}

export function stringValue(name){
      var stringMap = new Map([
        ["USERNAME_VALIDATION_ERROR","Sory username is invalid, username must be like [Stephen@1995] with maximum lenght of eight"],
        ["PASSWORD_VALIDATION_ERROR","Sory Password is invalid, Password maximum lenght must be eight"],
        ["REGISTERED_SUCCESS","Congratulation!, Registration is done successfully"],
        ["REGISTERED_ERROR","Sorry!, Registration was unsuccessfully. Kindly check your data inputed and try again"],
        ["CORP_NOT_FOUND","Sorry No corp was found. Kindly Try again"],
        ["DELETE_SUCCESS","Congratulation, you have successfully deleted the corpse"],
        ["SLOT_FREE","Congratulation, you have successfully freed this slot"],
        ["UPDATE_SUCCESS","Congratulation, you have successfully updated this corpse"],
        ["UPDATE_ERROR","sorry, update was unsuccessfully.Plz try again"],
        ["CREATE_CORPSE_CONFIRMATION","Are you sure you want to add Corpse"],
        ["CREATE_BILLING_CONFIRMATION","Are you sure you want to add Bill"],
        ["UPDATE_CORPSE_CONFIRMATION","Are you sure you want to update Corpse"],
        ["BILL_CREATION_SUCCESS","Congratulation Bill created successfully"]
    ]
        )
    return stringMap.get(name);
}
export function  printPageSection(elementId){
    $(elementId).printThis({
        importCSS:true,
        loadCSS:"../css/style.css",
        importStyle: true,
        base:"https://localhost/MMS/public/"
    });
}
