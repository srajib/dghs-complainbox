<?php
session_start();
$susr=$_SESSION['usr'];
$spass=$_SESSION['pass'];
    if($susr=='' || $spass=='')
       {    include ("login.php");     }

else {
    include "./helperphp/db_con.php";
	
$offset=6*60*60;
$todayFormat="Y-m-d";
$datetimeFormat="Y-m-d H-i-s";

$today=gmdate($todayFormat, time()+$offset);
$datetime=gmdate($datetimeFormat, time()+$offset);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <title>MOHFW Complaint &amp; Suggestion BOX</title>
		
		<!-- ==================================================================================== 
			STYLES BEGIN 
		===================================================================================== -->
		
		<!-- Global styles -->
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/grid.css" />
		<link rel="stylesheet" type="text/css" href="css/config.css" />

		<!-- Plugin configuration (styles) -->
		<link rel="stylesheet" href="css/plugin_config.css" />
		
		<!--[if IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		
		
		<!-- ======================================================================================
			SCRIPTS BEGIN
		======================================================================================= -->
        
	<!-- = Global Scripts [required for template] 
		***************************************************************************************-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/global_plugins_scripts.js"></script>
		
		
		
	<!-- = From Plugins Dir 
		***************************************************************************************-->
		
		<script type="text/javascript" src="plugins/lightbox/js/lightbox/jquery.lightbox.min.js"></script>
		<script type="text/javascript" src="plugins/jqueryui/all/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript" src="plugins/validator/js/languages/jquery.validationEngine-en.js"></script>
		<script type="text/javascript" src="plugins/validator/js/jquery.validationEngine.js"></script>
		<script type="text/javascript" src="plugins/dialogs/jquery-fallr-1.2.js"></script>
		<script type="text/javascript" src="plugins/tinymce/jscripts/tiny_mce/jquery.tinymce.js"></script>
		<script type="text/javascript" src="plugins/spin/jquery-spin.js"></script>
		<script type="text/javascript" src="plugins/qtip/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="plugins/plupload/js/browserplus-min.js"></script>
		<script type="text/javascript" src="plugins/plupload/js/plupload.full.js"></script>
		<script type="text/javascript" src="plugins/plupload/js/jquery.plupload.queue/jquery.plupload.queue.js"></script>
		<script type="text/javascript" src="plugins/multiselect/js/ui.multiselect.js"></script>			
		<script type="text/javascript" src="plugins/datatables/media/js/jquery.dataTables.js"></script>	
		<script type="text/javascript" src="plugins/alerts/javascript/jquery.toastmessage.js"></script>	
		<script type="text/javascript" src="plugins/prettify/prettify.js"></script>
		<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
				
		<script type="text/javascript" src="plugins/fileexplorer/js/elfinder.min.js"></script>	
		<!--<script src="plugins/fileexplorer/js/i18n/elfinder.ru.js" type="text/javascript" charset="utf-8"></script>-->	
		
		<!-- Flotr2 Charts -->
		<script type="text/javascript" src="plugins/flotr2/flotr2.min.js"></script>
		<!--[if IE 8]><script type="text/javascript" src="plugins/flotr2/flotr2.ie.min.js"></script><![endif]-->
		
		<!-- color picker -->
		<script type="text/javascript" src="plugins/colorpicker/js/colorpicker.js"></script>
		<script type="text/javascript" src="plugins/colorpicker/js/eye.js"></script>
		<script type="text/javascript" src="plugins/colorpicker/js/utils.js"></script>
		<script type="text/javascript" src="plugins/colorpicker/js/layout.js"></script>
		
		
		
	<!-- = From JS Dir
		****************************************************************************************-->
		
		<script type="text/javascript" src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="js/jquery.autogrowtextarea.js"></script>
		<script type="text/javascript" src="js/jquery.autotab-1.1b.js"></script>
		
		<!-- From JS Dir [plugin initialization] -->
		<script type="text/javascript" src="js/dialog_fallr_init.js"></script>
		<script type="text/javascript" src="js/tiny_mce_init.js"></script>
		<script type="text/javascript" src="js/datatables_init.js"></script>
		<script type="text/javascript" src="js/head_scripts.js"></script>

	<?php
    $actn=$_GET['actn'];
	?>
    </head>
    <body>

		<section id="layout">
		
			<div class="logo_profile container_12">
				<div class="grid_6 logo_img">
					<img src="images/bdgovlogo.png" alt="MIS DGHS" height="80px"/>
				</div>
				<div class="grid_6 profile_meta">
					<div class="user_meta">
						
					  <div class="name">
				Login as Admin <br />
							<a href="logout.php" class="submeta">Logout</a>
						</div>
					</div>
				</div>
			
				<div class="clear"></div>
			</div>
			<section id="top">
					
				<section id="top_bar">
					<?php include ("_menu/_^_adminmenu.php"); ?><!-- End of #main_menu -->
				</section><!-- End of #top_bar -->
				<div class="clear"></div>
								
			</section><!-- End of #top -->
	
			<section id="container" class="container_12">
            <?php
                $dfaltpage="smmry";
if($actn!="")
{	include ("_^_{$actn}licts.php");	}
else {	include ("_^_{$dfaltpage}licts.php");	}
?>			
		  </section><!-- End of #container -->

		</section><!-- End of #layout -->
		<div class="clear"></div>

		<section id="footer_bar" name="footer_bar">
			<div class="copyr"><a href="http://dghs.gov.bd" target="_blank">  MIS, DGHS 2012 </a></div>
		</section>		
		
		
		<!-- Bottom Scripts -->
<script type="text/javascript" src="js/jqueryui_init.js"></script>
		<script type="text/javascript" src="js/flotr2_init.js"></script>	
		<script type="text/javascript" src="js/bottom_scripts.js"></script>
		<script type="text/javascript" src="js/custom_pages.js"></script>
		<script type="text/javascript" src="js/jquery.thumbnailScroller.js"></script>
        <script type="text/javascript" src="js/tiny_mce_init.js"></script>
				
    </body>
</html>
<?php
mysql_close($dbh);
} ?>