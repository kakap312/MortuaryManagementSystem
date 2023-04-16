<!-- Sales Card -->
<div class="col-xxl-12 col-md-12 viewreportsection " data-action= "{{route('allclearance')}}" >
    <div class="card info-card sales-card" style='padding-top:20px;'>
    <div class="card-body ">
    <div id=''>
        <form class='reportForm' action="">
        <div class='form-row'>
        <div class="form-floating mb-3 col">
        <label for="floatingInput">Report Type</label>
        <select class="reportType js-example-basic-single form-control" id='reporttype' name='reporttype'>
        <option value='Financial'>Financial</option>
        <option value='Corpse'>Corpse</option>
        </select>
        </div>
        <div class="form-floating mb-3 col">
        <label for="floatingInput">From</label>
        <input class="form-control fromdate" type="date" id='fromdate' name="from" required>
        </div>
        <div class="form-floating mb-3 col">
        <label for="floatingInput">To</label>
        <input class="form-control todate" type="date" id='fromdate' name="to" required>
        </div>
        <div class="form-floating mb-3 col">
        <label for="floatingInput" style='margin-bottom:25px;'></label>
        <button type='button' id=""  class="ibtn btn-primary form-control reportbtn" data-action="{{ route('report')}}">Generate</button>
        </div>
        </div>
        </form>
    </div>

    <div style='display:none;' class='financialreportview reportview'>
        <div class='row printarea'>
            <div class='col-md-12 '><hr/> 
                <div class="corpsedetailheader">
                    <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
                    <h2> O.V. OHIO MORTUARY</h2>
                    <h4> P.O.BOX ,24  BREKUM.OPPOSITE DEVINE CHURCH</h4>
                    <h4> 0540-425-85 / 0254-8697-789 / 0548-254-897</h4>
                    <h4> caring for your corpse</h4>
                </div><hr/>
                </div>
            <div class='reportdetails'>
            <h5>FINANCIAL REPORT</h5>
                <div class='ginfo'>
                    <h2>General Information</h2>
                    <table class='table-sm' style='margin-left:20px;'>
                        <tr>
                            <td>Date: </td>
                            <td>12/03/2023</td>
                        </tr>
                        <tr>
                            <td>Report type: </td>
                            <td>Financial</td>
                        </tr>
                        <tr>
                            <td>Captured: </td>
                            <td>12/04/2023 to 15/04/2023</td>
                        </tr>
                    </table>
                </div>
                <div class='details'>
                    <h2>Details of report</h2>
                    <table class='table-sm' style='margin-left:20px; width:95%;' border='1'>
                        <tr>
                            <td>Number of corpse discharge: </td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Number of corpse still remaining: </td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Number of corpse admitted: </td>
                            <td>150</td>
                        </tr>
                    </table>
                </div>

                <div class='details'>
                    <h2>Summary</h2>
                    <table class='table-sm table-striped' style='margin-left:20px;' >
                        <tr>
                            <td>Number of corpse discharge: </td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Number of corpse still remaining: </td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>Number of corpse admitted: </td>
                            <td>150</td>
                        </tr>
                    </table>
                </div><br><br>

                <div class='endorsement'>
                <h3>..................................................</h3>
                <p>Endorsed by:<br>Managing Director<br>(Kofi Frimpong Nimo)</p>
                </div>

            </div>
            <div class="form-floating mb-3 col reportprint">
            <label for="floatingInput" style='margin-bottom:25px;'></label>
            <button type='button' id="reportprintbtn"  class="ibtn btn-primary form-control reportprintbtn" data-action="{{ route('searchclearance')}}">Print</button>
            </div>
        </div>
       
    </div>


    <div style='display:none;' class='corpsereportview'>
        <div class='row corpsereportarea'>
            <div class='col-md-12 '><hr/> 
                <div class="corpsedetailheader">
                    <img style='width:150px; height:150px;' src='img/companylogo.jpg'alt="Company Logo"/>
                    <h2> O.V. OHIO MORTUARY</h2>
                    <h4> P.O.BOX ,24  BREKUM.OPPOSITE DEVINE CHURCH</h4>
                    <h4> 0540-425-85 / 0254-8697-789 / 0548-254-897</h4>
                    <h4> caring for your corpse</h4>
                </div><hr/>
                </div>
            <div class='reportdetails'>
            <h5>CORPSE REPORT</h5>
                <div class='ginfo'>
                    <h2>General Information</h2>
                    <table class='table-sm' style='margin-left:20px;'>
                        <tr>
                            <td>Date: </td>
                            <td class="reportDate"></td>
                        </tr>
                        <tr>
                            <td>Report type: </td>
                            <td class="type">Corpse</td>
                        </tr>
                        <tr>
                            <td>Captured: </td>
                            <td class='captured'>12/04/2023 to 15/04/2023</td>
                        </tr>
                    </table>
                </div>
                <div class='details'>
                    <h2>Details of report</h2>
                    <table class='table-sm corpsviewtable' style='margin-left:20px; width:95%;' border='1'>
                    <tr class='table-primary'>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>CORP NAME</th>
                        <th>SEX</th>
                        <th>DISCHARGED</th>
                        <th>In</th>
                        <th>REL NAME</th>
                        <th>REL #1</th>
                        <th>REL #2</th>
                    </tr>
                    </table>
                </div><br>

                <div class='details'>
                    <h2>Summary</h2>
                    <table class='table-sm table-striped' style='margin-left:20px;' >
                        <tr>
                            <td>Number of corpse in Morgue: </td>
                            <td class='totalcorpse'></td>
                        </tr>
                        <tr>
                            <td>Number of corpse Discharged: </td>
                            <td class='corpsedischarged'></td>
                        </tr>
                        <tr>
                            <td>Number of Male Corpse: </td>
                            <td class='malecorpse'></td>
                        </tr>
                        <tr>
                            <td>Number of Female Corpse: </td>
                            <td class='femalecorpse'></td>
                        </tr>
                    </table>
                </div><br><br>

                <div class='endorsement'>
                <h3>..................................................</h3>
                <p>Endorsed by:<br>Managing Director<br>(Kofi Frimpong Nimo)</p>
                </div>

            </div>
            <div class="form-floating mb-3 col reportprint">
            <label for="floatingInput" style='margin-bottom:25px;'></label>
            <button type='button' id="reportprintbtn"  class="ibtn btn-primary form-control reportprintbtn" data-action="{{ route('searchclearance')}}">Print</button>
            </div>
        </div>
       
    </div>
</div><!-- End Sales Card -->
