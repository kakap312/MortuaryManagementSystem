
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 accountdetailssection " data-action= "{{route('fetchcorps')}}">
    <div class="card info-card sales-card deletecorp" data-action="{{ route('deletecorp')}}">
    <div class="card-body ">
    <div class='billcontent'>
        <div class="corpsedetailheader">
        <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
        <h2>O.V. OHIO MORTUARY</h2>
        <h4>P.O.BOX ,24  BREKUM.OPPOSITE DEVINE CHURCH</h4>
        <h4>0540-425-85 / 0254-8697-789 / 0548-254-897</h4>
        <h4> caring for the dead </h4>
        </div><hr/>
        <div class='coprsedetails'>
            <h5>ACCOUNT DETAILS</h5>
            <p>Date: <span class='date'></span></p>
            <center>
            <table  class='corpsedetailtable table'>
                <tr>
                    <td>Account Id:  </td>
                    <td class='accountid'></td>
                </tr>
                <tr>
                    <td>username:  </td>
                    <td class="username"></td>
                </tr>
                <tr>
                    <td>Password  </td>
                    <td class='password'></td>
                </tr>
                <tr>
                    <td>Account Type</td>
                    <td class='accounttype'></td>
                </tr>
                <tr>

                </tr>
            </table><br>
            </center>
        </div>
    </div>
    <center>
    <button type='button' class='printbtn' class='btn-secondary'>Print</button>
    </center>
    </div>
    </div>
</div><!-- End Sales Card -->
