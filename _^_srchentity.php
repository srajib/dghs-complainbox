<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="inside">
							<!-- formee-->
							<form class="formee" action="" method="post">
								<div class="in">
                                    <div class="grid-4-12">
										<label>Select Type(s)</label>
										<select data-placeholder="Select Type(s)" class="chzn-select" multiple="multiple" >
										  <option value=""></option>
                                            <?php
                                            $typ_q=mysql_query("select * from com_type order by type_details asc");
                                            while($typ_r=mysql_fetch_array($typ_q)){
                                                ?>
                                            <option value="<?php echo $typ_r['type_details']; ?>" <?php // if($typ_r['type_details']==$select){ echo "selected"; } ?>><? echo $typ_r['type_details']; ?></option>
                                                <?php
                                            }
                                            ?>
										</select>
									</div>
                                    <div class="grid-4-12">
                                        <label>Select Sender Phone Number(s)</label>
                                        <select data-placeholder="Select Tag(s)" class="chzn-select" multiple >
                                            <option value=""></option>
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option>Philadelphia Eagles</option>
                                            <option>Washington Redskins</option>
                                            <option>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                            <option>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                            <option>Buffalo Bills</option>
                                            <option>Miami Dolphins</option>
                                            <option>New England Patriots</option>
                                            <option>New York Jets</option>
                                            <option>Baltimore Ravens</option>
                                            <option>Cincinnati Bengals</option>
                                            <option>Cleveland Browns</option>
                                            <option>Pittsburgh Steelers</option>
                                            <option>Houston Texans</option>
                                            <option>Indianapolis Colts</option>
                                            <option>Jacksonville Jaguars</option>
                                            <option>Tennessee Titans</option>
                                            <option>Denver Broncos</option>
                                            <option>Kansas City Chiefs</option>
                                            <option>Oakland Raiders</option>
                                            <option>San Diego Chargers</option>
                                        </select>
                                    </div>
                                    <div id="clear"></div>

                                    <!-- ====================== -->

                                    <div class="grid-3-12">
                                        <label>Date From </label>
                                        <input type="text" id="datepicker_from">
                                    </div>
                                    <div class="grid-3-12">
                                        <label>Date To </label>
                                        <input type="text" id="datepicker_to">
                                    </div>
                                    <div class="clear"></div>
                                    <!-- ====================== -->

                                    <div class="grid-4-12">
                                        <label>Organization Name</label>
                                        <select data-placeholder="Please " class="chzn-select" tabindex="1">
                                            <option value=""></option>
                                            <option value="Option select 1">Option select 1</option>
                                            <option value="Option select 2">Option select 2</option>
                                            <option value="Option select 3">Option select 3</option>
                                            <option value="Option select 4">Option select 4</option>
                                            <option value="Option select 1">Option select 5</option>
                                            <option value="Option select 2">Option select 6</option>
                                            <option value="Option select 3">Option select 7</option>
                                            <option value="Option select 4">Option select 8</option>
                                            <option value="Option select 1">Option select 9</option>
                                            <option value="Option select 2">Option select 10</option>
                                            <option value="Option select 3">Option select 11</option>
                                            <option value="Option select 4">Option select 12</option>
                                        </select>
                                    </div>
									<div class="grid-4-12">
											<label>Organization Code</label>
											<select data-placeholder="Please " class="chzn-select" tabindex="1">
												<option value=""></option> 
												<option value="Option select 1">Option select 1</option>
												<option value="Option select 2">Option select 2</option>
												<option value="Option select 3">Option select 3</option>
												<option value="Option select 4">Option select 4</option>
												<option value="Option select 1">Option select 5</option>
												<option value="Option select 2">Option select 6</option>
												<option value="Option select 3">Option select 7</option>
												<option value="Option select 4">Option select 8</option>
												<option value="Option select 1">Option select 9</option>
												<option value="Option select 2">Option select 10</option>
												<option value="Option select 3">Option select 11</option>
												<option value="Option select 4">Option select 12</option>
											</select>
									</div>
                                    <div class="grid-4-12">
											<label>Area Code</label>
											<select data-placeholder="Please select one..." class="chzn-select" tabindex="1">
												<option value=""></option> 
												<option value="Option select 1">Option select 1</option>
												<option value="Option select 2">Option select 2</option>
												<option value="Option select 3">Option select 3</option>
												<option value="Option select 4">Option select 4</option>
												<option value="Option select 1">Option select 5</option>
												<option value="Option select 2">Option select 6</option>
												<option value="Option select 3">Option select 7</option>
												<option value="Option select 4">Option select 8</option>
												<option value="Option select 1">Option select 9</option>
												<option value="Option select 2">Option select 10</option>
												<option value="Option select 3">Option select 11</option>
												<option value="Option select 4">Option select 12</option>
											</select>
									</div>
                                    <div id="clear"></div>

                                    <div class="grid-4-12">
                                        <label>Message Rank</label>
                                        <select data-placeholder="Please " class="chzn-select" tabindex="1">
                                            <option value=""></option>
                                            <option value="Option select 1">Option select 1</option>
                                            <option value="Option select 2">Option select 2</option>
                                            <option value="Option select 3">Option select 3</option>
                                            <option value="Option select 4">Option select 4</option>
                                            <option value="Option select 1">Option select 5</option>
                                        </select>
                                    </div>
                                    <div class="grid-4-12">
                                        <label>Complaint Type</label>
                                        <select data-placeholder="Please " class="chzn-select" tabindex="1">
                                            <option value=""></option>
                                            <option value="Option select 1">Option select 1</option>
                                            <option value="Option select 2">Option select 2</option>
                                            <option value="Option select 3">Option select 3</option>
                                            <option value="Option select 4">Option select 4</option>
                                            <option value="Option select 1">Option select 5</option>
                                        </select>
                                    </div>
                                    <div class="grid-4-12">
                                        <label>Action</label>
                                        <select data-placeholder="Please " class="chzn-select" tabindex="1">
                                            <option value=""></option>
                                            <option value="Option select 1">Option select 1</option>
                                            <option value="Option select 2">Option select 2</option>
                                            <option value="Option select 3">Option select 3</option>
                                            <option value="Option select 4">Option select 4</option>
                                            <option value="Option select 1">Option select 5</option>
                                        </select>
                                    </div>
                                    <div id="clear"></div>
                                    <div class="grid-4-12">
                                        <label>Solution</label>
                                        <select data-placeholder="Please " class="chzn-select" tabindex="1">
                                            <option value=""></option>
                                            <option value="Option select 1">Option select 1</option>
                                            <option value="Option select 2">Option select 2</option>
                                            <option value="Option select 3">Option select 3</option>
                                            <option value="Option select 4">Option select 4</option>
                                            <option value="Option select 1">Option select 5</option>
                                        </select>
                                    </div>
								</div><!-- End .in class -->
										
										
								<!--Form footer begin-->
								<section class="box_footer">
									<div class="grid-12">
									<input type="reset" class="right button red" value="Reset" /> &nbsp; <input type="submit" name="adsrch" class="right button green" value="Search" />
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