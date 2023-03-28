
import {requestData,createFormData} from './library.js';
var corps=[];
var fridges;
var slots;
var corpId;
var slotId;
var totalCorpse;
$(document).ready(function(){
  
    fetchServices();
    alert(corps)

    
        
}); // end of $(document).ready function
function fetchServices() {
    var response=  requestData('userdashboard/fetchservices',"GET",createFormData(null,[''],['']));
    corps = response.services;
}
