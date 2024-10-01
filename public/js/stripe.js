document.addEventListener('DOMContentLoaded', function() {
    var stripe = Stripe('pk_test_51PRArl2MenpTsrhTksR0SAs4YiPw1ILaqEOJvyK4wisLpgoSBHTHRXvqfC9GUqNbJTPWmyK8OzuEkPu57LfMnqYY00PgKqeUH2');

    var checkoutButton = document.getElementById('placeOrder');

    checkoutButton.addEventListener('click', function(event) {
        event.preventDefault();

        var form = document.getElementById('payment-form');
        var formData = new FormData(form);
        var data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => {
                return stripe.redirectToCheckout({ sessionId: data.sessionId });
            })
            .then(result => {
                if (result.error) {
                    console.error('Redirect to Checkout failed:', result.error.message);
                    alert(result.error.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
