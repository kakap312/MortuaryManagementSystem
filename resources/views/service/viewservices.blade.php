<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewservicesection " data-action= "{{route('fetchserviceslimitfive')}}">
    <div class="card info-card sales-card">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchservicebtn"  class="ibtn btn-primary searchservicebtn" data-action="{{ route('searchservice')}}">Search</button>
        <input  class='form-control searchservice'   type='text' placeholder='Service id/name'/>
    </div>
        <div class='table-responsive-lg'>
    <table class='table-lg table-striped servicesviewtable' border=1 style='width:100%'>
    <tr class='table-primary' style='padding:10px;'>
    <th >S/N</th>
    <th>Date</th>
    <th>Service Name</th>
    <th>Fee Charged</th>
    <th>Per</th>
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
