document.addEventListener('DOMContentLoaded', function() {
    // Attach click event to all view buttons
    document.querySelectorAll('.view-guider-btn').forEach(function(button) {
        button.addEventListener('click', async function() {
        
                const guiderId = this.getAttribute('data-guider-id');
                
                try {
                    const response = await fetch(`${URLROOT}/tour_guides/getGuiderDetails`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ guiderId }) // Send guider ID in request body
                    });
                    const data = await response.json();
                    console.log(data);

                    if (data.success) {
                        fillProfileModal(data.guider);
                        openProfileModal();
                    } else {
                        alert('Failed to load profile details.');
                    }
                } catch (error) {
                    console.error('Error fetching profile details:', error);
                    alert('An error occurred while fetching profile details.');
                }
            });
        });

        // Close the profile modal
        document.getElementById('closeModal').addEventListener('click', function() {
            closeProfileModal();
        });

        // Close modal if clicked outside the modal content
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('profileModal');
            if (event.target == modal) {
                closeProfileModal();
            }
        });
    });

    // Fill modal with guider data
    function fillProfileModal(guider) {
        document.getElementById('profileName').textContent = guider.name || 'N/A';
        document.getElementById('profilePhone').textContent = guider.phone || 'N/A';
        document.getElementById('profileEmail').textContent = guider.email || 'N/A';
        document.getElementById('profileAddress').textContent = guider.address || 'N/A';
        document.getElementById('profileLanguage').textContent = guider.language || 'N/A';
        document.getElementById('profileExperience').textContent = guider.years_experience || '0';
        document.getElementById('profileSpecializations').textContent = guider.specializations || 'N/A';
        document.getElementById('profileServices').textContent = guider.services || 'N/A';
        
        const profileImage = document.getElementById('profileImage');
        if (guider.profile_path) {
            profileImage.src = guider.profile_path;
            profileImage.style.display = 'block';
        } else {
            profileImage.style.display = 'none';
        }
    }

    // Open modal
    function openProfileModal() {
        document.getElementById('profileModal').style.display = 'flex';
    }

    // Close modal
    function closeProfileModal() {
        document.getElementById('profileModal').style.display = 'none';
    }