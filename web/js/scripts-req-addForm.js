//Code to make an GET Request using AJAX
let contacts;
let selectCtm = document.querySelector('#customerNo');
let selectCon = document.querySelector('#contactNo');

selectCtm.addEventListener("change", showOptions);

function showOptions(event) {
    if (event.target.value == "") {
        selectCon.innerHTML = "<option value=''>Select a Contact</option>";
    } else {
        $.getJSON("/sf-contacts", {action: "filterContacts", customerNo: event.target.value}, contactsOptionsBuilder);
    }
}

function contactsOptionsBuilder(json) {
    contacts = Object.create(json);
    removeChilds(selectCon);
    for (const key in contacts) {
        let optionEl = document.createElement('option');
        let optText = document.createTextNode(contacts[key].contact_name);
        optionEl.appendChild(optText);
        optionEl.value = contacts[key].contact_id;
        selectCon.appendChild(optionEl);
    }
}

function removeChilds(element){
    while (element.hasChildNodes()) {
        element.removeChild(element.firstChild);
    }
}