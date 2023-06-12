
<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 paymentdetailsection " data-action= "<?php echo e(route('fetchcorps')); ?>">
    <div class="card info-card sales-card deletecorp" data-action="<?php echo e(route('deletecorp')); ?>">
    <div class="card-body searchbilling" data-action="<?php echo e(route('searchbill')); ?>" >
    <div class='paymentcontent' >
        <div class="corpsedetailheader searchcorp" data-action="<?php echo e(route('searchcorp')); ?>">
        <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
        <h2> O.V. OHIO'S MORTUARY</h2>
        <h4>P.O.BOX 578,  BREKUM</h4>
        <h4>0551-065-011 / 0543-414-393</h4>
        <h4> caring for the dead </h4>
        </div><hr/>
        <div class='coprsedetails'>
            <h5>PAYMENT DETAILS</h5>
            <p>Date: <span class='date'></span></p>
            <center>
            <table  class='corpsedetailtable table'>
                <tr>
                    <td>Corpse Name :  </td>
                    <td class='corpsename'></td>
                </tr>
                <tr>
                    <td>Payment ID:  </td>
                    <td class='paymentId'></td>
                </tr>
                <tr>
                    <td>Bill Id:  </td>
                    <td class="billid"></td>
                </tr>
                <tr>
                    <td>Amount Paid:  </td>
                    <td class='amount'>M</td>
                </tr>
                <tr>

                </tr>
            </table>
            
            </center>
        </div>
        <br><br>
        <div class='endorsement'>
        <h3>.....................................</h3>
        <p>Endorsed by:<br>Managing Director<br>(Clement A. Boakye)</p>
        </div>
    </div>
    <center>
    <button type='button'  class=' paymentprintbtn ibtn btn-primary form-control reportprintbtn'>Print</button>
    </center>
    </div>
    </div>
</div><!-- End Sales Card -->
