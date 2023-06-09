
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 corpdetailsection " data-action= "{{route('fetchcorps')}}">
    <div class="card info-card sales-card deletecorp" data-action="{{ route('deletecorp')}}">
    <div class="card-body ">
    <div class='corpsecontent' id='corpsecontent'>
        <div class="corpsedetailheader">
        <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
        <h2> O.V. OHIO'S MORTUARY</h2>
        <h4>P.O.BOX 578,  BREKUM</h4>
        <h4>0551-065-011 / 0543-414-393</h4>
        <h4> caring for the dead </h4>
        </div><hr/>
        <div class='coprsedetails'>
            <h5>CORPS DETAILS</h5>
            <p>Date: <span id='date'></span></p>
            <center>
            <table  class='corpsedetailtable table'>
                <tr>
                    <td>Corpse ID:  </td>
                    <td id='coprseId'></td>
                </tr>
                <tr>
                    <td>Corpse Name:  </td>
                    <td id="corpName"></td>
                </tr>
                <tr>
                    <td>Sex:  </td>
                    <td id='corpSex'>M</td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td id='corpCategory'></td>
                </tr>
                <tr>
                    <td>Admission Date:  </td>
                    <td id='corpAdmissionDate'>2</td>
                </tr>
                <tr>
                    <td>Collection Date:  </td>
                    <td id='corpCollectionDate'></td>
                </tr>
                <tr>
                    <td>Day(s):  </td>
                    <td id='dayInFridge'></td>
                </tr>
            </table><br>
            </center>
        </div>
    </div>
    <center>
    <button type='button'  class=' ibtn btn-primary form-control reportprintbtn printbtn'>Print</button>
    </center>
    </div>
    </div>
</div><!-- End Sales Card -->
