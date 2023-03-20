<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewbillingsection " data-action= "{{route('fetchcorps')}}">
    <div class="card info-card sales-card deletecorp" data-action="{{ route('deletecorp')}}">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchbtn"  class="ibtn btn-primary">Search</button>
        <input  class='form-control searchcorp' data-action="{{ route('searchcorp')}}" type='text' placeholder='Bill Id / Coprse Id' />
    </div>
        <div class='table-responsive'>
    <table class='table-sm table-striped corpsviewtable' border=1>
    <tr class='table-primary'>
    <th>S/N</th>
    <th>Corpse Name</th>
    <th>Days</th>
    <th>Bill Type</th>
    <th>Bill Amount</th>
    <th>ACTION</th>
    </tr>
    </table> 
</div>
    </div>
    </div>
</div><!-- End Sales Card -->
