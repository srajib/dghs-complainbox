<?php
$offset=6*60*60;
$todayFormat="Y-m-d";
$datetimeFormat="Y-m-d H-i-s";

$today=gmdate($todayFormat, time()+$offset);
$datetime=gmdate($datetimeFormat, time()+$offset);

$tdaymsg=mysql_query("SELECT *, msg.id as msgiid FROM
                                            messages as msg
                                            LEFT JOIN rank as rnk
                                                      ON msg.rank=rnk.id
                                            LEFT JOIN com_type as comt
                                                      ON msg.complain_type=comt.id
                                            LEFT JOIN complex as cmplx
                                                      ON msg.complex=cmplx.code
                                            LEFT JOIN action as act
                                                      ON msg.action=act.id
                                            LEFT JOIN solution as slu
                                                      ON msg.solution=slu.id
                                            where msg.DT like '$today%' ORDER BY msg.DT DESC");
$tdaymsg_row=mysql_num_rows($tdaymsg);
if($tdaymsg>20)
{   $lstmsg_q=$tdaymsg;   }
else
{   $lstmsg_q=mysql_query("SELECT *, msg.id as msgiid, rnk.id as rnkiid, slu.id as sluiid FROM
                                            messages as msg
                                            LEFT JOIN rank as rnk
                                                      ON msg.rank=rnk.id
                                            LEFT JOIN com_type as comt
                                                      ON msg.complain_type=comt.id
                                            LEFT JOIN complex as cmplx
                                                      ON msg.complex=cmplx.code
                                            LEFT JOIN action as act
                                                      ON msg.action=act.id
                                            LEFT JOIN solution as slu
                                                      ON msg.solution=slu.id
                                            ORDER BY DT DESC LIMIT 0,25"); }
?>
<!-- ====================================================== .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><div class="layout"><img src="images/woo/email_add_32.png" height="25px"/>Last 20 Message are below</div></div>						
						<div class="inside">
								
								<table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
									<thead>
										<tr>
											<th>No.</th>
											<th>Organization</th>
											<th>Date &amp; Time</th>
											<th>Message</th>
											<th>Sender</th>
                                            <th>Priority/Rank</th>
                                            <th>Solution</th>
                                            <th>Details</th>
										</tr>
									</thead>
									<tbody>
                                <?php
                                $i=1;
                                while($lstmsg_r=mysql_fetch_object($lstmsg_q))
                                {
                                ?>
                                    <tr class="gradeA odd">
											<td><?php echo $i; ?></td>
											<td><?php echo $lstmsg_r->name; ?></td>
											<td><?php echo $lstmsg_r->datetime; ?></td>
											<td><?php echo $lstmsg_r->message; ?></td>
											<td class="center"><?php echo $lstmsg_r->sender; ?></td>
                                        <td class="center">
                                            <span class="dropt">
                                                <img src="images/action/<?php echo $lstmsg_r->rank.".png"; ?>"/>
                                                <?php if($lstmsg_r->rank_type!=""){ ?>
                                                <span style="width:300px;">
                                                <?php echo $lstmsg_r->rank_type; ?>
                                                 </span>
                                                <?php } ?>
                                            </span>
                                        </td>
                                        <td class="center">
                                            <span class="dropt">
                                                <img src="images/action/<?php echo "s".$lstmsg_r->solution.".png"; ?>"/>
                                                <?php if($lstmsg_r->solution_details!=""){ ?>
                                                <span style="width:300px;">
                                                <?php echo $lstmsg_r->solution_details; ?>
                                                 </span>
                                                <?php } ?>
                                            </span>
                                        </td>
                                            <td class="center"><a href="welcome.php?actn=msg&id=<?php echo $lstmsg_r->msgiid*33522; ?>"><img src="images/action/d.png"/></a></td>
										</tr>
								<?php
                                    $i++;
                                }
                                ?>
                                       </tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Organization</th>
											<th>Date &amp; Time</th>
											<th>Message</th>
											<th>Sender</th>
                                            <th>Priority/Rank</th>
                                            <th>Solution</th>
                                            <th>Details</th>
										</tr>
									</tfoot>
								</table>								
								<div class="clear"></div>
								
						</div>
					</div>
				</section>
				<div class="clear"></div>
<!-- ====================================================== .grid_12 - block end ======= -->