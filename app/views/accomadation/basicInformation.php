<html>
<head>
    <title>Basic Information</title>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/accomodation/basic.css">
</head>
<body>
    <?php require APPROOT . '/views/inc/components/startheader.php'; ?>
    <div class="container">
        <h1>Basic Information</h1>
        <form>
            <div class="form-group">
                <label for="property-name">Property Name</label>
                <input type="text" id="property-name" name="property-name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="postal-code">Postal Code</label>
                <input type="text" id="postal-code" name="postal-code" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" required>
            <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input type="text" id="Price" name="Price" required>
            </div>
            <div class="form-group">
                <label for="location">Pin the Location of the Property</label>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353153167!3d-37.81627977975171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d1b6b1a0b1b!2sVictoria%20State%20Library!5e0!3m2!1sen!2sau!4v1611811572000!5m2!1sen!2sau" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="form-group">
           <button type="button" onclick="basicinfo()"> Next</button></a>
            </div>
        </form>
    </div>


    <script>
    function basicinfo(){
        const propertyname=document.getElementById('property-name').value;
        const address=document.getElementById('address').value;
        const postalcode=document.getElementById('postal-code').value;
        const city=document.getElementById('city').value;
        const Price=document.getElementById('Price').value;
        // const location=document.getElementById('location').value;
        const startpageData=JSON.parse(localStorage.getItem("startpageData"));
        const basicinfoData={...startpageData,propertyname,address,postalcode,city,Price};
        localStorage.setItem("basicinfoData",JSON.stringify(basicinfoData));
        window.location.href="<?php echo URLROOT;?>/accomadation/propertyinfo";

    }

console.log("Stored data:", JSON.parse(localStorage.getItem("basicinfoData")));
</script>

</body>
</html>