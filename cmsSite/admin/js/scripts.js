// Initialize Summernote
$(document).ready(function () {
    $('#summernote').summernote();
});

// Selects all checkboxes if the checkbox with the 'selectAllBoxes' checkbox is checked.
$(document).ready(function () {

    $('#selectAllBoxes').click(function () {

        if (this.checked) {
            $('.checkBoxes').each(function () {
                this.checked = true;
            });

        } else {
            $('.checkBoxes').each(function () {
                this.checked = false;
            });
        }

    });

});