$(document).ready(function () {
    "use strict";

    let desc_en = document.querySelector('#description_en');
    let desc_ar = document.querySelector('#description_ar');

    if (window.location.pathname.includes('create')) {
        desc_en.value = '';
        desc_ar.value = '';
    } else if (window.location.pathname.includes('edit')) {
        desc_en.value = desc_en.value.trim();
        desc_ar.value = desc_ar.value.trim();
    }

});
