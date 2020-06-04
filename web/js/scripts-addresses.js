let searchHelpMessage = document.querySelector('#searchHelpMessage');
let selectEl = document.querySelector('#select_options');
selectEl.addEventListener("change", messageBuilder);
function messageBuilder(event) {
    switch (event.target.value) {
        case "0":
            searchHelpMessage.innerHTML = "Type the <strong>address record number</strong> in the search box, e.g. 12. Only numbers allowed.";
            break;
        case "1":
            searchHelpMessage.innerHTML = "Type the <strong>company name</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a'.";
            break;
        case "2":
            searchHelpMessage.innerHTML = "Type the address details or <strong>keywords</strong> in the search box, remember this is a case sensitive search, meaning 'A' will be treated differently than 'a'.";
            break;
        case "3":
            searchHelpMessage.innerHTML = "Type the <strong>shipping address status</strong> search in the search box, you should use boolean keywords like Yes or TRUE for addresses that are shipping addresses, No or FALSE for addresses that are not shipping addresses.";
            break;
    }
}

