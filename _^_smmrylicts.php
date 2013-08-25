<?php
$num_org_q=mysql_query(mysql_real_escape_string("Select * from complex"));
$num_org_r=mysql_num_rows($num_org_q);

$num_msg_q=mysql_query(mysql_real_escape_string("Select * from messages"));
$num_msg_r=mysql_num_rows($num_msg_q);

//$num_msg_q=mysql_query(mysql_real_escape_string("Select * from messages where "));
//$num_msg_r=mysql_num_rows($num_msg_q);

?>
<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><span class="icon16_sprite i_network_monitor"></span>Total Summary</div>
<div class="inside">
							<div class="in">
								<h4 class="docs_title_first" style="text-align:left; padding-left:8px;"><img src="images/loader/21.gif" alt=""/> Total Organization : <span style="font-size:14px; color:#060;"><?php  echo $num_org_r; ?></span></h4>
                                <h4 class="docs_title_first" style="text-align:left; padding-left:8px;"><img src="images/loader/21.gif" alt=""/> Total Message : <span style="font-size:14px; color:#060;"><?php  echo $num_msg_r; ?></span></h4>
                                <h4 class="docs_title_first" style="text-align:left; padding-left:8px;"><img src="images/loader/21.gif" alt=""/> Other summery depends on your instruction <span style="font-size:14px; color:#060;"><?php  echo " "; ?></span></h4>
</div>
						</div>
						
					</div>
				</section>
		<!-- ======= .grid_12 - block end ======= -->