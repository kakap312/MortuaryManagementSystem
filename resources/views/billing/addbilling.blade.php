
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addbillingsection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='createbillingform' data-action="{{ route('createbill')}}"  enctype="multipart/form-data">
    <div class='forminstructon'>
    <p id='topdecoration' ></p>
    <h2 id='billingregistrationtext'>Corpse Billing Form</h2>
    <p id='billinfinstruction'>Complete the billing  form below to create a new Bill.</p>
    </div><hr/>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Date</label>
    <input class="form-control datecreated" type="date" id='datecreated' name="datecreated" required>
    <p class='dateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, date is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="{{ route('validatename')}}">
    <label for="floatingInput">coprse ID:</label>
    <input class="form-control searchcorp corpseseachId"  type="text" id='corpseseachId' name="corpseId" data-action="{{ route('searchcorp')}}" required>
    <p class='billIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, corpse not found</p>
    </div>
    

    <div class='form-row' id='fetchservices' data-action="{{ route('fetchservices')}}">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Service</label>
    <!-- <input type='number' class="form-control" placeholder='Please Enter service Fee' id='services' name='servicefee'></input> -->
    <select class="form-control js-example-basic-multiple services" id='services' name='services' multiple='multiple' style='width:100%;'>
    </select>
    <p id='servideiderror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, service is invalid</p>
    </div>
    </div>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Bill Purpose</label>
    <textarea class="form-control" id='billfor' name='billfor' style='width:100%;'>
    </textarea>
    <p class='billdescriptionerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, your description is invalid.</p>
    </div>
    </div>

    <div class='form-row'>
    <div class="form-floating mb-3 col updateBillingUrl" data-action="{{ route('updatebill')}}">
    <label for="floatingInput">Due Amount(GHC)</label>
    <input class="form-control duedaysamount" type="text" id='duedaysamount' name="days" disabled>
    </div>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Extra Amount(GHC)</label>
    <input class="form-control" type="text" id='extradaysamount' name="extradays" disabled>
    <p id='ageError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Age shouldnt contain letters and must not be empty.</p>
    </div>
    </div>

    <div class="form-floating mb-3">
    <label for="floatingInput">Sub-Total (GHC)</label>
    <input class="form-control billsubtotal" type="text" id='billsubtotal' name="amount" disabled>
    <p class='billamounterror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, amount is invalid.</p>
    </div>
    
    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="addbilling"  class="ibtn btn-primary addbilling">Add Billing</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

