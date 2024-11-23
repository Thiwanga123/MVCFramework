<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/mainpages/features.css">
    <title>Features Page</title>

</head>

<?php require APPROOT . '/views/inc/components/navigationbar.php'; ?>

<main>
        <section id="Hero" class="Hero">
            <div class="hero-content">
                <h1>Features of Journey Beyond</h1>
                <p>Your adventure starts here. Explore our features and discover new experiences.</p>
            </div>
         </section>

        
        <section id = "features" class="features">

        <div class="container1">
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/Destination highlight.jpg" alt="Destination Highlights">
            <h3>Destination Highlights</h3>
            <p>Explore popular destinations in Sri Lanka with detailed guides and stunning visuals.</p>
        </div>
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/itinerary.jpg" alt="Itinerary ">
            <h3>Custom Itinerary Planner</h3>
            <p>Create personalized travel itineraries based on your preferences and budget.</p>
        </div>
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/Accomadation.jpg" alt="Accommodation ">
            <h3>Accommodation Booking</h3>
            <p>Search and book accommodations directly from our website with ease.</p>
        </div>
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/Transport.jpeg" alt="Transportation ">
            <h3>Transportation Options</h3>
            <p>Find information on  trains, buses, and car rentals to plan your travel.</p>
        </div>
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/local experience.jpeg" alt="Local Experiences">
            <h3>Local Experiences</h3>
            <p>Discover local tours, activities, and experiences to enrich your trip.</p>
        </div>
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/review.jpeg" alt="Reviews">
            <h3>User Reviews</h3>
            <p>Read reviews and ratings from other travelers to make informed decisions.</p>
        </div>
        <!-- <div class="feature">
            <img src="C:\Users\USER\Downloads\Features\images\map.jpg"alt="Interactive Maps">
            <h3>Interactive Maps</h3>
            <p>Use our maps to find key attractions, accommodations, and transportation hubs.</p>
        </div> -->
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/weather updates.jpeg" alt="Weather Updates">
            <h3>Weather Updates</h3>
            <p>Get real-time weather updates for different regions in Sri Lanka.</p>
        </div>
        <div class="feature">
            <img src="<?php echo URLROOT;?>/images/Customer Support.jpeg"alt="Customer Support">
            <h3>Customer Support</h3>
            <p>Get help with FAQs, contact forms</p>
        </div>
              
            </div>

        </section>


    </main>



<?php require APPROOT . '/views/inc/components/footer.php'; ?>

