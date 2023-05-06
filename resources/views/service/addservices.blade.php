
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addservicesection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='createserviceform' data-action="{{ route('addservice')}}"  enctype="multipart/form-data">
    <div class='forminstructon'>
    <p id='topdecoration' ></p>
    <h2 class='serviceregistrationtext' id='serviceregistrationtext'>Service Form</h2>
    <p class='serviceinstruction' id='serviceinstruction'>Complete the Service form below to add a service.</p>
    </div><hr/>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Date</label>
    <input class="form-control datecreated" type="date" id='datecreated' name="datecreated" required>
    <p id='dateerror' class='dateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, date is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="{{ route('validatename')}}">
    <label for="floatingInput">Service Name</label>
    <input class="form-control  servicename"  type="text" id='servicename' name="servicename" required>
    <p class='servicenameError' id='corpseIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, corpse not found</p>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="{{ route('validatename')}}">
    <label for="floatingInput">Charged Per</label>
    <select class="form-control per" name='per'>
        <option value="daily">Daily</option>
        <option value ='once'>Once</option>
    </select>
    <p class='chargedper' id='corpseIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, corpse not found</p>
    </div>
    

    <div class='form-row' id='updateservice' data-action="{{ route('updateservice')}}">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Fee</label>
    <input type='number' class="form-control" placeholder='Please Enter service Fee' id='servicefee' name='servicefee'></input>
    <!-- <select class="form-control state" id='state' name='state' style='width:100%;'>
    <option value='true'>Cleared</option>
    <option value='false'>not Cleared</option>
    </select> -->
    <p id='stateerror' class='stateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, fee is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="addservicebtn"  class="ibtn btn-primary addservicebtn">Add Service</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

