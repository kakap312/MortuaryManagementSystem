
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewcorpsection " data-action= "{{route('fetchcorps')}}">
    <div class="card info-card sales-card deletecorp" data-action="{{ route('deletecorp')}}">
    <div class="card-body ">
    <div id='corpsearchbar'>
        <button type='button' id="searchbtn"  class="ibtn btn-primary">Search</button>
        <input  class='form-control searchcorp' data-action="{{ route('searchcorp')}}" type='text' placeholder='Search corps' />
    </div>
        <div class='table-responsive'>
    <table class='table-sm table-striped corpsviewtable' border=1>
    <tr class='table-primary'>
    <th>S/N</th>
    <th>ID</th>
    <th>CORP NAME</th>
    <th>SEX</th>
    <th>DAY(S)</th>
    <th>ADMI DATE</th>
    <th>COLL DATE</th>
    <th>CATEGORY</th>
    <th>REL NAME</th>
    <th>REL #1</th>
    <th>REL #2</th>
    <th>ACTION</th>
    </tr>
    </table> 
</div>
    </div>
    </div>
</div><!-- End Sales Card -->
