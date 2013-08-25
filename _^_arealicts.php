<!-- ======= .grid_12 ======= -->
				<section class="grid_12">
				
					<h2>Area Settings</h2>
					<hr />
					<!-- ======= UI TABS ======= -->
					<div class="ui_tabs">
						<ul>
							<li><a href="#tabs-1">Area List</a></li>
							<li><a href="#tabs-2">Add New Area</a></li>
						</ul>
						<div id="tabs-1">
							<?php include ("_^_arealist.php"); ?>
						</div>
                        
                    <div id="tabs-2">
							<?php include ("_^_addarea.php"); ?>
						</div>
					</div>
					
				</section>
<!-- ======= /.grid_12 ======= -->
<?php
if(isset($_POST['addarea_i']) AND $_POST['areaname_i']!="" AND $_POST['areacode_i']!="" )
{
$areaname_i=mysql_real_escape_string($_POST['areaname_i']);
$areacode_i=mysql_real_escape_string($_POST['areacode_i']);
$areadetails_i=mysql_real_escape_string($_POST['areadetails_i']);

    $str     = $areadetails_i;
    $order   = array("\\r\\n", "\\n", "\\r");
    $replace = '<br />';
    $areadetails_i = str_replace($order, $replace, $str);

    mysql_query("INSERT INTO area VALUES ('$areaname_i','$areacode_i','$areadetails_i')");
echo "$areaname_i<br />$areacode_i<br />$areadetails_i";

}
?>