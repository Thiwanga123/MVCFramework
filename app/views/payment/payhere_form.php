<script type="text/javascript" src="https://sandbox.payhere.lk/lib/payhere.js"></script>

<button id="payhere-payment">Pay with PayHere</button>

<script>
// Payment completed handler
payhere.onCompleted = function onCompleted(orderId) {
    window.location.href = "/payment/success?order_id=" + orderId;
};

// Payment dismissed handler
payhere.onDismissed = function onDismissed() {
    alert("Payment cancelled!");
    window.location.href = "/payment/failed";
};

// Payment error handler
payhere.onError = function onError(error) {
    alert("Error occurred: " + error);
    window.location.href = "/payment/failed";
};

// Function to fetch payment hash from backend
async function fetchPaymentHash() {
    const response = await fetch('/payment/getHash', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ order_id: 'ORDER123', amount: 1000 })
    });
    const data = await response.json();
    return data.hash;
}

// Pay button click handler
document.getElementById('payhere-payment').onclick = async function () {
    const hash = await fetchPaymentHash();

    var payment = {
        "sandbox": true,
        "merchant_id": "YOUR_MERCHANT_ID",
        "return_url": "https://yourdomain.com/payment/success",
        "cancel_url": "https://yourdomain.com/payment/failed",
        "notify_url": "https://yourdomain.com/payment/notify",
        "order_id": "ORDER123",
        "items": "Test Item",
        "amount": "1000.00",
        "currency": "LKR",
        "hash": hash,
        "first_name": "John",
        "last_name": "Doe",
        "email": "john@example.com",
        "phone": "0712345678",
        "address": "123, Test Road",
        "city": "Colombo",
        "country": "Sri Lanka"
    };

    payhere.startPayment(payment);
};
</script>
