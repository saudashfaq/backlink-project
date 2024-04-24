$(document).ready(function() {
    $('#navbarDropdown').on('click', function() {
        // Toggle the visibility of the create website button
        $('.create-website-btn').toggle();

        // Move down other sidebar links when dropdown is opened
        $('.navbar-nav .nav-item:not(.dropdown)').toggleClass('move-down');
    });
});

// Hide the splash screen after 3 seconds
setTimeout(function() {
    document.querySelector('.splash').style.display = 'none';
}, 3000);

// JavaScript to handle modal functionality
document.getElementById('addToCartBtn').onclick = function() {
    document.getElementById('instructionModal').style.display = 'block';
  };
  
  document.getElementsByClassName('close')[0].onclick = function() {
    document.getElementById('instructionModal').style.display = 'none';
  };
  
  document.getElementById('instructionForm').onsubmit = function(event) {
    event.preventDefault();
    let link = document.getElementById('link').value;
    let keyPhrase = document.getElementById('keyPhrase').value;
    // Perform any necessary actions, such as adding the item to the cart
    // You can use AJAX to send the data to the server
    console.log('Link:', link);
    console.log('Key Phrase:', keyPhrase);
    // Close the modal
    document.getElementById('instructionModal').style.display = 'none';
  };
  