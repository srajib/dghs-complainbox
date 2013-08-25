<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type" />
	<script type="text/javascript" src="eTemp/ckeditor.js"></script>
	<script src="eTemp/_samples/sample.js" type="text/javascript"></script>
	<link href="eTemp/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h2 class="samples">
	  <textarea cols="80" id="editor_office2003" name="<?php echo $txtareaname; ?>" rows="10"><?php if(isset($txtv)){ echo $txtv; } ?></textarea>
		<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'editor_office2003',
					{
						skin : 'office2003'
					});

			//]]>
			</script>
	</h2>
</body>
</html>