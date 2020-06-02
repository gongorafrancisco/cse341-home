// Declare a variable that later will hold and object with the AJAX response
let contacts;

// Get the Company <select> element from the DOM
let selectCtm = document.querySelector('#customerNo');

// Get the Customer <select> element from the DOM
let selectCon = document.querySelector('#contactNo');

// Attach an event listener to the Company <select> to fire the showContacts function
selectCtm.addEventListener("change", showContacts);

// Function to sent an jQuery AJAX request and call the customerOptionsBuilder function
function showContacts(event) {
    if (event.target.value == "") {
        selectCon.innerHTML = "<option value=''>Select a Contact</option>";
    } else {
        $.getJSON(
            "/sf-contacts", 
            {   action: "filterContacts", customerNo: event.target.value }, 
            customerOptionsBuilder);
    }
}

// Function to create and object from the AJAX response and iterate over the newly
// created object by using a for in loop and create additional <option> elements
// with values from the contacts object.
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
