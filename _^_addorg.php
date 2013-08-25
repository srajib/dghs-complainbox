<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="inside">
							<!-- formee-->
							<form class="formee" action="#" method="post">
								<div class="in">
							
									<div class="grid-4-12">
											<label>Organization Name <em class="formee-req">*</em></label>
										   <input type="text" name="orgname_i" />
									</div>
									
                                    <div class="grid-4-12">
											<label>Organization Code <em class="formee-req">*</em></label>
										   <input type="text" name="orgcode_i" />
									</div>
                                    
                                    <div class="grid-4-12">
											<label>Organization Mobile <em class="formee-req">*</em></label>
										   <input type="text" name="orgmobi_i" />
									</div>
									
                                    <div class="grid-4-12">
											<label>Organization Email <em class="formee-req">*</em></label>
										   <input type="text" name="orgemail_i" />
									</div>
									<div class="grid-6-12">
											<label>Area Code <em class="formee-req">*</em></label>
											<select data-placeholder="Please select one..." class="chzn-select" style="width:60%;" tabindex="1" name="areacode_i">
                                                <option value=""></option>
                                                <?php
                                                while($area_r=mysql_fetch_object($area_q)){
                                                    ?>
                                                    <option value="<?php echo $area_r->areacode; ?>">
                                                        <?php echo $area_r->area; ?></option>
                                                    <?php
                                                }
                                                ?>
											</select>
									</div>
                                    <div class="grid_12">
											<label>Details of organization</label>
                                        <?php $txtareaname="orgdetails_i"; include("email_templicts.php"); ?>
                                    </div>
									
								</div><!-- End .in class -->
										
										
								<!--Form footer begin-->
								<section class="box_footer">
									<div class="grid-12">
									<input type="reset" class="right button red" value="Rest Form" /> &nbsp; <input type="submit" class="right button green" value="Add Area" name="addorg_i"/>
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