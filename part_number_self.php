<?php
/*
	Part Number Finder
	Initial Build: 14 December 2015
	Written by: Andrew Bartholomew
	W.S. Tyler 
*/
require_once("includes/database.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Part Number Locater</title>
</head>

<body>

	
    <form method="Post">
    <div id="divDiameter" style="float: left;">
    	
	</div>
    <script>
		//var txtTestValue = $('#txtTest').val();
		//alert("txtTestValue: " + txtTestValue);
		LoadDivContent( 'diameter', '', 'divDiameter', '', '' );
	</script>
    <div id="divFrame_Material" style="float: left; padding-left: 5px;">
    	
    </div>
    <div id="divHeight" style="float: left; padding-left: 5px;">
    	
    </div>
    <div id="divMesh" style="float: left; padding-left: 5px;">
    	
    </div>
    <div id="divMesh_Material" style="float: left; padding-left: 5px;">
    	
    </div>
    <div id="divPart_Number" style="clear: both;">
    	
    </div>
    </form>

</body>
</html>
