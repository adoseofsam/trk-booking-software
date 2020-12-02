window.onload = function () {

	var rindex,
		table = document.getElementById("tbb");
	var isEmpty = false,
	 equipmentID = document.getElementById("equipmentID").value;
	 equipmentName = document.getElementById("equipmentName").value;
	 equipmentPrice = document.getElementById("equipmentPrice").value;
	 equipmentQuantity = document.getElementById("equipmentQuantity").value;
	document.getElementById("new").addEventListener("click", addTableRow);
	document.getElementById("edit").addEventListener("click", editInput);
	document.getElementById("remove").addEventListener("click", removeInput);

	function checkEmptyInput() {
		if (equipmentID === "") {
			alert("Equipment ID Cannot Be Empty");
			isEmpty = true;
		}
		else if (equipmentName === "") {
			alert("Equipment Name Cannot Be Empty");
			isEmpty = true;
		}
		else if (equipmentPrice === "") {
			alert("Equipment Price Cannot Be Empty");
			isEmpty = true;
		}
		else if (equipmentQuantity === "") {
			alert("Equipment Quantity Be Empty");
			isEmpty = true;
		}
		return isEmpty;
	}



	function addTableRow() {
		 	newRow = table.insertRow(table.length),
			cell = newRow.insertCell(0),
			cell2 = newRow.insertCell(1),
			cell3 = newRow.insertCell(2),
			cell4 = newRow.insertCell(3),
			equipmentID = document.getElementById("equipmentID").value;
			equipmentName = document.getElementById("equipmentName").value;
			equipmentPrice = document.getElementById("equipmentPrice").value;
			equipmentQuantity = document.getElementById("equipmentQuantity").value;

		cell.innerHTML = equipmentID;
		cell2.innerHTML = equipmentName;
		cell3.innerHTML = equipmentPrice;
		cell4.innerHTML = equipmentQuantity;

		selectRow();
	}

	function selectRow() {
		for(var i = 1; i < table.rows.length; i++) {
			table.rows[i].onclick = function () {
				rindex = this.rowIndex;
				document.getElementById("equipmentID").value = this.cells[0].innerHTML;
				document.getElementById("equipmentName").value = this.cells[1].innerHTML;
				document.getElementById("equipmentPrice").value = this.cells[2].innerHTML;
				document.getElementById("equipmentQuantity").value = this.cells[3].innerHTML;
			};

		}


	}
	selectRow();

	function editInput() {
		if (!checkEmptyInput()) {
			table.rows[rindex].cells[0].innerHTML = equipmentID;
			table.rows[rindex].cells[1].innerHTML = equipmentName;
			table.rows[rindex].cells[2].innerHTML = equipmentPrice;
			table.rows[rindex].cells[3].innerHTML = equipmentQuantity;
		}
	}


	function removeInput() {
		table.deleteRow(rindex);
		document.getElementById("equipmentID").value = "";
		document.getElementById("equipmentName").value = "";
		document.getElementById("equipmentPrice").value = "";
		document.getElementById("equipmentQuantity").value = "";
	}

}











