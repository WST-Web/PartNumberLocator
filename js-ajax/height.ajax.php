<?php
	require_once("../includes/database.php");
?>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>

<?php
/*
	$sel_items = "
	SELECT *
	FROM PartNumber.Height
	ORDER BY id ASC
	";
*/
	$sql = "
	SELECT DISTINCT 
		 hei.id
		,hei.height
	FROM PartNumber.Height hei
	INNER JOIN PartNumber.XRefPartNumber xref
	ON xref.height_id = hei.id
	WHERE 1=1
	AND diameter_id = " . $db->strprep( $_REQUEST["diameter_id"] ) . "
	AND frame_material_id = " . $db->strprep( $_REQUEST["frame_material_id"] ) . "
	ORDER BY height ASC
	";
	$got_data = $db->query($sql);
	if ( $got_data ) {
?>
		<label>Frame Height:</label><br />
		<select name="height_id" id="height_id" OnChange="ShowMeshSize();">
			<option value="">Please Select a Category</option>
			<?php
				if($got_data==1) {
					while( $Height = $db->fetch_array( $got_data ) ) {
						$item_selected = "";
						if( $Height["id"] == $_REQUEST["height_id"] ) {
							$item_selected = " selected";
						}
						?><option value="<?=$Height["id"]?>" <?=$item_selected?>><?=$Height["height"]?></option><?php
					}
				}
	}
			?>	
</select>

<script>

	function ShowMeshSize() {
		var qs = 'diameter_id=' + <?=$_REQUEST["diameter_id"]?> + '&frame_material_id=' + <?=$_REQUEST["frame_material_id"]?> + '&height_id=' + document.getElementById("height_id").value;
		LoadDivContent( 'mesh', '', 'divMesh', '', qs );
		if (document.getElementById('height_id').value == '' ) {
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'hidden';
			document.getElementById('divMesh_Material').style.visibility = 'hidden';
			document.getElementById('divPart_Number').style.visibility = 'hidden';
		} else {
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'visible';
			document.getElementById('divMesh_Material').style.visibility = 'hidden';
			document.getElementById('divPart_Number').style.visibility = 'hidden';	
		}
	}

</script>