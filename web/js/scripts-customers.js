let searchHelpMessage = document.querySelector('#searchHelpMessage');
let selectEl = document.querySelector('#select_options');
selectEl.addEventListener("change", messageBuilder);
function messageBuilder(event) {
    switch (event.target.value) {
        case "0":
            searchHelpMessage.innerHTML = "Type the <strong>customer number</strong> in the search box, e.g. 12. Only numbers allowed."
            break;
        case "1":
            searchHelpMessage.innerHTML = "Type the <strong>company name</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a'."
            break;
        case "2":
            searchHelpMessage.innerHTML = "Type the <strong>TAX ID</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a', maximum of 13 characters."
            break;
        case "3":
            searchHelpMessage.innerHTML = "Type the <strong>customer phone</strong> in the search box.";
            break;
        case "4":
            searchHelpMessage.innerHTML = "Type the <strong>customer email</strong> in the search box.";
            break;
    }
}

