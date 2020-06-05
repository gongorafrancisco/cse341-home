//Code to make an GET Request using AJAX
let contacts, addresses;
let selectCtm = document.querySelector('#customerNo');
let selectCon = document.querySelector('#contactNo');
let selectAdd = document.querySelector('#addressNo');

selectCtm.addEventListener("change", showOptions);

function showOptions(event) {
    if (event.target.value == "") {
        selectCon.innerHTML = "<option value=''>Select a Contact</option>";
    } else {
        $.getJSON("/sf-contacts", {action: "filterContacts", customerNo: event.target.value}, contactsOptionsBuilder);
        $.getJSON("/sf-addresses", {action: "filterAddresses", customerNo: event.target.value}, addressesOptionsBuilder);
    }
}

function contactsOptionsBuilder(json) {
    contacts = Object.create(json);
    for (const key in contacts) {
        let optionEl = document.createElement('option');
        let optText = document.createTextNode(contacts[key].contact_name);
        optionEl.appendChild(optText);
        optionEl.value = contacts[key].contact_id;
        selectCon.appendChild(optionEl);
    }
}

function addressesOptionsBuilder(json) {
    addresses = Object.create(json);
    for (const key in addresses) {
        let optionEl = document.createElement('option');
        let optText = document.createTextNode(addresses[key].customer_address);
        optionEl.appendChild(optText);
        optionEl.value = addresses[key].address_id;
        selectAdd.appendChild(optionEl);
    }
}