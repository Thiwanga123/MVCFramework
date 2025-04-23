<div class="booking">
    <h2>Guider Booking</h2>
    <div class="div">
        <div class="left">
            <div class="cal">
                <?php 
                if (!defined('APPROOT')) {
                    define('APPROOT', dirname(dirname(dirname(__FILE__))));
                }

                include_once APPROOT . '/views/inc/components/calendar.php'; ?> 
            </div>
        </div>
    
        <div class="right">
            <div class="booking-form">
                <form action="<?php echo URLROOT; ?>/booking/addGuiderBooking" method="POST" class="bookingForm" id="bookingForm">
    
                 
                    <input type="hidden" name="supplier_id" value="<?php echo htmlspecialchars($guiders->id); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($guiders->base_rate); ?>">
                    <input type="hidden" name="pickup_lat" id="pickup_lat">
                    <input type="hidden" name="pickup_lng" id="pickup_lng">
              

                    <div class="input">
                        <div class="start">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="booking_start_date" name="booking_start_date" required onchange="validateDates()">
                        </div>
                        <div class="end">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="booking_end_date" name="booking_end_date" required onchange="validateDates()">
                        </div>
                        <script>
                            const unavailableDates = <?php echo json_encode($data['unavailabale']); ?>;
                            const bookings = <?php echo $data['bookings']; ?>;

                            function validateDates() {
                                const startDate = new Date(document.getElementById('booking_start_date').value);
                                const endDate = new Date(document.getElementById('booking_end_date').value);
                                const errorMessageContainer = document.getElementById('errorMessageContainer');

                                errorMessageContainer.style.display = 'none';
                                errorMessageContainer.innerHTML = '';

                                if (startDate && endDate) {
                                    if (startDate > endDate) {
                                        showErrorMessage('Start date cannot be after end date.');
                                        return;
                                    }

                                    for (const date of unavailableDates) {
                                        const unavailableDate = new Date(date);
                                        if (startDate <= unavailableDate && unavailableDate <= endDate) {
                                            showErrorMessage('Selected dates overlap with unavailable dates.');
                                            return;
                                        }
                                    }

                                    for (const booking of bookings) {
                                        const checkIn = new Date(booking.check_in);
                                        const checkOut = new Date(booking.check_out);
                                        if (
                                            (startDate >= checkIn && startDate <= checkOut) ||
                                            (endDate >= checkIn && endDate <= checkOut) ||
                                            (startDate <= checkIn && endDate >= checkOut)
                                        ) {
                                            showErrorMessage('Selected dates overlap with existing bookings.');
                                            return;
                                        }
                                    }
                                    
                                    // Calculate total days and price when dates are valid
                                    calculateTotalPrice();
                                }
                            }

                            function showErrorMessage(message) {
                                const errorMessageContainer = document.getElementById('errorMessageContainer');
                                errorMessageContainer.style.display = 'block';
                                errorMessageContainer.innerHTML = `<p>${message}</p>`;
                            }
                        </script>
                    </div>
                    <div class="pickup-location-container" style="margin-top: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #f9f9f9;">
                        <label for="pickupLocation" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Pickup Location:</label>
                        <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Enter Pickup Location" 
                               style="width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;" 
                               onfocus="initAutocomplete('pickupLocation')">

                        <label for="tripDestination" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">Trip Destination:</label>
                        <input type="text" id="tripDestination" name="tripDestination" placeholder="Enter Trip Destination" 
                               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;" 
                               onfocus="initAutocomplete('tripDestination')">
                    </div>

                    <script>
                        let autocompletePickup, autocompleteDestination;

                        function initAutocomplete(inputId) {
                            const input = document.getElementById(inputId);
                            const options = {
                                types: ['geocode'],
                                componentRestrictions: { country: "us" }
                            };

                            if (inputId === 'pickupLocation') {
                                autocompletePickup = new google.maps.places.Autocomplete(input, options);
                                autocompletePickup.addListener('place_changed', () => {
                                    const place = autocompletePickup.getPlace();
                                    document.getElementById('pickup_lat').value = place.geometry.location.lat();
                                    document.getElementById('pickup_lng').value = place.geometry.location.lng();
                                });
                            } else if (inputId === 'tripDestination') {
                                autocompleteDestination = new google.maps.places.Autocomplete(input, options);
                            }
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&libraries=places"></script>
                    <div class="totalPriceContainer" id="totalPriceContainer" style="display: none;">
                        <p>Total Days: <span id="totalDays"></span></p>
                        <p>Total Price: <span id="totalPrice"></span></p>
                    </div>
                    <div class="errorMessageContainer" id="errorMessageContainer" style="display: none;"></div>
                    <div class="cont">
                        <button type="submit" id="booknow">Book Now</button>
                    </div>

                    <input type="hidden" name="days" id="days">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Existing Modals -->
<div id="responseSuccessModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button" id="closeSuccessModal">&times;</span>
        <img src="<?php echo URLROOT;?>/Images/1930264_check_complete_done_green_success_icon.png" alt="">
        <p id="successModalMessage"></p>
    </div>
</div>

<div id="responseErrorModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-button" id="closeErrorModal">&times;</span>
        <img src="<?php echo URLROOT;?>/Images/warning.png" alt="">
        <p id="errorModalMessage"></p>
    </div>
</div>

<div id="pickupMapModal" class="modal" style="display: none;">
    <div class="modal-content" style="width: 90%; max-width: 600px;">
        <span class="close-button" onclick="closePickupMap()">&times;</span>
        <h3>Select Pickup Location</h3>
        <div id="googleMap" style="height: 400px;"></div>
        <button onclick="confirmPickupLocation()">Confirm Location</button>
    </div>
</div>

<!-- New Order Summary Modal with enhanced styling -->
<div id="orderSummaryModal" class="modal" style="display: none;">
    <div class="modal-content" style="width: 90%; max-width: 600px; border-radius: 10px; border-top: 5px solid #4CAF50; box-shadow: 0 5px 15px rgba(0,0,0,0.2);">
        <span class="close-button" id="closeOrderSummaryModal">&times;</span>
        <h3 style="text-align: center; color: #4CAF50; margin-bottom: 20px; font-size: 24px; border-bottom: 1px solid #eee; padding-bottom: 15px;">Booking Summary</h3>
        <div id="orderSummaryDetails" style="background-color: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <!-- Order summary details will be populated here -->
        </div>
        <div style="margin-top: 20px; display: flex; justify-content: space-between;">
            <button type="button" id="cancelBooking" class="btn" style="padding: 10px 20px; background-color: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: all 0.3s;">Cancel</button>
            <button type="button" id="proceedToPayment" class="btn" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; transition: all 0.3s;">Proceed to Payment</button>
        </div>
    </div>
</div>

<!-- CSS for modals with improved styling -->
<style>
    .modal {
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: none;
        animation: fadeIn 0.3s;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        position: relative;
        width: 80%;
        max-width: 500px;
        animation: slideIn 0.4s;
    }
    
    @keyframes slideIn {
        from { transform: translateY(-50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    
    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        color: #888;
        transition: color 0.3s;
    }
    
    .close-button:hover {
        color: #333;
    }
    
    #orderSummaryDetails p {
        margin: 8px 0;
        padding: 8px 0;
        border-bottom: 1px dashed #ddd;
    }
    
    #orderSummaryDetails p:last-child {
        border-bottom: none;
    }
    
    .btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    .btn:active {
        transform: translateY(0);
        box-shadow: none;
    }
    
    .totalPriceContainer {
        margin-top: 15px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 5px;
        border: 1px solid #dee2e6;
    }
    
    .highlight {
        background-color: #e8f5e9;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        color: #2e7d32;
    }
</style>

<!-- Updated JavaScript for enhanced order summary modal and PayHere integration -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the form and modal elements
        const bookingForm = document.getElementById('bookingForm');
        const orderSummaryModal = document.getElementById('orderSummaryModal');
        const closeOrderSummaryModal = document.getElementById('closeOrderSummaryModal');
        const cancelBooking = document.getElementById('cancelBooking');
        const proceedToPayment = document.getElementById('proceedToPayment');
        const orderSummaryDetails = document.getElementById('orderSummaryDetails');
        
        // Get date input elements
        const startDateInput = document.getElementById('booking_start_date');
        const endDateInput = document.getElementById('booking_end_date');
        const totalDaysSpan = document.getElementById('totalDays');
        const totalPriceSpan = document.getElementById('totalPrice');
        const totalPriceContainer = document.getElementById('totalPriceContainer');
        const daysHiddenInput = document.getElementById('days');
        
        // Create variables to store booking data for payment
        let bookingTotal = 0;
        let bookingDays = 0;
        
        // Add event listener to the form
        bookingForm.addEventListener('submit', function(event) {
            // Prevent the form from submitting
            event.preventDefault();
            
            // Get form data for summary
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const pickupLocation = document.getElementById('pickupLocation').value;
            const tripDestination = document.getElementById('tripDestination').value;
            
            // Check if required fields are filled
            if (!startDateInput.value || !endDateInput.value || !pickupLocation || !tripDestination) {
                showErrorMessage('Please fill in all required fields');
                return;
            }
            
            // Format dates nicely
            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const formattedStartDate = startDate.toLocaleDateString('en-US', dateOptions);
            const formattedEndDate = endDate.toLocaleDateString('en-US', dateOptions);
            
            // Get the calculated values
            const calculationResult = calculateTotalPrice();
            if (!calculationResult) return;
            
            bookingDays = calculationResult.days;
            bookingTotal = calculationResult.price;
            const baseRate = parseFloat(document.querySelector('input[name="price"]').value);
            
            // Create the summary HTML with improved formatting
            let summaryHTML = `
                <div style="padding: 0 10px;">
                    <p style="display: flex; justify-content: space-between;">
                        <span><i class="fas fa-calendar-check"></i> <strong>From:</strong></span> 
                        <span>${formattedStartDate}</span>
                    </p>
                    <p style="display: flex; justify-content: space-between;">
                        <span><i class="fas fa-calendar-times"></i> <strong>To:</strong></span> 
                        <span>${formattedEndDate}</span>
                    </p>
                    <p style="display: flex; justify-content: space-between;">
                        <span><i class="fas fa-map-marker-alt"></i> <strong>Pickup:</strong></span> 
                        <span>${pickupLocation}</span>
                    </p>
                    <p style="display: flex; justify-content: space-between;">
                        <span><i class="fas fa-map-signs"></i> <strong>Destination:</strong></span> 
                        <span>${tripDestination}</span>
                    </p>
                    <p style="display: flex; justify-content: space-between;">
                        <span><i class="fas fa-clock"></i> <strong>Duration:</strong></span> 
                        <span>${bookingDays} day${bookingDays > 1 ? 's' : ''}</span>
                    </p>
                    <p style="display: flex; justify-content: space-between;">
                        <span><i class="fas fa-tag"></i> <strong>Rate per day:</strong></span> 
                        <span>Rs ${baseRate.toFixed(2)}</span>
                    </p>
                </div>
                <div class="highlight" style="margin-top: 15px; text-align: center;">
                    <p style="font-size: 18px; margin: 5px 0; display: flex; justify-content: space-between;">
                        <strong>Total Amount:</strong> 
                        <span style="font-size: 20px; color: #2e7d32;">Rs ${bookingTotal.toFixed(2)}</span>
                    </p>
                </div>
            `;
            
            // Update the modal content
            orderSummaryDetails.innerHTML = summaryHTML;
            
            // Show the modal with animation
            orderSummaryModal.style.display = 'block';
        });
        
        // Close modal when clicking the close button
        closeOrderSummaryModal.addEventListener('click', function() {
            orderSummaryModal.style.display = 'none';
        });
        
        // Close modal when clicking the Cancel button
        cancelBooking.addEventListener('click', function() {
            orderSummaryModal.style.display = 'none';
        });
        
        // Process payment when clicking Proceed to Payment
        proceedToPayment.addEventListener('click', function() {
            // Hide the modal
            orderSummaryModal.style.display = 'none';
            
            // Generate a unique order ID
            const orderId = 'ORDER' + Date.now() + Math.floor(Math.random() * 9000 + 1000);
            
            // Get customer information from the form and session
            const supplierId = document.querySelector('input[name="supplier_id"]').value;
            const pickupLocation = document.getElementById('pickupLocation').value;
            const tripDestination = document.getElementById('tripDestination').value;
            
            // Calculate hash on server side and pass to client
            <?php
                $merchant_id = '1229635';
                $merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';
                // Note: We'll use JavaScript variables in PHP with output buffering
                echo "const amount = bookingTotal.toFixed(2);";
                echo "const currency = 'LKR';";
                echo "const merchant_id = '$merchant_id';";
                
                // We can't calculate the hash here directly as the order_id and amount 
                // are generated in JavaScript at runtime
            ?>
            
            // We need to make an AJAX request to generate the hash
            fetch('<?php echo URLROOT; ?>/booking/generateHash', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    order_id: orderId,
                    amount: bookingTotal.toFixed(2),
                    currency: 'LKR'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Start the PayHere payment process if the script is loaded
                    if (typeof payhere !== 'undefined') {
                        // Configure the payment with the hash
                        var payment = {
                            "sandbox": true,
                            "merchant_id": merchant_id,
                            "return_url": "<?php echo URLROOT; ?>/booking/success",
                            "cancel_url": "<?php echo URLROOT; ?>/booking/cancel",
                            "notify_url": "<?php echo URLROOT; ?>/booking/notify",
                            "order_id": orderId,
                            "items": "Guider Booking",
                            "amount": bookingTotal.toFixed(2),
                            "currency": "LKR",
                            "hash": data.hash,
                            "first_name": "<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Customer'; ?>",
                            "last_name": "",
                            "email": "<?php echo isset($_SESSION['user_email']) ? $_SESSION['user_email'] : ''; ?>",
                            "phone": "",
                            "address": pickupLocation,
                            "city": "",
                            "country": "Sri Lanka",
                            "delivery_address": tripDestination,
                            "delivery_city": "",
                            "delivery_country": "Sri Lanka"
                        };
                        
                        // Create hidden input fields for the booking submission
                        addHiddenField('order_id', orderId);
                        addHiddenField('amount', bookingTotal.toFixed(2));
                        
                        // Start the payment process
                        payhere.startPayment(payment);
                    } else {
                        alert("Payment gateway not available. Please try again later.");
                        // Fallback to regular form submission if payment gateway is not available
                        bookingForm.submit();
                    }
                } else {
                    alert("Error generating payment information. Please try again.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Error connecting to the server. Please try again later.");
            });
        });
        
        // Function to add hidden fields to the form
        function addHiddenField(name, value) {
            // Check if field already exists
            let field = bookingForm.querySelector('input[name="' + name + '"]');
            if (!field) {
                // Create new field if it doesn't exist
                field = document.createElement('input');
                field.type = 'hidden';
                field.name = name;
                bookingForm.appendChild(field);
            }
            // Set the value
            field.value = value;
        }
        
        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target == orderSummaryModal) {
                orderSummaryModal.style.display = 'none';
            }
        });
        
        // Add hover effects for buttons
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('mouseover', function() {
                this.style.opacity = '0.9';
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
            });
            
            button.addEventListener('mouseout', function() {
                this.style.opacity = '1';
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
        
        // Initialize calculation if dates are already set
        if (startDateInput.value && endDateInput.value) {
            calculateTotalPrice();
        }
    });
    
    // Function to calculate days and total price
    function calculateTotalPrice() {
        const startDate = new Date(document.getElementById('booking_start_date').value);
        const endDate = new Date(document.getElementById('booking_end_date').value);
        const baseRate = parseFloat(document.querySelector('input[name="price"]').value);
        
        // Check if both dates are valid
        if (startDate && endDate && startDate <= endDate) {
            // Calculate the difference in days
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            // Calculate total price
            const totalPrice = diffDays * baseRate;
        
            
            // Update the display
            document.getElementById('totalDays').textContent = diffDays;
            document.getElementById('totalPrice').textContent = 'Rs' + totalPrice.toFixed(2);
            document.getElementById('totalPriceContainer').style.display = 'block';
            
            // Update hidden input for form submission
            document.getElementById('days').value = diffDays;
            
            return {
                days: diffDays,
                price: totalPrice
            };
        }
        
        return null;
    }
</script>

<?php 
// Set up merchant details - kept in PHP for security
$merchant_id = '1229635';
$merchant_secret = 'MzgwMDgyNjc2ODIwOTcyNzYwNjExODUyODIzOTYyNzY3NTk4ODY5';
?>

<script>
    // Load the PayHere script
    window.addEventListener('load', function() {
        var script = document.createElement('script');
        script.src = 'https://www.payhere.lk/lib/payhere.js';
        script.onload = function() {
            console.log("PayHere script loaded successfully");
            
            // Payment completed handler
            payhere.onCompleted = function onCompleted(orderId) {
                alert("Payment completed. Order ID: " + orderId);
                
                // Submit the form after successful payment
                document.getElementById('bookingForm').submit();
            };
            
            // Payment dismissed handler
            payhere.onDismissed = function onDismissed() {
                alert("Payment cancelled.");
            };
            
            // Payment error handler
            payhere.onError = function onError(error) {
                alert("Error occurred: " + error);
            };
        };
        
        script.onerror = function() {
            console.error('Failed to load payment gateway.');
            alert('Failed to load payment gateway. Please try again later.');
        };
        
        document.body.appendChild(script);
    });
</script>
<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
