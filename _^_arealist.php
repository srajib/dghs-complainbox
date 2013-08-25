<?php
$arealist_q=mysql_query("SELECT * FROM area");
?>
<!-- ====================================================== .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box" style="width:100%;">						
						<div class="inside">
								<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
									<thead>
										<tr>
											<th width="72">Area Code</th>
											<th width="77">Area Name</th>
											<th width="75">Action</th>
										</tr>
									</thead>
									<tbody>
                                <?php

                                while($area_r=mysql_fetch_object($arealist_q))
                                {
                                    ?>
										<tr>
											<td><?php echo $area_r->areacode;?></td>
											<td><?php echo $area_r->area;?></td>
											<td><a href="#" class="button yellow small">Edit</a> <a href="#" class="button red small">Delete</a></td>
										</tr>
                                    <?php
                                }   ?>

									</tbody>
									<tfoot>
										<tr>
											<th>Area Code</th>
											<th>Area Name</th>
                                            <th>Action</th>
										</tr>
									</tfoot>
								</table>								
								<div class="clear"></div>
								
						</div>
					</div>
				</section>
				<div class="clear"></div>
<!-- ====================================================== .grid_12 - block end ======= -->