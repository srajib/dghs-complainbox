<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="inside">
							<!-- formee-->
							<form class="formee" action="" method="POST">
								<div class="in">
									<div class="grid_12">
											<label style="font-size: 15px; line-height: 1.5;">Message: <?php echo $msg_r->message; ?></label>
									</div>
                                    <div class="grid_12">
											<label style="font-size: 15px; line-height: 1;">Sender: <?php echo $msg_r->sender; ?></label>
									</div>
                                    
                                    <div class="grid_12">
                                        <label style="font-size: 15px; line-height: 1;">Date &amp; Time: <?php echo $msg_r->datetime; ?></label>
									</div>
                                    <div class="grid_12">
											<label style="font-size: 15px; line-height: 1;">Organization Name</label>
											<select data-placeholder="Please select one..." class="chzn-select" style="width:60%;" tabindex="1" name="org_i">
												<option value=""></option>
                                    <?php
                                    while($orgn_r=mysql_fetch_object($orgn_q)){
                                    ?>
    <option value="<?php echo $orgn_r->code; ?>" <?php if($orgn_r->code==$msg_r->complex){ echo "selected"; } ?>><? echo $orgn_r->name; ?></option>
<?php
}
?>
											</select>
									</div>
                                <div class="clear"></div>
                                <div class="grid-3-12">
											<label>Rank </label>
											<select data-placeholder="Please select one" class="chzn-select" style="width:100%;" tabindex="1" name="rnk_i">
												<option value=""></option>
                                                <?php
                                                while($rnk_r=mysql_fetch_object($rnk_q)){
                                                    ?>
                                                    <option value="<?php echo $rnk_r->id; ?>" <?php if($rnk_r->id==$msg_r->rank){ echo "selected"; } ?>><? echo $rnk_r->rank_type; ?></option>
                                                    <?php
                                                }
                                                ?>
											</select>
									</div>
                                    <div class="grid-3-12">
											<label>Type(s)</label>
											<select data-placeholder="Please select one/more..." class="chzn-select" style="width:100%;" multiple="multiple" name="typ_i[]">
                                                <option value=""></option>
                                                <?php
                                                $typ_array=$msg_r->complain_type;
                                                $typ_result = explode(",", $typ_array);
                                                while($typ_r=mysql_fetch_object($typ_q)){
                                                    ?>
                                                    <option value="<?php echo $typ_r->id; ?>"
                                                        <?php
                                                        foreach($typ_result as $typr){
                                                        if($typ_r->id==$typr){ echo "selected"; }
                                                        }
                                                        ?>><? echo $typ_r->type_details; ?></option>
                                                    <?php
                                                }
                                                ?>
											</select>
									</div>
                                    <div class="grid-3-12">
											<label>Action </label>
											<select data-placeholder="Please select one..." class="chzn-select" style="width:100%;" tabindex="1" name="actn_i">
                                                <option value=""></option>
                                                <?php
                                                while($actn_r=mysql_fetch_object($actn_q)){
                                                    ?>
                                                    <option value="<?php echo $actn_r->id; ?>" <?php if($actn_r->id==$msg_r->action){ echo "selected"; } ?>><? echo $actn_r->action_details; ?></option>
                                                    <?php
                                                }
                                                ?>
											</select>
									</div>
                                    <div class="grid-3-12">
											<label>Solution</label>
											<select data-placeholder="Please select one..." class="chzn-select" style="width:100%;" tabindex="1" name="slu_i">
                                                <option value=""></option>
                                                <?php
                                                while($slu_r=mysql_fetch_object($slu_q)){
                                                    ?>
                                                    <option value="<?php echo $slu_r->id; ?>" <?php if($slu_r->id==$msg_r->msgslu){ echo "selected"; } ?>><? echo $slu_r->solution_details; ?></option>
                                                    <?php
                                                }
                                                ?>
											</select>
									</div>
<div class="clear"></div>
                                
								<fieldset>
                                <legend>Write your comments</legend>
                                <textarea placeholder="Write here......." name="cmmnts_i"></textarea>
                                </fieldset>
								</div><!-- End .in class -->
								<!--Form footer begin-->
								<section class="box_footer">
									<div class="grid-12">
									<input type="reset" class="right button red" value="Reset" /> &nbsp; <input type="submit" class="right button green" value="Submit" name="cmmntsi" />
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
