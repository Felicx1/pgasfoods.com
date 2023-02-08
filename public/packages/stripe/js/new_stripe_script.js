// A reference to Stripe.js
var stripe;

var orderData = {
    items: [{ id: "photo-subscription" }],
    currency: "gbp",
    country: 'UK'
};

// Disable the button until we have Stripe set up on the page
document.querySelector("button").disabled = true;

let path = document.querySelector('#payment-form')
let csrf = document.querySelector('meta[name="csrf-token"]');

// console.log(path.getAttribute('data-action'));
let _path = path.getAttribute('data-action');
let base_path = path.getAttribute('data-action-verify');
let _csrf = csrf.getAttribute('content');
console.log(_path)

fetch(_path, {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        'X-CSRF-TOKEN': _csrf
    },
    body: JSON.stringify(orderData)
})
    .then(function(result) {
        return result.json();
    })
    .then(function(data) {
        return setupElements(data);
    })
    .then(function({ stripe, payment, clientSecret }) {
        document.querySelector("button").disabled = false;

        // Handle form submission.
        var form = document.getElementById("payment-form");
        form.addEventListener("submit", handleSubmit);
    });

var elements;

checkStatus();

// Set up Stripe.js and Elements to use in checkout form
var setupElements = function(data) {
    stripe = Stripe(data.publishableKey);
    const options = {
        clientSecret: data.clientSecret,
        appearance: {/*...*/},
    };

    // Set up Stripe.js and Elements to use in checkout form, passing the client secret obtained in step 2
    elements = stripe.elements(options);

    // Create and mount the Payment Element
    const card = elements.create('payment');
    card.mount('#payment-element');

    return {
        stripe: stripe,
        payment: card,
        clientSecret: data.clientSecret
    };
};

/*
 * Calls stripe.confirmCardPayment which creates a pop-up modal to
 * prompt the user to enter extra authentication details without leaving your page
 */
async function handleSubmit(e) {
    e.preventDefault();
    setLoading(true);

    const { error } = await stripe.confirmPayment({
        elements,
        confirmParams: {
            // Make sure to change this to your payment completion page
            return_url: base_path,
        },
    });

    // This point will only be reached if there is an immediate error when
    // confirming the payment. Otherwise, your customer will be redirected to
    // your `return_url`. For some payment methods like iDEAL, your customer will
    // be redirected to an intermediate site first to authorize the payment, then
    // redirected to the `return_url`.
    if (error.type === "card_error" || error.type === "validation_error") {
        showMessage(error.message);
    } else {
        showMessage("An unexpected error occured.");
    }

    setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
    const clientSecret = new URLSearchParams(window.location.search).get(
        "payment_intent_client_secret"
    );

    if (!clientSecret) {
        return;
    }

    const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

    switch (paymentIntent.status) {
        case "succeeded":
            showMessage("Payment succeeded!");
            break;
        case "processing":
            showMessage("Your payment is processing.");
            break;
        case "requires_payment_method":
            showMessage("Your payment was not successful, please try again.");
            break;
        default:
            showMessage("Something went wrong.");
            break;
    }
}

// Show a spinner on payment submission
function setLoading(isLoading) {
    if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector("#submit").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
    } else {
        document.querySelector("#submit").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
    }
}

function showMessage(messageText) {
    const messageContainer = document.querySelector("#payment-message");

    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;

    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 4000);
}


