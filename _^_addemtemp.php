<?php
$et_q=mysql_query("Select * from email_temp");
$et_r=mysql_fetch_object($et_q);
?>
<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="inside">
							<!-- formee-->
							<form class="formee" action="" method="POST">
								<div class="in">

									<div class="grid-12-12">
											<label>Please Read <a href="#">The Instruction</a> before designing the form</label>
										   <?php $txtareaname="emtemp_i"; $txtv=$et_r->email_temp_html; include("email_templicts.php"); ?>
									</div>
									
								</div><!-- End .in class -->
										
										
								<!--Form footer begin-->
								<section class="box_footer">
									<div class="grid-12">
									<input type="reset" class="right button red" value="Rest Form" /> &nbsp; <input type="submit" class="right button green" value="Save" name="addemtemp_i" />
									</div>
									<div class="clear"></div>
								</section>
								<!--Form footer end-->
								
								
							</form>
							<!-- formee-->
							
						</div>
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->