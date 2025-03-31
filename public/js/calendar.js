document.addEventListener("DOMContentLoaded", () => {

    let currentDate = new Date();  // Current date for initial display

    // Function to generate the calendar for a given month and year
    function generateCalendar(month, year) {
        const firstDay = new Date(year, month, 1);  // Get the first day of the month
        const lastDay = new Date(year, month + 1, 0);  // Get the last day of the month
        const calendarGrid = document.getElementById('calendar-days');  // Where the days will go

        // Update the calendar month/year in the header
        const monthName = firstDay.toLocaleString('default', { month: 'long' });
        document.getElementById('calendar-month-name').innerText = `${monthName} ${year}`;

        // Clear the calendar grid before adding new days
        calendarGrid.innerHTML = '';

        // Add empty divs for the days before the 1st of the month
        for (let i = 0; i < firstDay.getDay(); i++) {
            const emptyDiv = document.createElement('div');
            calendarGrid.appendChild(emptyDiv);  // Empty space before first day
        }

        // Add the actual days of the month
        for (let i = 1; i <= lastDay.getDate(); i++) {
            const dayDiv = document.createElement('div');
            dayDiv.innerText = i;
            dayDiv.classList.add('calendar-day');
            dayDiv.onclick = function() {
                alert(`You clicked on: ${i} ${monthName} ${year}`);
            };

            // Check if today is the current day and add special styling
            const dayString = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            if (isToday(dayString)) {
                dayDiv.classList.add('today');
            }

            calendarGrid.appendChild(dayDiv);  // Add the day to the grid
        }
    }

        function isToday(date) {
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0];  // YYYY-MM-DD format
            return date === formattedDate;
        }

        // Function to change the month (forward or backward)
        window.changeMonth = function(offset) {
            currentDate.setMonth(currentDate.getMonth() + offset);
            generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
        }

    // Generate the calendar initially
    generateCalendar(currentDate.getMonth(), currentDate.getFullYear());
});