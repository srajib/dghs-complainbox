<?php
$area_q=mysql_query("SELECT *, ara.area as areaname FROM
                                            area as ara
                                            LEFT JOIN complex as cmplx
                                                      ON ara.areacode=cmplx.area
                                                Group by cmplx.area");
?>
<!-- ====================================================== .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box" style="width:100%;">
						<div class="inside">
						<p style="padding: 10px 15px 5px 15px; font-size: 15px;">
                            You can design the form like your email editor box (where you write your email).
                            But when you define the dynamic value like email address of receiver, you must be enter the indicator name of that dynamic value. Dynamic Value Indicators are below.
                          </p>
                            <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
                                <thead>
                                <tr>
                                    <th>Value Name</th>
                                    <th>Value Example</th>
                                    <th>Indicator</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Message ID</td>
                                    <td>453</td>
                                    <td>+msgid+</td>
                                </tr>
                                <tr>
                                    <td>Organization Name</td><td>Savar Upazila Health Complex,Dhaka</td><td>+orgname+</td>
                                </tr>
                                <tr>
                                    <td>Mobile Num of Sender</td><td>01670536588</td><td>+sender+</td>
                                </tr>
                                <tr>
                                    <td>DateTime of Message</td><td>07-10-2012 @ 09:14:50am</td><td>+datetime+</td>
                                </tr>
                                <tr>
                                    <td>Message (Complain/Suggestion)</td><td>Toilet Not Clean</td><td>+comsugg+</td>
                                </tr>
                                <tr>
                                    <td>Type of Message</td><td>Water & sanitation</td><td>+comtype+</td>
                                </tr>
                                <tr>
                                    <td>Rank of Message</td><td>Moderate</td><td>+comrank+</td>
                                </tr>
                                <tr>
                                    <td>Action of Message</td><td>Discussed with sender.</td><td>+comaction+</td>
                                </tr>
                                <tr>
                                    <td>Solution of Message</td><td>Problem Resolved.</td><td>+comsolu+</td>
                                </tr>
                                <tr>
                                    <td>Last comments about Message</td><td>This is solved.</td><td>+comments+</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                <tr>
                                    <th>Value Name</th>
                                    <th>Value Example</th>
                                    <th>Indicator</th>
                                </tr>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="clear"></div>
                        </div>
					</div>
				</section>
				<div class="clear"></div>
<!-- ====================================================== .grid_12 - block end ======= -->