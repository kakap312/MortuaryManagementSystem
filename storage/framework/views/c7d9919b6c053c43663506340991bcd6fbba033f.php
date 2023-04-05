
<!-- Sales Card -->
<div class="col-xxl-8 col-md-8 addPaymentsection">
    <div class="card info-card sales-card">
    <div class="card-body">
    
    <form id='createPaymentform' class='createPaymentform' data-action="<?php echo e(route('makepayment')); ?>"  enctype="multipart/form-data">
    <div class='forminstructon'>
    <p id='topdecoration' ></p>
    <h2 id='paymentregistrationtext'>Create Payment  Form</h2>
    <p id='paymentinstruction'>Complete the Payment form below to create a new Payment.</p>
    </div><hr/>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Date</label>
    <input class="form-control datecreated" type="date" id='datecreated' name="datecreated" required>
    <p class='paymentdateerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, date is invalid</p>
    </div>
    </div>

    <div class="form-floating mb-3 updatepayment"  data-action="<?php echo e(route('updatepayment')); ?>">
    <label for="floatingInput">Bill ID:</label>
    <input class="form-control searchbill"  type="text" id='billId' name="billId" data-action="<?php echo e(route('searchbill')); ?>" required>
    <p class='billIdError' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, Bill not found</p>
    </div>
    

    <div class='form-row' id='fetchservices' data-action="<?php echo e(route('fetchservices')); ?>">
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Amount</label>
    <input type='number' class="form-control amount" placeholder='Please Enter service Fee' id='services' name='amount'></input>
    <!-- <select class="form-control js-example-basic-multiple" id='services' name='services' multiple='multiple' style='width:100%;'>
    </select> -->
    <p class='amounterror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, amount is invalid</p>
    </div>
    </div>

    <div class='form-row'>
    <div class="form-floating mb-3 col">
    <label for="floatingInput">Description</label>
    <textarea class="form-control billfor" id='billfor' name='description' style='width:100%;'>
        
    </textarea>
    <p class='descriptionerror' style='display:none;color:red;font-size:15px;margin:10px;'>Sorry, your description is invalid.</p>
    </div>
    </div>
    
    <div class="form-floating mb-3">
    <div class="form-button">
    <button type='button' id="addpaymentbtn"   class="ibtn btn-primary addpaymentbtn">Add Payment</button>
    </div>      
    </div>
    </form>   
    </div>
    </div>
</div><!-- End Sales Card -->

