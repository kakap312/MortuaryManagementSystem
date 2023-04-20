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
        <div class='row financialreportprintarea'>
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
                            <td class='captured'>12/04/2023 to 15/04/2023</td>
                        </tr>
                    </table>
                </div>
                <div class='details'>
                <div class='details table-responsive'>
                    <h2>Details of report</h2>
                    <table class='table-sm corpsviewtable' style='margin-left:20px;margin-bottom:20px; width:95%;' border='1'>
                    <tr class='table-primary'>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>CORPSE_NAME</th>
                        <th>ADMIN_DATE</th>
                        <th>DISC_DATE</th>
                        <th>SERVICE_TYPE</th>
                        <th>DAYS</th>
                        <th>AMT_PAID</th>
                        <th>AMT_DUE</th>
                        <th>OUT_AMT</th>
                    </tr>
                    </table>
                </div>

                </div>

                <div class='details'>
                    <h2>Summary</h2>
                    <table class='table-sm table-striped' style='margin-left:20px;' >
                    
                        <tr>
                        
                        <td>
                        <ol>
                            <li>
                            Amount Paid: 
                            </li>
                        </ol>
                        </td>
                        <td class='totalcorpse'></td>
                            
                        </tr>
                        <tr>
                            <td>
                            <ol start='2'>
                                <li>
                                    Amount Due: 
                                </li>
                            </ol>
                            </td>
                            <td class='corpsedischarged'></td>
                        </tr>
                        <tr>
                            <td>
                            <ol start='3'>
                                <li>Total Amount:</li>
                            </ol>        
                            </td>
                            <td class='malecorpse'></td>
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
            <button type='button' id="reportprintbtn"  class="ibtn btn-primary form-control financialreportbtn" data-action="{{ route('searchclearance')}}">Print</button>
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
                    <div class='table-responsive'>
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
                <div class='details table-responsive'>
                    <h2>Details of report</h2>
                    <table class='table-sm corpsviewtable' style='margin-left:20px; width:95%;' border='1'>
                    <tr class='table-primary'>
                        <th>S/N</th>
                        <th>ID</th>
                        <th>CORP NAME</th>
                        <th>SEX</th>
                        <th>Service Type</th>
                        <th>Status</th>
                        <th>REL NAME</th>
                        <th>REL #1</th>
                        <th>REL #2</th>
                    </tr>
                    </table>
                    </div>          
                </div><br>

                <div class='details'>
                    <h2>Summary</h2>
                    <table class='table-sm table-striped' style='margin-left:20px;' >
                    
                        <tr>
                        
                        <td>
                        <ol>
                            <li>
                            Number of corpse in Morgue: 
                            </li>
                        </ol>
                        </td>
                        <td class='totalcorpse'></td>
                            
                        </tr>
                        <tr>
                            <td>
                            <ol start='2'>
                                <li>
                                    Number of corpse Discharged: 
                                </li>
                            </ol>
                            </td>
                            <td class='corpsedischarged'></td>
                        </tr>
                        <tr>
                            <td>
                            <ol start='3'>
                                <li>Number of Male Corpse:</li>
                            </ol>        
                            </td>
                            <td class='malecorpse'></td>
                        </tr>
                        <tr>
                            <td>
                            <ol start='4'>
                                <li>Number of Female Corpse:</li>
                            </ol> 
                            </td>
                            <td class='femalecorpse'></td>
                        </tr>
                        <tr>
                            <td>
                            <ol start='5'>
                                <li>To number corpse received </li>
                            </ol> 
                            </td>
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
