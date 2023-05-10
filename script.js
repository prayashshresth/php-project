var selectedRow = null

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
        updatelocal();
    }
}

function readFormData() {
    var formData = {};
    formData["stdid"] = document.getElementById("stdid").value;
    formData["fullname"] = document.getElementById("fullname").value;
    formData["class"] = document.getElementById("class").value;
    formData["address"] = document.getElementById("address").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("stdList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.stdid;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.fullname;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.class;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.address;
    cell5 = newRow.insertCell(4);
    cell5.innerHTML = `<button onClick="onEdit(this)">Edit</button>
                       <button onClick="onDelete(this)">Delete</button>`;
    console.log(cell1);
}

function resetForm() {
    document.getElementById("stdid").value = "";
    document.getElementById("fullname").value = "";
    document.getElementById("class").value = "";
    document.getElementById("address").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("stdid").value = selectedRow.cells[0].innerHTML;
    document.getElementById("fullname").value = selectedRow.cells[1].innerHTML;
    document.getElementById("class").value = selectedRow.cells[2].innerHTML;
    document.getElementById("address").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.stdid;
    selectedRow.cells[1].innerHTML = formData.fullname;
    selectedRow.cells[2].innerHTML = formData.class;
    selectedRow.cells[3].innerHTML = formData.address;
}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("stdList").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;
    if (document.getElementById("fullname").value == "") {
        isValid = false;
        document.getElementById("fullNameValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("fullNameValidationError").classList.contains("hide"))
            document.getElementById("fullNameValidationError").classList.add("hide");
    }
    return isValid;
}

function updatelocal(){
    localStorage.setItem("records", document.querySelector("#tbd").innerHTML)
}

window.onload = () => {
    if (!localStorage.getItem("records")){
        localStorage.setItem("records", "")
    }else{
        document.querySelector("#tbd").innerHTML = localStorage.getItem("records")
    }
}
