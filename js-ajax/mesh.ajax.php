<?php
	require_once("../includes/database.php");
?>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>
<?php

	$sql = "
	SELECT DISTINCT 
		 mesh.id
		,mesh.mesh
	FROM PartNumber.Mesh mesh
	INNER JOIN PartNumber.XRefPartNumber xref
	ON xref.mesh_id = mesh.id
	WHERE 1=1
	AND diameter_id = " . $db->strprep( $_REQUEST["diameter_id"] ) . "
	AND frame_material_id = " . $db->strprep( $_REQUEST["frame_material_id"] ) . "
	AND height_id = " . $db->strprep( $_REQUEST["height_id"] ) . "
	ORDER BY sort_id ASC
	";
	$result_set = $db->query($sql);
	if ( $result_set ) {
?>
		<label>Mesh Type:</label><br />
		<select name="mesh_id" id="mesh_id" OnChange="ShowMeshMat();">
			<option value="">Please Select a Category</option>
			<?php
				if($result_set==1) {
					while( $Mesh = $db->fetch_array( $result_set ) ) {
						$item_selected = "";
						if( $Mesh["id"] == $_REQUEST["mesh_id"] ) {
							$item_selected = " selected";
						}
						?><option value="<?=$Mesh["id"]?>" <?=$item_selected?>><?=$Mesh["mesh"]?></option><?php
					}
				}
	}
			?>	
</select>

<script>

	function ShowMeshMat() {
		var qs = 'diameter_id=' + <?=$_REQUEST["diameter_id"]?> + '&frame_material_id=' + <?=$_REQUEST["frame_material_id"]?> + '&height_id=' + <?=$_REQUEST["height_id"]?> + '&mesh_id=' + document.getElementById("mesh_id").value;
		LoadDivContent( 'mesh_material', '', 'divMesh_Material', '', qs );
		if (document.getElementById('mesh_id').value == '' ) {
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'visible';
			document.getElementById('divMesh_Material').style.visibility = 'hidden';
			document.getElementById('divPart_Number').style.visibility = 'hidden';
		} else {
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'visible';
			document.getElementById('divMesh_Material').style.visibility = 'visible';
			document.getElementById('divPart_Number').style.visibility = 'hidden';	
		}
	}

</script>