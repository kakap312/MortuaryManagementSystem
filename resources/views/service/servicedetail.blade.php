
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 servicedetailsection " data-action= "{{route('fetchcorps')}}">
    <div class="card info-card sales-card deletecorp" data-action="{{ route('deletecorp')}}">
    <div class="card-body ">
    <div class='servicecontent'>
        <div class="corpsedetailheader">
        <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
        <h2> O.V. OHIO'S MORTUARY</h2>
        <h4>P.O.BOX 578,  BREKUM</h4>
        <h4>0551-065-011 / 0543-414-393</h4>
        <h4> caring for the dead </h4>
        </div><hr/>
        <div class='coprsedetails'>
            <h5>SERVICE DETAILS</h5>
            <p>Date: <span class='date'></span></p>
            <center>
            <table  class='corpsedetailtable table'>
                <tr>
                    <td>Service ID:  </td>
                    <td class='servideid'></td>
                </tr>
                <tr>
                    <td>Name:  </td>
                    <td class="name"></td>
                </tr>
                <tr>
                    <td>Fee:  </td>
                    <td class='servicefee'></td>
                </tr>
                <tr>
                    <td>Charged Per:</td>
                    <td id='per'></td>
                </tr>
            </table><br>
            </center>
        </div>
    </div>
    <center>
    <button type='button' class='serviceprintbtn' class='ibtn btn-primary form-control reportprintbtn'>Print</button>
    </center>
    </div>
    </div>
</div><!-- End Sales Card -->
