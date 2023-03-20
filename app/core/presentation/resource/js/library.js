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
export function showMessage(response,messageContainer){
    response.success? $(messageContainer).hide(): $(messageContainer).html(response.message).css("color","orange").show();
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
        contentType:false,
        dataType:"JSON",
        success:function(data){
            requestData = data; 
        },
        error: function(XMLHTTPRequest, textStatus, errorThrown){
            alert(textStatus);
        }
    });//end of ajax
    return requestData;
}
export function showOrHideSection(sectionname){
     var sections = ['.renamedrugssection','.fetchdrugsection','.adddrugssection','.createordersession']
    for (let index = 0; index < sections.length; index++) {
        if(sectionname == sections[index]){
            $(sections[index]).show()
        }else{
            $(sections[index]).hide()
        } 
    }
}
