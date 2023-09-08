$(document).ready(function() {
    $('button[id^="viewProperty"]').on('click', function() {
        // Get the property ID from the button's data attribute
        var propertyId = $(this).data('property-id');

        // Fetch the data for the specific property via an AJAX request
        $.ajax({
            url: 'http://estate-management-system.test/admin/property' + propertyId, // Replace with your actual API endpoint
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Populate the modal with dynamic content
                $('#exampleModal' + propertyId + ' .modal-title').text(data.title);
                $('#exampleModal' + propertyId + ' .modal-body').html(data.description); // Adjust the HTML structure as needed

                // Show the modal
                $('#exampleModal' + propertyId).modal('show');
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});
