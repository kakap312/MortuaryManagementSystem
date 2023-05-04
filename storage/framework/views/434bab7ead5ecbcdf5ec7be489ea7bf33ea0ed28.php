<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewpaymentsection " data-action= "<?php echo e(route('fetchpayments')); ?>">
    <div class="card info-card sales-card viewvillurl" data-action="<?php echo e(route('viewbills')); ?>">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchbtn"  class="ibtn btn-primary searchpaymentbtn searchbtn" data-action="<?php echo e(route('searchpayment')); ?>">Search</button>
        <input  class='form-control searchpayment' style='height:35px;'   type='text' placeholder='Bill Id / PaymentId' />
    </div>
        <div class='table-responsive-lg' id='deletepayment' data-action= "<?php echo e(route('deletepayment')); ?>">
    <table class='table-lg table-striped billsviewtable' border=1 style='width:100%'>
    <tr class='table-primary' style='padding:10px;'>
    <th >S/N</th>
    <th>Date Created</th>
    <th>Bill Code</th>
    <th>Amount Paid</th>
    <th>Action</th>
    </tr>
    </table> 
</div>
<div style='margin-top:30px;' >
        <div id='status'>
        <span class='displayNumber'></span><span>/</span><span class='totalNumber'></span><span style='color:red;margin-left:10px;'>Please Use the search bar to find your corpse.</span>
        
        </div>
        <!-- <div  id='next-previous' style='float:right;'>
            <button type='button' class="ibtn btn-primary previous">< Previous</button>
            <button type='button' class="ibtn btn-primary next">Next ></button>

        </div> -->
        
        
    </div>
    </div>
    </div>
</div><!-- End Sales Card -->
