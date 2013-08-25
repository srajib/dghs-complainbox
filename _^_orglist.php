<?php
    $orglist_q=mysql_query("SELECT *, cmplx.name as orgname FROM
                                            complex as cmplx
                                            LEFT JOIN email as email
                                                      ON cmplx.code=email.complex
                                            ORDER BY cmplx.code DESC");
?>
<!-- ====================================================== .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box" style="width:100%;">
						<div class="inside">
								<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
									<thead>
										<tr>
											<th>Org Code</th>
											<th>Org Name</th>
											<th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Area Code</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
                                        while($orglist_r=mysql_fetch_object($orglist_q))
                                        {
                                    ?>
										<tr>
											<td><?php echo $orglist_r->code; ?></td>
											<td><?php echo $orglist_r->orgname; ?></td>
											<td class="center"><?php echo $orglist_r->mob_no; ?></td>
											<td class="center"><?php echo $orglist_r->email; ?></td>
                                            <td class="center"><?php echo $orglist_r->area; ?></td>
											<td><a href="#" class="button yellow small">Edit</a> <a href="#" class="button red small">Delete</a></td>
										</tr>
                                    <?php   }    ?>
                                    </tbody>
									<tfoot>
										<tr>
											<th>Org Code</th>
											<th>Org Name</th>
											<th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Area Code</th>
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