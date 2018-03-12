<?php
	require_once("../includes/database.php");
?>
<script type="text/javascript" src="includes/jquery-1.8.3.min.js"></script>   
<script type="text/javascript" src="includes/_js_jquery_common.js"></script>
<?php

	if ( $_REQUEST != "" ) {
		$sql = "
		SELECT part_number
		FROM PartNumber.XRefPartNumber
		WHERE 1=1
		AND diameter_id = " . $db->strprep( $_REQUEST["diameter_id"] ) . "
		AND frame_material_id = " . $db->strprep( $_REQUEST["frame_material_id"] ) . "
		AND height_id = " . $db->strprep( $_REQUEST["height_id"] ) . "
		AND mesh_id = " . $db->strprep( $_REQUEST["mesh_id"] ) . "
		AND mesh_material_id = " . $db->strprep( $_REQUEST["mesh_material_id"] ) . "
		";
		$result_set = $db->query($sql);
		if ( $result_set ) {
			$Part_Number = $db->fetch_array( $result_set ) 
		
?>
		<h1>Part Number:&nbsp;&nbsp;&nbsp;<?=$Part_Number["part_number"]?></h1>
<?php
		}
	}
?>
