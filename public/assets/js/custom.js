$(document).ready(function () {
    "use strict";

    if (window.location.pathname.includes('create')) {
        document.querySelector('#create #description_en').value = '';
        document.querySelector('#create #description_ar').value = '';
    } else {
        console.log(window.location.pathname);
    }

});
