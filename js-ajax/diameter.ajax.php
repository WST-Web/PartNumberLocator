<?php
	require_once("../includes/database.php");
?>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>
<?php
	$sql = "
	SELECT *
	FROM PartNumber.Diameter
	ORDER BY id ASC
	";
	$result_set = $db->query($sql);
	if ( $result_set ) {
		//print_r($result_set);
?>
		<form id="frmDiameter" method="post">
		<label>Diameter:</label><br />
		<select name="diameter_id" id="diameter_id" OnChange="ShowFrameMat();">
			<option value="">Please Select a Diameter</option>
			<?php
				
				echo "Good";
				while( $Diameter = $db->fetch_array( $result_set ) ) {
					$item_selected = "";
					if( $Diameter["id"] == $_REQUEST["diameter_id"] ) {
						$item_selected = " selected";
					}
			?>
            		<option value="<?=$Diameter["id"]?>"<?=$item_selected?>><?=$Diameter["diameter"]?></option>
			<?php
				}
	}
			?>	
</select>
</form>
<script>

	function ShowFrameMat() {
		var qs = 'diameter_id=' + document.getElementById("diameter_id").value;
		LoadDivContent( 'frame_material', '', 'divFrame_Material', '', qs );
		if (document.getElementById('diameter_id').value == '' ) {
			document.getElementById('divFrame_Material').style.display = 'none';
			document.getElementById('divHeight').style.display = 'none';
			document.getElementById('divMesh').style.display = 'none';
			document.getElementById('divMesh_Material').style.display = 'none';
			document.getElementById('divPart_Number').style.display = 'none';
		} else {
			document.getElementById('divFrame_Material').style.display = 'block';
			document.getElementById('divHeight').style.display = 'none';
			document.getElementById('divMesh').style.display = 'none';
			document.getElementById('divMesh_Material').style.display = 'none';
			document.getElementById('divPart_Number').style.display = 'none';	
		}
	}

</script>