document.addEventListener('DOMContentLoaded', function () {
    const planButtons = document.querySelectorAll('.choose-btn');
    const planCards = document.querySelectorAll('.plan-card');

    planButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Remove 'active' class from all plan cards and buttons
            planCards.forEach(card => {
                card.classList.remove('active');
                const cardHeader = card.querySelector('h3');
                const cardPrice = card.querySelector('span');
                const cardDescription = card.querySelector('p');

                if (cardHeader) cardHeader.style.color = '';
                if (cardPrice) cardPrice.style.color = '';
                if (cardDescription) cardDescription.style.color = '';
            });

            planButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.color = ''; // Reset text color
            });

            // Add 'active' class to the clicked plan card and button
            const planCard = this.closest('.plan-card'); // Get the parent plan card
            planCard.classList.add('active');
            planCard.style.color = 'white'; // Change text color to white

            const planHeader = planCard.querySelector('h3');
            const planPrice = planCard.querySelector('span');
            const planDescription = planCard.querySelector('p');

            if (planHeader) planHeader.style.color = 'white';
            if (planPrice) planPrice.style.color = 'white';
            if (planDescription) planDescription.style.color = 'white';

            // Change button's background to green (active button style)
            this.classList.add('active');
            this.style.color = 'white'; // Change button text color to white

            const selectedPlan = planCard.id.replace('-plan', ''); 
            document.getElementById('selected-plan').value = selectedPlan;
        });
    });
});