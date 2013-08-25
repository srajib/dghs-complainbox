<!-- ======= .grid_12 ======= -->
				<section class="grid_12">
				
					<h2>Advanced Search</h2>
					<hr />
					<!-- ======= UI TABS ======= -->
					<div class="ui_tabs">
						<ul>
                            <?php
                            if(isset($_POST['adsrch']))
                            {
                                ?>
                                <li class=><a href="#tabs-2">Search Result</a></li>
                                <?php
                            }
                            ?>
							<li><a href="#tabs-1">Search Entity</a></li>

						</ul>
						<div id="tabs-1">
							<?php include ("_^_srchentity.php"); ?>
						</div>
                        <?php
                        if(isset($_POST['adsrch']))
                        {
                        ?>
                        <div id="tabs-2">
                            <?php include ("_^_srchrslt.php"); ?>
                        </div>
                        <?php } ?>
					</div>
					
				</section>
<!-- ======= /.grid_12 ======= -->