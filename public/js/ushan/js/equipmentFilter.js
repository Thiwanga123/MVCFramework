document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category');
    const equipmentCards = document.querySelectorAll('.equipment-card');
    const countDisplay = document.querySelector('.container1').previousElementSibling;
    
    // Save original data attribute with category info on each card for filtering
    equipmentCards.forEach(card => {
        const categoryId = card.getAttribute('data-category');
        // Store original display style
        card.dataset.originalDisplay = card.style.display || '';
    });
    
    // Function to update count display
    function updateCountDisplay(count) {
        countDisplay.textContent = `Showing ${count} Product${count !== 1 ? 's' : ''}`;
    }
    
    // Initial count
    updateCountDisplay(equipmentCards.length);
    
    // Add event listener to category select
    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;
        let visibleCount = 0;
        
        equipmentCards.forEach(card => {
            const categoryId = card.getAttribute('data-category');
            
            if (selectedCategory === 'all' || categoryId === selectedCategory) {
                card.style.display = card.dataset.originalDisplay;
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        // Update count display
        updateCountDisplay(visibleCount);
    });
});