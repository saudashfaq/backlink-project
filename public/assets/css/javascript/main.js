$(document).ready(function() {
    $('#navbarDropdown').on('click', function() {
        // Toggle the visibility of the create website button
        $('.create-website-btn').toggle();

        // Move down other sidebar links when dropdown is opened
        $('.navbar-nav .nav-item:not(.dropdown)').toggleClass('move-down');
    });
});
