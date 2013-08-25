<?php
$area_q=mysql_query("select * from area order by area asc");
?>
<!-- ======= .grid_12 ======= -->
				<section class="grid_12">
				
					<h2>Organization Settings</h2>
					<hr />
					<!-- ======= UI TABS ======= -->
					<div class="ui_tabs">
						<ul>
							<li><a href="#tabs-1">Organization List</a></li>
							<li><a href="#tabs-2">Add New Organization</a></li>
						</ul>
						<div id="tabs-1">
							<?php include ("_^_orglist.php"); ?>
						</div>
                        
                    <div id="tabs-2">
							<?php include ("_^_addorg.php"); ?>
						</div>
					</div>
					
				</section>
<!-- ======= /.grid_12 ======= -->
<?php
if(isset($_POST['addorg_i']) AND $_POST['orgname_i']!="" AND $_POST['orgcode_i']!=""  AND $_POST['orgmobi_i']!="" AND $_POST['orgemail_i']!="" AND $_POST['areacode_i']!="" )
{
    $orgname_i=mysql_real_escape_string($_POST['orgname_i']);
    $orgcode_i=mysql_real_escape_string($_POST['orgcode_i']);
    $orgmobi_i=mysql_real_escape_string($_POST['orgmobi_i']);
    $orgemail_i=mysql_real_escape_string($_POST['orgemail_i']);
    $areacode_i=mysql_real_escape_string($_POST['areacode_i']);
    $orgdetails_i=mysql_real_escape_string($_POST['orgdetails_i']);

    $str     = $orgdetails_i;
    $order   = array("\\r\\n", "\\n", "\\r");
    $replace = '<br />';
    $orgdetails_i = str_replace($order, $replace, $str);

//    echo "$orgname_i<br />$orgcode_i<br />$orgmobi_i<br />$orgemail_i<br />$areacode_i<br />$orgdetails_i";
    mysql_query("INSERT INTO complex VALUES ('$orgcode_i','$orgdetails_i','$orgname_i','$areacode_i')");
    mysql_query("INSERT INTO email VALUES ('$orgemail_i',' ',' ','$orgcode_i','$orgmobi_i')");
}
?>