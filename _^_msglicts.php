<?php
if($_GET['id']<33522){
    include ("404.php");
}
else
{
$msgid=mysql_real_escape_string($_GET['id']/33522);
$msg_q=mysql_query("SELECT *, msg.id as msgiid, msg.solution as msgslu FROM
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
                                            WHERE msg.id='$msgid'");
$msg_r=mysql_fetch_object($msg_q);

$orgn_q=mysql_query("select * from complex order by name asc");
$rnk_q=mysql_query("select * from rank order by rank_type asc");
$typ_q=mysql_query("select * from com_type order by type_details asc");
$actn_q=mysql_query("select * from action order by action_details asc");
$slu_q=mysql_query("select * from solution order by solution_details asc");

$cmmnts_qq=mysql_query("select *, cmnts.datetime as cdatetime from
                        cmmnts as cmnts
                        LEFT JOIN rank as rnk
                                  ON cmnts.rank=rnk.id
                        LEFT JOIN com_type as comt
                                  ON cmnts.complain_type=comt.id
                        LEFT JOIN action as act
                                  ON cmnts.action=act.id
                        LEFT JOIN solution as slu
                                  ON cmnts.solution=slu.id
                        where cmnts.msgid='$msgid' ORDER BY cmnts.id ASC");

if(isset($_POST['cmmntsi']))
{
    $org_i=mysql_real_escape_string($_POST['org_i']);
    $rnk_i=mysql_real_escape_string($_POST['rnk_i']);

    foreach($_POST['typ_i'] as $typ_m) {
    $typ_i=$typ_i.$typ_m.",";
    }
    $typ_i=mysql_real_escape_string($typ_i);
    $actn_i=mysql_real_escape_string($_POST['actn_i']);
    $slu_i=mysql_real_escape_string($_POST['slu_i']);
    $cmmnts_i=mysql_real_escape_string($_POST['cmmnts_i']);
    $msgiid=$msg_r->msgiid;

    $action_insert="Update messages SET complex='$org_i', rank='$rnk_i', complain_type='$typ_i', action='$actn_i', solution='$slu_i' where id='$msgiid'";
    $cmmnts_insert="INSERT INTO cmmnts SET msgid='$msgiid', said='$susr', cmmnts='$cmmnts_i', datetime='$datetime', action='$actn_i', solution='$slu_i', rank='$rnk_i', complain_type='$typ_i'";
    $sqql= array($action_insert, $cmmnts_insert);

  foreach ($sqql as $sql){
    mysql_query($sql) or die("Sorry! Database has problem.");
  }
    $str     = $cmmnts_i;
    $order   = array("\\r\\n", "\\n", "\\r");
    $replace = '<br />';
    $cmmnts_i = str_replace($order, $replace, $str);

    include("_^_email_single.php");
        //echo "$org_i<br/>$rnk_i<br/>$typ_i<br/>$actn_i<br/>$slu_i<br/>$cmmnts_i<br/>$msgiid";
}
?>

<!-- ======= .grid_12 ======= -->
				<section class="grid_12">
					<!-- ======= UI TABS ======= -->
					<div class="ui_tabs">
						<ul>
							<li><a href="#tabs-1">Take Action</a></li>
                            <li><a href="#tabs-2">Comments about this message</a></li>
						</ul>
						<div id="tabs-1">
                            <?php include ("_^_msgactn.php"); ?>
						</div>
                        <div id="tabs-2">
                            <?php include ("_^_msgcmmnts.php"); ?>
                        </div>
					</div>
					
				</section>
<!-- ======= /.grid_12 ======= -->
<?php   }   ?>