
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewcorpsection " data-action= "<?php echo e(route('fetchcorps')); ?>">
    <div class="card info-card sales-card deletecorp" data-action="<?php echo e(route('deletecorp')); ?>">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchbtn"  class="ibtn btn-primary">Search</button>
        <input  class='form-control searchcorp' data-action="<?php echo e(route('searchcorp')); ?>" type='text' placeholder='Search corps by Id' />
    </div>
        <div class='table-responsive'>
    <table class='table-sm table-striped corpsviewtable' border=1>
    <tr class='table-primary'>
    <th>S/N</th>
    <th>ID</th>
    <th>CORP NAME</th>
    <th>SEX</th>
    <th>ADMI DATE</th>
    <th>COLL DATE</th>
    <th>DAY(S)</th>
    <th>CATEGORY</th>
    <th>REL NAME</th>
    <th>REL #1</th>
    <th>REL #2</th>
    <th>ACTION</th>
    </tr>
    </table> 
    </div>
    <div style='margin-top:30px;' >
        <div id='status'>
        <span id='displayNumber'></span><span>/</span><span id='totalNumber'></span><span style='color:red;margin-left:10px;'>Please Use the search bar to find your corpse.</span>
        
        </div>
        <!-- <div  id='next-previous' style='float:right;'>
            <button type='button' class="ibtn btn-primary previous">< Previous</button>
            <button type='button' class="ibtn btn-primary next">Next ></button>

        </div> -->
        
        
    </div>
    </div>
    </div>
</div><!-- End Sales Card -->
