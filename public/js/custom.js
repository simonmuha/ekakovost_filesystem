// public/js/custom.js

$(document).ready(function() {
    console.log('Script loaded successfully');

    $('body').on('input', 'input.changed-value', function() {
        console.log('Input changed:', this.value);
        console.log('Original value:', $(this).data('original-value'));
        $(this).toggleClass('changed', this.value !== $(this).data('original-value'));
    });
});

$(document).ready(function() {
    $('body').on('input', 'input.changed-value', function() {
        // Dodaj razred 'changed' ob spremembi vsebine v vnosnem polju
        $(this).toggleClass('changed', $(this).val() !== $(this).data('original-value'));
    });
});