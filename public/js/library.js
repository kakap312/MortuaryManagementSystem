/* 
parameters - these are attribute sent to the functions on server.
values - these are values attached to parameters
existingFormData - is an already existing formData which needs an append
*/
export var userType = "s";

export function setUserType(value){
    userType = value;
}
export function getUserType(){
    return userType;
}
export function getActionMenu(){
    var actionmenu;
    if($('#header').attr('data-action') == "admin"){
        actionmenu = "</td><td><select class='choose form-control'><option disabled selected>choose</option><option>Delete</option><option>Update</option><option>Details</option></select></td></tr>"
    }else{
        actionmenu =  "</td><td><select class='choose form-control'><option disabled selected>choose</option><option>Update</option><option>Details</option></select></td></tr>"
    }
    return actionmenu;
}

export function createFormData(existingFormData,parameters,values){
        let  createdFormData;
        if(existingFormData == null){
            createdFormData = new FormData();
            for (let index = 0; index < parameters.length; index++) {
                createdFormData.append(parameters[index],values[index]);
            }
        }else{
            createdFormData = new FormData(existingFormData);
            for (let index = 0; index < parameters.length; index++) {
                createdFormData.append(parameters[index],values[index]);
            }
        }
        return createdFormData;
   
}
export function showMessage(status,stringName,messageContainer,alertStatus=false){
    if(!alertStatus){
        status? $(messageContainer).html(""): $(messageContainer).html(stringValue(stringName)).css("color","orange").show();
    }else{
        alert(stringValue(stringName));
    }
    
}

export function requestDataFromSever(url,method,formdata){
    var baseUrl = 'http://localhost/MortuaryManagementSystem/public/';
    return new Promise((resolve, reject) => {
        $.ajax({
            url:baseUrl + url,
            type:method,
            data:formdata,
            processData:false,
            cache:false,
            contentType:false,
            async:false,
            dataType:"json",
            success:function(data){
                resolve(data);
            },
            error: function(XMLHTTPRequest, textStatus, errorThrown){
                reject(errorThrown)
            }
        });//end of ajax

    });
}
export function requestData(url,method,formdata){
    var response;
        $.ajax({
            url:url,
            type:method,
            data:formdata,
            processData:false,
            cache:false,
            contentType:false,
            async:false,
            dataType:"json",
            success:function(data){
                response = data;
            },
            error: function(XMLHTTPRequest, textStatus, errorThrown){
                
            }
        });//end of ajax
        return response;
}
export function showOrHideSection(sectionname){
     var sections = ['.renamedrugssection','.accountdetailssection','.viewaccountsection','.addaccountsection','.servicedetailsection','.viewservicesection','.paymentdetailsection','.viewreportsection','.clearancedetailsection','.viewclearancesection','.addbillingsection','.addclearancesection','.viewpaymentsection','.addPaymentsection','.viewbillingsection','.viewcorpsection','.billdetailsection','.addcorpsection','.statisticssection','.corpdetailsection','.addservicesection']
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
        ["REGISTERED_ERROR","Sorry!, Registration was unsuccessful. Kindly check your data inputted and try again"],
        ["CORP_NOT_FOUND","Sorry No corp was found. Kindly Try again"],
        ["SERVICE_NOT_FOUND","Sorry No service was found. Kindly Try again"],
        ["DELETE_SUCCESS","Congratulation, you have successfully deleted the corpse"],
        ["SLOT_FREE","Congratulation, you have successfully freed this slot"],
        ["UPDATE_SUCCESS","Congratulation, you have successfully updated this corpse"],
        ["UPDATE_ERROR","sorry, update was unsuccessfully.Plz try again"],
        ["CREATE_CORPSE_CONFIRMATION","Are you sure you want to add Corpse"],
        ["CREATE_BILLING_CONFIRMATION","Are you sure you want to add Bill"],
        ["CREATE_ACCOUNT_CONFIRMATION","Are you sure you want to add account"],
        ["UPDATE_CORPSE_CONFIRMATION","Are you sure you want to update Corpse"],
        ["BILL_CREATION_SUCCESS","Congratulation Bill created successfully"],
        ["ACCOUNT_CREATION_SUCCESS","Congratulation account created successfully"],
        ["ACCOUNT_NOT_FOUND","Sorry Account is not found"],
        ["USERNAME_TAKEN","Sorry Username is taken"],
        ["CONFIRM_FREE_SLOT","Are you sure you want to free slot"],
        ["CREATE_PAYMENT_CONFIRMATION","Are you sure you want to make Payment?"],
        ["PAYMENT_CREATION_SUCCESS","Congratulation Payment created successfully"],
        ["PAYMENT_UPDATION_SUCCESS","Congratulation payment updation successfully"],
        ["CORPSE_CLEARED_SUCCESS","Congratulation corpse  cleared  successfully."],
        ["SERVICE_CREATED_SUCCESS","Congratulation service  created  successfully."],
        ["UPDATE_PAYMENT_CONFIRMATION","Are you sure you want to update Payment?"],
        ["UPDATE_BILLING_CONFIRMATION","Are you sure you want to update Billing?"],
        ["UPDATE_SERVICE_CONFIRMATION","Are you sure you want to update service ?"],
        ["BILL_UPDATE_SUCCESS","Congratulation, you have successfully updated this bill"],
        ["SERVICE_UPDATE_SUCCESS","Congratulation, you have successfully updated this service"],
        ["CLEAR_CORPSE_CONFIRMATION","Are you sure you want to clear this corpse?"],
        ["CREATE_SERVICE_CONFIRMATION","Are you sure you want to create a service?"],
        ["CORPSE_CLEARED_ERROR","sorry, corpse already cleared"],
        ["SERVICE_CREATED_ERROR","sorry, service was unsuccessful, Plz try again!"],
        ["GENERATE_REPORT_CONFIRMATION","Are you sure you want to generate a report?"],
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
