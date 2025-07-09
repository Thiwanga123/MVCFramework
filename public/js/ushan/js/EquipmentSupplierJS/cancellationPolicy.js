document.addEventListener('DOMContentLoaded', () => {
    const cancelLinks = document.querySelectorAll('.cancel-link');

    cancelLinks.forEach(link => {
        link.addEventListener('click', async (e) => {
            e.preventDefault();

            const confirmed = confirm('Are you sure you want to cancel this booking? Penalties may apply.');
            if (!confirmed) return;

            const url = link.getAttribute('href');
            const bookingId = url.split('/').pop();

            try{
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ 
                        booking_id: bookingId 
                    })
                });

                const data = await response.text();
                console.log(data);

                // const data = await response.json();

                if(data.succcess){
                    alert('Booking cancelled successfully.');
                    location.reload();
                }else {
                    alert(data.message || 'Cancellation failed.');
                }
                
            }catch (error) {
                console.error('Cancellation error:', error);
                alert('Something went wrong.');
            }
        });
    });
})