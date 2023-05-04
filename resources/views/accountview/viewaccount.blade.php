<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewaccountsection " data-action= "{{route('accounts')}}">
    <div class="card info-card sales-card viewvillurl" data-action="{{ route('viewbills')}}">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchbtn"  class="ibtn btn-primary searchbtn" data-action="{{ route('searchclearance')}}">Search</button>
        <input  class='form-control searchClearance'   type='text' placeholder='Enter Username' />
    </div>
        <div class='table-responsive-lg' id='deletebill' data-action= "{{route('deletebill')}}">
    <table class='table-lg table-striped accountviewtable' border=1 style='width:100%'>
    <tr class='table-primary' style='padding:10px;'>
    <th >S/N</th>
    <th>Date</th>
    <th>Username</th>
    <th>Password</th>
    <th>User_Type</th>
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
