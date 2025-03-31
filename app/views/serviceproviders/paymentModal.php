<div id="paymentModalContainer" class="paymentModal">
    <div class="wrapper">
        <h2>Payment Required</h2>
        <p>You have selected the <span id="selected-plan-name"></span> plan. Please enter your payment details to complete your registration.</p>

        <!-- Payment Form -->
        <form id="payment-form">
            <div id="card-element"></div> <!-- This is where the Stripe card input will appear -->
            <button id="submit-button" type="submit">Pay Now</button>
        </form>

        <!-- Cancel Button -->
        <button id="cancel-button">Cancel</button>
    </div>
</div>
