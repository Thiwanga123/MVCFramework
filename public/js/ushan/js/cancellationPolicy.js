document.addEventListener('DOMContentLoaded', function () {

    const cancellationBtns = document.querySelectorAll('.cancellationBtn');

    cancellationBtns.forEach(button => {
            button.addEventListener('click', async function () {
                console.log("clecked");
                await cancellationPolicyCheck(this); 
            });
    }); 
});

async function cancellationPolicyCheck(button){
    const bookinItemId = button.dataset.id;
    const bookingType = button.dataset.type;

    console.log("Booking ID:", bookinItemId);
    console.log("Booking Type:", bookingType);

    try{
        const response = await fetch(`${URLROOT}/booking/policyCheck`,{
            method: "POST",
            headers: {
                'Content-Type' : 'application/json',
            },
            body:JSON.stringify({
                id : bookinItemId,
                type : bookingType
            }),
        });

        const result = await response.json();


    }catch(error){
        console.error("Error:", error);
        alert("There was an error while trying to cancel the booking.");
    }
}