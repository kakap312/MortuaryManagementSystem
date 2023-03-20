
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addcorpsection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='registercorpform' data-action= "{{route('createcorp')}}"  enctype="multipart/form-data">
    <div class='forminstructon' data-action= "{{route('updatecorp')}}" >
    <p id='topdecoration' ></p>
    <h2 id='corpseregistrationtext'>Corpse Registration Form</h2>
    <p id='corpseinstruction'>Complete the registration below to create a new Corp registration</p>
    </div><hr/>
    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Admission Date</label>
    <input class="form-control" type="date" id='admissionDate' name="admissionDate" required>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Colection Date</label>
    <input class="form-control" type="date" id='collectionDate' name="collectionDate" required>
    </div>
    </div>
    <div class="form-floating mb-3 validatename"  data-action="{{ route('validatename')}}">
    <label for="floatingInput">Name Of Corp</label>
    <input class="form-control"  type="text" id='name' name="name" required>
    <p id='nameError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Name must be 30 characters and must not contain numbers</p>
    </div>
    <div class='form-row' id='validateage' data-action="{{ route('validateage')}}">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Age</label>
    <input class="form-control" type="number" id='age' name="age" required>
    <p id='ageError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Age shouldnt contain letters and must not be empty.</p>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Sex</label>
    <select class="druglocation js-example-basic-single form-control" id='sex' name='sex'>
    <option value='M'>M</option>
    <option value='F'>F</option>
    </select>
    </div>
    </div>
    <div class="form-floating mb-3">
    <label for="floatingInput">Hometown</label>
    <input class="form-control" type="text" id='hometown' name="hometown" required>
    <p id='hometownError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, hometown must be 30 characters and must not contain numbers</p>
    </div>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Fridge Name</label>
    <select class="fridgename js-example-basic-single form-control" data-action="{{ route('fetchfridges')}}" id='fridgename' name='fridgename'>
    <option disabled selected>choose a fridge</option>
    </select>
    </div>
    <div class="form-floating mb-3 col" id='slotsurl' data-action="{{route('fetchslots')}}">
    <label for="floatingInput">Available Slots</label>
    <select  class="availableslots js-example-basic-single form-control" id='slots' name='availableslots' data-action="{{ route('fetchavailableslots')}}">
    <option disabled selected>choose a slot</option>
    </select>
    <button id='freeslot' style='display:none' data-action="{{ route('freeslot')}}"  class='btn btn-info' type='button'>Free Slot</button>
    </div>
    </div>
    <div class="form-floating mb-3">
    <label for="floatingInput">Relative Name</label>
    <input class="form-control" type="text" id='relativeName' name="relativeName" required>
    <p id='relativeNameError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, name must be 30 characters and must not be empty.</p>
    </div>
    
    <div class='form-row' id='contactURL' data-action="{{route('validatecontact')}}">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Relative Contact One</label>
    <input class="form-control" type="number" id='relativeContactOne' name="relativeContactOne" required>
    <p id='contactOneError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, contact must have a maximum of 10 characters and must not be empty</p>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Relative Contact Two</label>
    <input class="form-control" type="number" id='relativeContactTwo' name="relativeContactTwo" required>
    <p id='contactTwoError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, contact must have a maximum of 10 characters and must not be empty</p>
    </div>
    </div>

    <div class="form-floating mb-3">
    <label for="floatingInput">Released By</label>
    <input class="form-control" type="text" id='releasedBy' name="releasedBy" required>
    <p id='releasedByError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, remarks must have a maximum of 100 characters and must not be empty</p>
    </div>

    <div class="form-floating mb-3" id='remarksURL' data-action="{{route('validateremark')}}">
    <label for="floatingInput">Remarks/Comment</label>
    <textarea class="form-control" type="text" id='remarks' name="remarks" required></textarea>
    <p id='remarksError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, remarks must have a maximum of 100 characters and must not be empty</p>
    </div>
    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="registercorpbtn"  class="ibtn btn-primary">Register</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

