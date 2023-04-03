
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addPaymentsection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='createbillingform' data-action="{{ route('createbill')}}"  enctype="multipart/form-data">
    <div class='forminstructon'>
    <p id='topdecoration' ></p>
    <h2 id='corpseregistrationtext'>Create Payment  Form</h2>
    <p id='billinfinstruction'>Complete the Payment form below to create a new Payment.</p>
    </div><hr/>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Date</label>
    <input class="form-control" type="date" id='datecreated' name="datecreated" required>
    <p id='dateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, date is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3 validatename"  data-action="{{ route('validatename')}}">
    <label for="floatingInput">Bill ID:</label>
    <input class="form-control searchcorp"  type="text" id='corpseId' name="corpseId" data-action="{{ route('searchcorp')}}" required>
    <p id='corpseIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Bill not found</p>
    </div>
    

    <div class='form-row' id='fetchservices' data-action="{{ route('fetchservices')}}">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Amount</label>
    <input type='number' class="form-control" placeholder='Please Enter service Fee' id='services' name='servicefee'></input>
    <!-- <select class="form-control js-example-basic-multiple" id='services' name='services' multiple='multiple' style='width:100%;'>
    </select> -->
    <p id='feeerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, fee is invalid</p>
    </div>
    </div>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Description</label>
    <textarea class="form-control" id='billfor' name='billfor' style='width:100%;'>
        
    </textarea>
    <p id='descriptionerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, your description is invalid.</p>
    </div>
    </div>
    
    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="addbilling"  class="ibtn btn-primary">Add Billing</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->
