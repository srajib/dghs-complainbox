
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
        <title>Dulcet - Admin Theme </title>
		
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
				
		
    </head>
    <body>
				
		<section id="layout">
		
			<div class="logo_profile container_12">
				<div class="grid_6 logo_img">
					<img src="images/logo.png" alt="Logo" />
				</div>
				<div class="grid_6 profile_meta">
					<div class="user_meta">
						<div>
							<img src="images/smartik.jpg" alt="" />
						</div>
						<div class="name">
							Welcome Smartik <br />
							<a href="#" class="submeta">Profile</a>
							<a href="#" class="submeta">Logout</a>
						</div>
					</div>
				</div>
			
				<div class="clear"></div>
			</div>
	
			<section id="top">
					
				<section id="top_bar">						
					<section id="main_menu">
						<ul class="sf-menu">
							<li><a href="welcome.php">Dashboard</a></li>
							<li><a href="#">Elements</a>
								<ul>
									<li><a href="form_elements.php">Form elements</a></li>
									<li><a href="user_interface.php">User Interface</a></li>
									<li><a href="generic_icons.php">Generic icons</a></li>
									<li><a href="tabs_accordion.php">Tabs Accordion</a></li>
									<li><a href="grid.php">Template grid</a></li>
									<li><a href="#">Another menu level</a>
										<ul>
											<li><a href="#">Lorem ipsum</a></li>
											<li><a href="#">Dolor sit amet</a></li>
											<li><a href="#">Aenean molestie</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#">Plugins</a>
								<ul>
									<li><a href="charts.php">Charts</a></li>
									<li><a href="datatables.php">Data tables</a></li>
									<li><a href="syntax_highlight.php">Syntax Highlighter</a></li>
									<li><a href="form_plugins.php">Form specific plugins</a></li>
									<li><a href="file_explorer.php">File explorer</a></li>
									<li><a href="full_calendar.php">Full calendar</a></li>
								</ul>
							</li>
							<li><a href="#">Gallery example</a>
								<ul>
									<li><a href="gallery.php">Gallery 1</a></li>
									<li><a href="gallery2.php">Gallery 2</a></li>
								</ul>
							</li>
							<li><a href="#">Documentation</a>
								<ul>
									<li><a href="zHtmlstructure.php">HTML Structure</a></li>
									<li><a href="zForms.php">Forms Structure</a></li>
									<li><a href="zColorpicker.php">Color Picker</a></li>									
									<li><a href="zDatepicker.php">Date Picker</a></li>									
									<li><a href="zSlider.php">Slider</a></li>									
									<li><a href="zProgressbar.php">Progress Bar</a></li>						
									<li><a href="zTabs.php">Tabs</a></li>		
									<li><a href="zAccordion.php">Accordion</a></li>		
									<li><a href="zCharts.php">Charts( Flotr2 )</a></li>	
									<li><a href="zDataTables.php">Data Tables</a></li>
									<li><a href="zFileExplorer.php">File Explorer( elFinder )</a></li>
									<li><a href="zDialogsAlerts.php">Dialogs &amp; Alerts</a></li>
									<li><a href="zRequirements.php">Requirements</a></li>
								</ul>
							</li>
						</ul>							
					<div class="clear"></div>
					</section><!-- End of #main_menu -->
				</section><!-- End of #top_bar -->
				<div class="clear"></div>
				
				<section class="top_in">	
					<section id="second_top_bar">
						<div id="quick_task" class="jThumbnailScroller">
							<div class="jTscrollerContainer">
							<div class="clear"></div>
								<ul class="jTscroller">
									<li><a href="#"><span class="icon1"></span>Dashboard</a></li>
									<li><a href="#"><span class="icon2"></span>Forms</a></li>
									<li><a href="#"><span class="icon3"></span>Charts</a></li>
									<li><a href="#"><span class="icon4"></span>Organizer</a></li>
									<li><a href="#"><span class="icon5"></span>Settings</a></li>
									<li><a href="#"><span class="icon7"></span>Tables</a></li>
									<li><a href="#"><span class="icon6"></span>Contacts</a></li>
									<li><a href="#"><span class="icon8"></span>File explorer</a></li>
									<li><a href="#"><span class="icon9"></span>Users</a></li>
									<li><a href="#"><span class="icon10"></span>Upload</a></li>
									<li><a href="#"><span class="icon13"></span>Download</a></li>
									<li><a href="#"><span class="icon11"></span>Plus</a></li>
									<li><a href="#"><span class="icon12"></span>Add product</a></li>
									<li><a href="#"><span class="icon14"></span>Photos</a></li>
									<li><a href="#"><span class="icon15"></span>Comments</a></li>
									<li><a href="#"><span class="icon17"></span>New mail</a></li>
									<li><a href="#"><span class="icon16"></span>Database</a></li>
									<li><a href="#"><span class="icon18"></span>Favorites</a></li>
									<li><a href="#"><span class="icon19"></span>Security settings</a></li>
									<li><a href="#"><span class="icon20"></span>New page</a></li>
								</ul>
								<div class="clear"></div>
							</div>										
							<div class="clear"></div>
						</div>
						<div class="clear"></div>						
					</section><!-- End of #second_top_bar -->
				</section><!-- End of .top_in -->
				
			</section><!-- End of #top -->
			

			
	
			<section id="container" class="container_12">
			
						
				<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><span class="icon16_sprite i_checkmark"></span>MultiSelect</div>
						
						<div class="inside">
							<div class="in">
								<!-- formee-->									
								<form class="formee" action="#">									
									<div class="grid-3-12"><label>Select options </label></div>
									<div class="grid_9">
									
										<select id="countries" class="multiselect1" multiple="multiple" name="countries[]">
											<option value="AFG">Afghanistan</option>
											<option value="ALB">Albania</option>
											<option value="DZA">Algeria</option>
											<option value="AND">Andorra</option>
											<option value="ARG">Argentina</option>
											<option value="ARM">Armenia</option>
											<option value="ABW">Aruba</option>
											<option value="AUS">Australia</option>
											<option value="AUT" selected="selected">Austria</option>
																				
											<option value="AZE">Azerbaijan</option>
											<option value="BGD">Bangladesh</option>
											<option value="BLR">Belarus</option>
											<option value="BEL">Belgium</option>
											<option value="BIH">Bosnia and Herzegovina</option>
											<option value="BRA">Brazil</option>
											<option value="BRN">Brunei</option>
											<option value="BGR">Bulgaria</option>
											<option value="CAN">Canada</option>

											<option value="CHN">China</option>
											<option value="COL">Colombia</option>
											<option value="HRV">Croatia</option>
											<option value="CYP">Cyprus</option>
											<option value="CZE">Czech Republic</option>
											<option value="DNK">Denmark</option>
											<option value="EGY">Egypt</option>
											<option value="EST">Estonia</option>
											<option value="FIN">Finland</option>

											<option value="FRA">France</option>
											<option value="GEO">Georgia</option>
											<option value="DEU" selected="selected">Germany</option>
											<option value="GRC">Greece</option>
											<option value="HKG">Hong Kong</option>
											<option value="HUN">Hungary</option>
											<option value="ISL">Iceland</option>
											<option value="IND">India</option>
											<option value="IDN">Indonesia</option>

											<option value="IRN">Iran</option>
											<option value="IRL">Ireland</option>
											<option value="ISR">Israel</option>
											<option value="ITA">Italy</option>
											<option value="JPN">Japan</option>
											<option value="JOR">Jordan</option>
											<option value="KAZ">Kazakhstan</option>
											<option value="KWT">Kuwait</option>
											<option value="KGZ">Kyrgyzstan</option>

											<option value="LVA">Latvia</option>
											<option value="LBN">Lebanon</option>
											<option value="LIE">Liechtenstein</option>
											<option value="LTU">Lithuania</option>
											<option value="LUX">Luxembourg</option>
											<option value="MAC">Macau</option>
											<option value="MKD">Macedonia</option>
											<option value="MYS">Malaysia</option>
											<option value="MLT">Malta</option>

											<option value="MEX">Mexico</option>
											<option value="MDA">Moldova</option>
											<option value="MNG">Mongolia</option>
											<option value="NLD" selected="selected">Netherlands</option>
											<option value="NZL">New Zealand</option>
											<option value="NGA">Nigeria</option>
											<option value="NOR">Norway</option>
											<option value="PER">Peru</option>
											<option value="PHL">Philippines</option>

											<option value="POL">Poland</option>
											<option value="PRT">Portugal</option>
											<option value="QAT">Qatar</option>
											<option value="ROU">Romania</option>
											<option value="RUS">Russia</option>
											<option value="SMR">San Marino</option>
											<option value="SAU">Saudi Arabia</option>
											<option value="CSG">Serbia and Montenegro</option>
											<option value="SGP">Singapore</option>

											<option value="SVK">Slovakia</option>
											<option value="SVN">Slovenia</option>
											<option value="ZAF">South Africa</option>
											<option value="KOR">South Korea</option>
											<option value="ESP">Spain</option>
											<option value="LKA">Sri Lanka</option>
											<option value="SWE">Sweden</option>
											<option value="CHE">Switzerland</option>
											<option value="SYR">Syria</option>

											<option value="TWN">Taiwan</option>
											<option value="TJK">Tajikistan</option>
											<option value="THA">Thailand</option>
											<option value="TUR">Turkey</option>
											<option value="TKM">Turkmenistan</option>
											<option value="UKR">Ukraine</option>
											<option value="ARE">United Arab Emirates</option>
											<option value="GBR">United Kingdom</option>
											<option value="USA" selected="selected">United States</option>

											<option value="UZB">Uzbekistan</option>
											<option value="VAT">Vatican City</option>
											<option value="VNM">Vietnam</option>
										</select>
											
									</div>								
								</form>
								<div class="clear"></div>									
								<!-- formee-->
							</div>
						</div>
						
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->
				
				
				
				<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><span class="icon16_sprite i_upload"></span>Multiple File uploader (Plupload)</div>
						
						<div class="inside">
							<div class="in">
								<!-- formee-->
								<form class="formee" action="#">
																		
									<div class="grid-3-12"><label>Select files </label></div>
									<div class="grid-9-12">
									
										<div id="uploader">
											<p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
										</div>
										
									</div>
									<div class="clear"></div>
								</form>
								<!-- formee-->
							</div>
						</div>
						
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->
				
				
							
				<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title">
							<span class="icon16_sprite i_upload"></span> Multiple File uploader, Full width (Plupload)</div>
						
						<div class="inside">
							<div id="tab-plupload">
								<!-- formee-->
								<form class="formee" action="#">
												
									<div id="uploader2" class="uploader_fullwidth">
										<p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
									</div>
									<div class="clear"></div>
										
								</form>
								<!-- formee-->
							</div>
						</div>
						
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->
				
				
				
				<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><span class="icon16_sprite i_window"></span>WYSIWYG Editor</div>
						<div class="inside">
							<div class="in">
								<!-- formee-->
								<form class="formee" action="#">
								
									<div class="grid-3-12">
										<label>Default visual editor </label>
									</div>
									<div class="grid-9-12">
										<textarea id="elm1" name="elm1" class="tinymce">
											&lt;p&gt;
												This is some example text that you can edit inside the &lt;strong&gt;TinyMCE editor&lt;/strong&gt;.
											&lt;/p&gt;
											&lt;p&gt;
											Nam nisi elit, cursus in rhoncus sit amet, pulvinar laoreet leo. Nam sed lectus quam, ut sagittis tellus. Quisque dignissim mauris a augue rutrum tempor. Donec vitae purus nec massa vestibulum ornare sit amet id tellus. Nunc quam mauris, fermentum nec lacinia eget, sollicitudin nec ante. Aliquam molestie volutpat dapibus. Nunc interdum viverra sodales. Morbi laoreet pulvinar gravida. Quisque ut turpis sagittis nunc accumsan vehicula. Duis elementum congue ultrices. Cras faucibus feugiat arcu quis lacinia. In hac habitasse platea dictumst. Pellentesque fermentum magna sit amet tellus varius ullamcorper. Vestibulum at urna augue, eget varius neque. Fusce facilisis venenatis dapibus. Integer non sem at arcu euismod tempor nec sed nisl. Morbi ultricies, mauris ut ultricies adipiscing, felis odio condimentum massa, et luctus est nunc nec eros.
											&lt;/p&gt;
										</textarea>
									</div>
																		
								</form>
								<!-- formee-->
							</div>
						</div>
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->
				
				
				
				<!-- ======= .grid_12 - block begin ======= -->
				<section class="grid_12">
					<div class="box">
						<div class="title"><span class="icon16_sprite i_window"></span>WYSIWYG Editor [Another example]</div>
						<div class="inside">
							<!-- formee-->
							<form class="formee" action="#">
							
								<textarea id="elm2" name="elm2" class="tinymce">
									&lt;p&gt;
										This is some example text that you can edit inside the &lt;strong&gt;TinyMCE editor&lt;/strong&gt;.
									&lt;/p&gt;
									&lt;p&gt;
									Nam nisi elit, cursus in rhoncus sit amet, pulvinar laoreet leo. Nam sed lectus quam, ut sagittis tellus. Quisque dignissim mauris a augue rutrum tempor. Donec vitae purus nec massa vestibulum ornare sit amet id tellus. Nunc quam mauris, fermentum nec lacinia eget, sollicitudin nec ante. Aliquam molestie volutpat dapibus. Nunc interdum viverra sodales. Morbi laoreet pulvinar gravida. Quisque ut turpis sagittis nunc accumsan vehicula. Duis elementum congue ultrices. Cras faucibus feugiat arcu quis lacinia. In hac habitasse platea dictumst. Pellentesque fermentum magna sit amet tellus varius ullamcorper. Vestibulum at urna augue, eget varius neque. Fusce facilisis venenatis dapibus. Integer non sem at arcu euismod tempor nec sed nisl. Morbi ultricies, mauris ut ultricies adipiscing, felis odio condimentum massa, et luctus est nunc nec eros.
									&lt;/p&gt;
								</textarea>
																	
							</form>
							<!-- formee-->
							<section class="box_footer">
								<div class="grid-12-12">
									<input type="submit" class="right button green" value="Submit message" />
								</div>
								<div class="clear"></div>
							</section>
						</div>
					</div>
				</section>
				<div class="clear"></div>
				<!-- ======= .grid_12 - block end ======= -->
				
				
				
			</section><!-- End of #container -->
			

			
			
		</section><!-- End of #layout -->
		<div class="clear"></div>

		<section id="footer_bar">
			<div class="copyr">Copyright &copy; Smartik 2012</div>
		</section>		
		
		
		<!-- Bottom Scripts -->
		<script type="text/javascript" src="js/jqueryui_init.js"></script>
		<script type="text/javascript" src="js/flotr2_init.js"></script>	
		<script type="text/javascript" src="js/bottom_scripts.js"></script>
		<script type="text/javascript" src="js/custom_pages.js"></script>
		<script type="text/javascript" src="js/jquery.thumbnailScroller.js"></script>
				
    </body>
</html>