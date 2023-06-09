
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addcorpsection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='registercorpform' data-action= "<?php echo e(route('createcorp')); ?>"  enctype="multipart/form-data">
    <div class='forminstructon' id="corpseupdateurl" data-action= "<?php echo e(route('updatecorp')); ?>" >
    <p id='topdecoration' ></p>
    <h2 id='corpseregistrationtext' class='fetchslot' data-action= "<?php echo e(route('fetchslots')); ?>">Corpse Registration Form</h2>
    <p id='corpseinstruction' class='totalcorpse' data-action= "<?php echo e(route('totalcorpse')); ?>">Complete the registration below to create a new Corp registration</p>
    </div><hr/>
    <div class='form-row'>
    <div class="form-floating mb-3 col fetchcorpse" data-action="<?php echo e(route('fetchcorps')); ?>">
    <label for="floatingInput">Admission Date <sup class='compulsoryindicator'>*</sup></label>
    <input class="form-control date" type="date" id='admissionDate' name="admissionDate" format='dd/mm/yyyy' required>
    <p id="admissiondateerror" style='display:none;color:red;font-size:15px;margin:10px;'>Sorry date must not be empty</p>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Collection Date <sup class='compulsoryindicator'>*</sup></label>
    <input class="form-control date" type="date" id='collectionDate' name="collectionDate" required>
    <p id="collectiondateerror" style='display:none;color:red;font-size:15px;margin:10px;'>Sorry date must not be empty</p>
    </div>
    </div>
    <div class="form-floating mb-3 validatename"  data-action="<?php echo e(route('validatename')); ?>">
    <label for="floatingInput">Name Of Corp <sup class='compulsoryindicator'>*</sup></label>
    <input class="form-control"  type="text" id='name' name="name" required>
    <p id='nameError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Name must be 30 characters and must not contain numbers</p>
    </div>
    <div class='form-row' id='validateage' data-action="<?php echo e(route('validateage')); ?>">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Age <sup class='compulsoryindicator'>*</sup></label>
    <input class="form-control" type="number" id='age' name="age" required>
    <p id='ageError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Age shouldnt contain letters and must not be empty.</p>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Sex <sup class='compulsoryindicator'>*</sup></label>
    <select class="druglocation js-example-basic-single form-control" id='sex' name='sex'>
    <option value='M'>M</option>
    <option value='F'>F</option>
    </select>
    <p id='sexError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Kindly choose sex.</p>
    </div>
    </div>
    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Hometown <sup class='compulsoryindicator'>*</sup></label>
    <input class="form-control" type="text" id='hometown' name="hometown" required>
    <p id='hometownError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, hometown must be 30 characters and must not contain numbers</p>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Category <sup class='compulsoryindicator'>*</sup></label>
    <select class="js-example-basic-single form-control category"  name='category'>
    <option value='VIP'>VIP</option>
    <option value='Regular'>Regular</option>
    </select>
    <p id='hometownError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, hometown must be 30 characters and must not contain numbers</p>
    </div>
    </div>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Fridge Name <sup class='compulsoryindicator'>*</sup></label>
    <select class="fridgename js-example-basic-single form-control" data-action="<?php echo e(route('fetchfridges')); ?>" id='fridges' name='fridgename'>
    <option diabled>choose a fridge</option>    
    </select>
    <p id='fridgeerrormessage' style='display:none; color:red;'>Please choose a  Fridge</p>
    </div>
    <div class="form-floating mb-3 col" id='slotsurl' >
    <label for="floatingInput">Available Slots <sup class='compulsoryindicator'>*</sup></label>
    <select  class="availableslots js-example-basic-single form-control" id='slots' name='availableslots' data-action="<?php echo e(route('fetchavailableslots')); ?>">
    </select><br>
    <p id='sloterrormessage' style='display:none; color:red;'>No Slot available for the Fridge Selected.</p>
    <button id='freeslot' style='display:none; width:inherit;' data-action="<?php echo e(route('freeslot')); ?>"  class='btn btn-info' type='button'>Free Slot</button>
    </div>
    </div>
    <div class="form-floating mb-3">
    <label for="floatingInput">Relative Name <sup class='compulsoryindicator'>*</sup></label>
    <input class="form-control acctype" type="text" data-action="<?php echo e(route('accounttype')); ?>" id='relativeName' name="relativeName" required>
    <p id='relativeNameError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, name must be 30 characters and must not be empty.</p>
    </div>
    
    <div class='form-row' id='contactURL' data-action="<?php echo e(route('validatecontact')); ?>">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Relative Contact One <sup class='compulsoryindicator'>*</sup></label>
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
    <label for="floatingInput">Received By <sup class='compulsoryindicator'>*</sup></label>
    <select class="form-control"  name="releasedBy" id='releasedBy'>
    <option value="Kusi Peter">Kusi Peter</option>
    <option value="Sixtus Addo">Sixtus Addo</option>    
    </select>
    <!-- <input class="form-control" type="text" id='releasedBy' name="releasedBy" required> -->
    <p id='releasedByError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, remarks must have a maximum of 100 characters and must not be empty</p>
    </div>

    <div class="form-floating mb-3" id='remarksURL' data-action="<?php echo e(route('validateremark')); ?>">
    <label for="floatingInput">Remarks/Comment</label>
    <textarea class="form-control" type="text" id='remarks' name="remarks" required></textarea>
    <p id='remarksError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, remarks must have a maximum of 100 characters and must not be empty</p>
    </div>
    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id='registerbtn'  class="ibtn btn-primary registerbtn">Register</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

