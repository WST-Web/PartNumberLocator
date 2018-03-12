<?php
	require_once("../includes/database.php");
?>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>
<?php

	$sql = "
	SELECT DISTINCT 
		 mat.id
		,mat.material
	FROM PartNumber.Material mat
	INNER JOIN PartNumber.XRefPartNumber xref
	ON xref.mesh_material_id = mat.id
	WHERE 1=1
	AND diameter_id = " . $db->strprep( $_REQUEST["diameter_id"] ) . "
	AND frame_material_id = " . $db->strprep( $_REQUEST["frame_material_id"] ) . "
	AND height_id = " . $db->strprep( $_REQUEST["height_id"] ) . "
	AND mesh_id = " . $db->strprep( $_REQUEST["mesh_id"] ) . "
	ORDER BY material ASC
	";
	$result_set = $db->query($sql);
	if ( $result_set ) {
?>
		<label>Mesh Material:</label><br />
		<select name="mesh_material_id" id="mesh_material_id" OnChange="ShowPartNumber();">
			<option value="">Please Select a Category</option>
			<?php
				if($result_set==1) {
					while( $Material = $db->fetch_array( $result_set ) ) {
						$item_selected = "";
						if( $Material["id"] == $_REQUEST["mesh_material_id"] ) {
							$item_selected = " selected";
						}
						?><option value="<?=$Material["id"]?>" <?=$item_selected?>><?=$Material["material"]?></option><?php
					}
				}
	}
			?>	
</select>

<script>

	function ShowPartNumber() {
		if (document.getElementById('mesh_material_id').value != "" ) {
			var qs = 'diameter_id=' + <?=$_REQUEST["diameter_id"]?> + '&frame_material_id=' + <?=$_REQUEST["frame_material_id"]?> + '&height_id=' + <?=$_REQUEST["height_id"]?> + '&mesh_id=' + <?=$_REQUEST["mesh_id"]?> + '&mesh_material_id=' + document.getElementById("mesh_material_id").value;
			LoadDivContent( 'part_number', '', 'divPart_Number', '', qs );
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'visible';
			document.getElementById('divMesh_Material').style.visibility = 'visible';
			document.getElementById('divPart_Number').style.visibility = 'visible';	
		} else {
			var qs = 'diameter_id=' + <?=$_REQUEST["diameter_id"]?> + '&frame_material_id=' + <?=$_REQUEST["frame_material_id"]?> + '&height_id=' + <?=$_REQUEST["height_id"]?> + '&mesh_id=' + document.getElementById("mesh_id").value;
			LoadDivContent( 'mesh_material', '', 'divMesh_Material', '', qs );
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'visible';
			document.getElementById('divMesh_Material').style.visibility = 'visible';
			document.getElementById('divPart_Number').style.visibility = 'hidden';
		}
	}

</script>