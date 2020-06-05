/* let searchHelpMessage = document.querySelector('#searchHelpMessage');
selectEl.addEventListener("change", messageBuilder); */

function messageBuilder(event) {
    switch (event.target.value) {
        case "0":
            searchHelpMessage.innerHTML = "Type the <strong>request number</strong> in the search box, e.g. 12. Only numbers allowed.";
            break;
        case "1":
            searchHelpMessage.innerHTML = "Type the <strong>request date</strong> in the search box in the following format: DD-MM-YYYY (e.g. 01-06-2020), only numbers and dashes allowed.";
            break;
        case "2":
            searchHelpMessage.innerHTML = "Type the <strong>company name</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a'.";
            break;
        case "3":
            searchHelpMessage.innerHTML = "Type the <strong>contact name</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a'.";
            break;
        case "4":
            searchHelpMessage.innerHTML = "Type the request details or <strong>keywords</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a'.";
            break;
        case "5":
            searchHelpMessage.innerHTML = "Type the <strong>request status</strong> date in the search box, you should use boolean keywords like Yes or TRUE for completed requests, No or FALSE for incomplete requests.";
            break;
        case "6":
            searchHelpMessage.innerHTML = "Type the <strong>request delivery date</strong> in the search box in the following format: DD-MM-YYYY (e.g. 01-06-2020), only numbers and dashes allowed.";
            break;
    }
}

//Code to make an GET Request using AJAX
let contacts, addresses;
let selectEl = document.querySelector('#select_options');
let selectCtm = document.querySelector('#customerNo');
let selectCon = document.querySelector('#contactNo');
let selectAdd = document.querySelector('#addressOption');

selectCtm.addEventListener("change", showOptions);

function showOptions(event) {
    if (event.target.value == "") {
        selectCon.innerHTML = "<option value=''>Select a Contact</option>";
    } else {
        $.getJSON(
            "/sf-contacts", 
            {   action: "filterContacts", customerNo: event.target.value }, 
            customerOptionsBuilder);
    }
}

function customerOptionsBuilder(json) {
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
        let optText = document.createTextNode(contacts[key].customer_address);
        optionEl.appendChild(optText);
        optionEl.value = contacts[key].contact_id;
        selectCon.appendChild(optionEl);
    }
}



