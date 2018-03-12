<?php
	require_once("../includes/database.php");
?>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>
<?php
/*
	$sel_items = "
	SELECT *
	FROM PartNumber.Material
	ORDER BY id ASC
	";
*/
	$sql = "
	SELECT DISTINCT 
		 mat.id
		,mat.material
	FROM PartNumber.Material mat
	INNER JOIN PartNumber.XRefPartNumber xref
	ON xref.frame_material_id = mat.id
	WHERE diameter_id = " . $db->strprep( $_REQUEST["diameter_id"] ) . "
	ORDER BY material ASC
	";
	$result_set = $db->query($sql);
	if ( $result_set ) {
?>
		<label>Frame Material:</label><br />
		<select name="frame_material_id" id="frame_material_id" OnChange="ShowFrameHeight();">
			<option value="">Please Select a Material</option>
			<?php
				if($result_set==1) {
					while( $Material = $db->fetch_array( $result_set ) ) {
						$item_selected = "";
						if( $Material["id"] == $_REQUEST["frame_material_id"] ) {
							$item_selected = " selected";
						}
						?><option value="<?=$Material["id"]?>" <?=$item_selected?>><?=$Material["material"]?></option><?php
					}
				}
	}
			?>	
		</select>
<script>
	function ShowFrameHeight() {
		var qs = 'diameter_id=' + <?=$_REQUEST["diameter_id"]?> + '&frame_material_id=' + document.getElementById("frame_material_id").value;
		LoadDivContent( 'height', '', 'divHeight', '', qs );
		if (document.getElementById('frame_material_id').value == '' ) {
			document.getElementById('divHeight').style.visibility = 'hidden';
			document.getElementById('divMesh').style.visibility = 'hidden';
			document.getElementById('divMesh_Material').style.visibility = 'hidden';
			document.getElementById('divPart_Number').style.visibility = 'hidden';
		} else {
			document.getElementById('divHeight').style.visibility = 'visible';
			document.getElementById('divMesh').style.visibility = 'hidden';
			document.getElementById('divMesh_Material').style.visibility = 'hidden';
			document.getElementById('divPart_Number').style.visibility = 'hidden';
		}
	} 
</script>