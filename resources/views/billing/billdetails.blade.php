
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 billdetailsection " data-action= "{{route('fetchcorps')}}">
    <div class="card info-card sales-card deletecorp" data-action="{{ route('deletecorp')}}">
    <div class="card-body ">
    <div class='billcontent'>
        <div class="corpsedetailheader">
        <img style='width:150px; height:100px;' src='img/companylogo.png'alt="Company Logo"/>
        <h2>O.V. OHIO MORTUARY</h2>
        <h4>P.O.BOX ,24  BREKUM.OPPOSITE DEVINE CHURCH</h4>
        <h4>0540-425-85 / 0254-8697-789 / 0548-254-897</h4>
        <h4>caring for your corpse</h4>
        </div><hr/>
        <div class='coprsedetails'>
            <h5>BILL DETAILS</h5>
            <p>Date: <span class='date'></span></p>
            <center>
            <table  class='corpsedetailtable table'>
                <tr>
                    <td>Bill ID:  </td>
                    <td class='billId'></td>
                </tr>
                <tr>
                    <td>Corpse Id:  </td>
                    <td class="corpseId"></td>
                </tr>
                <tr>
                    <td>Fee:  </td>
                    <td id='fee'>M</td>
                </tr>
                <tr>
                    <td>Days:</td>
                    <td id='day'></td>
                </tr>
                <tr>
                    <td>total Amount:  </td>
                    <td id='total'></td>
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