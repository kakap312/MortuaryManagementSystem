<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewbillingsection " data-action= "<?php echo e(route('fetchcorps')); ?>">
    <div class="card info-card sales-card viewvillurl" data-action="<?php echo e(route('viewbills')); ?>">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchbillbtn"  class="ibtn btn-primary searchbillbtn searchbtn" data-action="<?php echo e(route('searchbill')); ?>">Search</button>
        <input  class='form-control searbill'   type='text' placeholder='Bill Id / Coprse Id' />
    </div>
        <div class='table-responsive-lg' id='deletebill' data-action= "<?php echo e(route('deletebill')); ?>">
    <table class='table-lg table-striped billsviewtable' border=1 style='width:100%'>
    <tr class='table-primary' style='padding:10px;'>
    <th >S/N</th>
    <th>Date</th>
    <th>Corpse Code</th>
    <th>Bill ID</th>
    <th>Bill Amount</th>
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
