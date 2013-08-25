<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Skins &mdash; CKEditor Sample</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type" />
	<script type="text/javascript" src="../ckeditor.js"></script>
	<script src="sample.js" type="text/javascript"></script>
	<link href="sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1 class="samples">
		Update Email Templates (Single)</h1>
	<!-- This <div> holds alert messages to be display in the sample page. -->
	<form action="sample_posteddata.php" method="post">
	<h2 class="samples">
	  <textarea cols="80" id="editor_office2003" name="editor_office2003" rows="10"> </textarea>
		<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'editor_office2003',
					{
						skin : 'office2003'
					});

			//]]>
			</script>
	</h2>
	</form>
	<div id="footer">
    <p id="copy">
			Copyright &copy; 2003-2012, <a class="samples" href="http://liongang.com/">LION ICT Solution</a>. All rights reserved.
		</p>
	</div>
</body>
</html>
