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

    if (window.location.pathname.includes('blogs')) {
        tinymce.init({
            selector: 'textarea',
            plugins: ' autolink charmap codesample emoticons image link lists media searchreplace visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Eng Mohamed ELShabrawy',
        });
    }

});
