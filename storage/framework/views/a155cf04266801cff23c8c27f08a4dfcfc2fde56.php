
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 billdetailsection " data-action= "<?php echo e(route('fetchcorps')); ?>">
    <div class="card info-card sales-card deletecorp" data-action="<?php echo e(route('deletecorp')); ?>">
    <div class="card-body ">
    <div class='billcontent'>
        <div class="corpsedetailheader">
        <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
        <h2> O.V. OHIO'S MORTUARY</h2>
        <h4>P.O.BOX 578,  BREKUM</h4>
        <h4>0551-065-011 / 0543-414-393</h4>
        <h4> caring for the dead </h4>
        </div><hr/>
        <div class='coprsedetails'>
            <h5>BILL DETAILS</h5>
            <p>Date: <span class='date'></span></p>
            <center>
            <table  class='corpsedetailtable table'>
            <tr>
                    <td>Corpse Name:  </td>
                    <td class='corpsename'></td>
                </tr>
                <tr>
                    <td>Bill ID:  </td>
                    <td class='billId'></td>
                </tr>
                <tr>
                    <td>Corpse Id:  </td>
                    <td class="corpseId"></td>
                </tr>
                <tr>
                    <td>Service/Fee:  </td>
                    <td id='serviceFee'></td>
                </tr>
                <tr>
                    <td>Days:</td>
                    <td id='day'></td>
                </tr>
                <tr>
                    <td>Total Amount:  </td>
                    <td id='total'></td>
                </tr>
                <tr>

                </tr>
            </table><br>
            </center>
        </div> <br><br>
        <div class='endorsement'>
        <h3>.....................................</h3>
        <p>Endorsed by:<br> Facility Manager <br>(Mr. Yaw Owusu Adjei Yeboah)</p>
        </div>
    </div>
    
    <center>
    <button type='button'  class='ibtn btn-primary form-control printbillbtn'>Print</button>
    </center>
    </div>
    </div>
</div><!-- End Sales Card -->
