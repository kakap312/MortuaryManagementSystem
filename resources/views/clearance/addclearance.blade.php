
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addclearancesection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='createclearanceform' data-action="{{ route('createclearance')}}"  enctype="multipart/form-data">
    <div class='forminstructon'>
    <p id='topdecoration' ></p>
    <h2 id='corpseregistrationtext'>Corpse Clearnace Form</h2>
    <p id='billinfinstruction'>Complete the Clearance  form below to clear a corpse.</p>
    </div><hr/>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Date</label>
    <input class="form-control" type="date" id='datecreated' name="datecreated" required>
    <p id='dateerror' class='dateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, date is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="{{ route('validatename')}}">
    <label for="floatingInput">coprse ID:</label>
    <input class="form-control searchcorp corpseCode"  type="text" id='corpseId' name="corpId" data-action="{{ route('searchcorp')}}" required>
    <p class='corpseIdError' id='corpseIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, corpse not found</p>
    </div>
    

    <div class='form-row' id='fetchservices' data-action="{{ route('fetchservices')}}">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">State</label>
    <!-- <input type='number' class="form-control" placeholder='Please Enter service Fee' id='services' name='servicefee'></input> -->
    <select class="form-control state" id='state' name='state' style='width:100%;'>
    <option value='true'>Cleared</option>
    <option value='false'>not Cleared</option>
    </select>
    <p id='stateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, fee is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="clearcorpsebtn"  class="ibtn btn-primary">Clear Corpse</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

