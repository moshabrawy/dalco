$(document).ready(function () {
    "use strict";

    if (window.location.pathname.includes('create')) {
        document.querySelector('#description_ar').value = '';
        document.querySelector('#description_en').value = '';

    } else if (window.location.pathname.includes('edit')) {
        // console.log(desc_ar);
        // desc_ar.value = '';

        // desc_ar = desc_ar.trimStart();

        // desc_en = desc_en.trim();
        // desc_ar = desc_ar.trim();
    }

});
