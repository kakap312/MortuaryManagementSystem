
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addaccountsection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='createaccountform' data-action="<?php echo e(route('createaccount')); ?>"  enctype="multipart/form-data">
    <div class='forminstructon'>
    <p id='topdecoration' ></p>
    <h2 class='accountregistrationtext'>Account Creation Form </h2>
    <p class='accountinstruction'>Complete the form below to create an account</p>
    </div><hr/>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Date</label>
    <input class="form-control datecreated" type="date" id='datecreated' name="datecreated" required>
    <p id='dateerror' class='dateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, date is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="<?php echo e(route('validatename')); ?>">
    <label for="floatingInput">Username:</label>
    <input class="form-control username"  type="text"  name="username" required>
    <p class='usernameerror' id='corpseIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, corpse not found</p>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="<?php echo e(route('validatename')); ?>">
    <label for="floatingInput">Password:</label>
    <input class="form-control password"  type="text" name="password" required>
    <p class='passworderror' id='corpseIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, corpse not found</p>
    </div>

    <div class='form-row' id='updateaccount' data-action="<?php echo e(route('updateaccount')); ?>">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Privillege</label>
    <!-- <input type='number' class="form-control" placeholder='Please Enter service Fee' id='services' name='servicefee'></input> -->
    <select class="form-control state previllege" id='state' name='type' style='width:100%;'>
    <option value='admin'>Admin</option>
    <option value='user'>User</option>
    </select>
    <p id='privillege' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, type is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="createaccountbtn"  class="ibtn btn-primary createaccountbtn">Add Account</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

