<?php
session_start();

require("db.php");


$result = getJSONFromDB("select equipment.equipmentId, equipment.equipmentName,  equipment.equipmentPrice, equipment.equipmentQuantity,  from");
$result = json_decode($result, true);


if (isset($_GET["did"])) {//deleting a item
	$id = $_GET["did"];
	deleteFromDB("delete from equipment where equipmentId = $id");
	header("Location: manage_equipment.php");
}
if (isset($_REQUEST["add_new_equipment"])) {
	if (strlen((string)$_REQUEST["equipmentName"]) != 0 ) {
		$name = $_REQUEST["equipmentName"];
		$price = $_REQUEST["equipmentPrice"];
		$quantity = $_REQUEST["equipmentQuantity"];
		

		$idresult = getJSONFromDB("select max(equipmentId) as equipmentId from equipment");
		$idresult = json_decode($idresult, true);
		$id = $idresult[0]["equipmentId"];
		$id = $id + 1;
		insertIntoDB("insert into equipment VALUES ('$id', '$name',  '$price', '$quantity')");
		header("Location: manage_equipment.php");
	}
	else {
		header("Location: manage_equipment.php");
	}
}

if (isset($_REQUEST["update_equipment"])) {
	if (!isset($_REQUEST["equipmentId"]) || strlen((String)$_REQUEST["equipmentId"]) == 0) {
		header("Location: manage_equipment.php");
	}
	$id = $_REQUEST["equipmentId"];
	$result = getJSONFromDB("select * from equipment where equipmentId = $id");
	$result = json_decode($result, true);
	if (isset($_REQUEST["equipmentName"]) && strlen((String)$_REQUEST["equipmentName"]) != 0) {
		$name = $_REQUEST["equipmentName"];
	}
	else {
		$name = $result[0]["equipmentName"];
	}
	if (isset($_REQUEST["equipmentPrice"]) && strlen($_REQUEST["equipmentPrice"]) != 0) {
		$price = $_REQUEST["equipmentPrice"];
	}
	else {
		$price = $result[0]["equipmentPrice"];
	}
	if (isset($_REQUEST["equipmentQuantity"]) && strlen($_REQUEST["equipmentQuantity"]) != 0) {
		$stock = $_REQUEST["equipmentQuantity"];
	}
	else {
		$stock = $result[0]["equipmentQuantity"];
	}
	updateIntoDB("update equipment set equipmentName = '$name', equipmentPrice = '$price', equipmentQuantity = '$quantity' where equipmentId = '$id'");
	header("Location: manage_equipment.php");

}
if (isset($_REQUEST["add_quantity"])) {

	if (!isset($_REQUEST["equipmentId"]) || strlen((String)$_REQUEST["equipmentId"]) == 0) {
		header("Location: manage_equipment.php");
	}
	$id = $_REQUEST["equipmentId"];
	$stock = $_REQUEST["equipmentQuantity"];
	updateIntoDB("update equipment set equipmentQuantity = equipmentQuantity+ '$quantity' where equipmentId = '$id'");
	header("Location: manage_equipment.php");
}


	  for ($i = 0; $i
	< sizeof($result); $i++) {
		$id = $result[$i]["equipmentId"];
	$name = $result[$i]["equipmentName"];
	$price = $result[$i]["equipmentPrice"];
	$quantity = $result[$i]["equipmentQuantity"];
	echo "<tr>
		< td > $id</td >
							<td>$name</td>
							<td>$price</td>
							<td>$quantity</td>
							<td><a href='manage_equipment.php?did=$id'>Delete</a></td>
						 </tr > ";
}
?>
