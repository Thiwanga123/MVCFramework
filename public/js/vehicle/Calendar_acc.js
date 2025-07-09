document.addEventListener("DOMContentLoaded", function () {
    const calendar = document.getElementById("calendar");
    const bookingDates = JSON.parse(document.getElementById("bookingDates").value);
    let currentDate = new Date();

    function renderCalendar(date) {
        calendar.innerHTML = "";

        const month = date.toLocaleString("default", { month: "long" });
        const year = date.getFullYear();

        // Create header
        const header = document.createElement("div");
        header.className = "header";

        const prevButton = document.createElement("button");
        prevButton.textContent = "<";
        prevButton.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate);
        });

        const nextButton = document.createElement("button");
        nextButton.textContent = ">";
        nextButton.addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate);
        });

        const title = document.createElement("span");
        title.textContent = `${month} ${year}`;

        header.appendChild(prevButton);
        header.appendChild(title);
        header.appendChild(nextButton);
        calendar.appendChild(header);

        // Create days container
        const daysContainer = document.createElement("div");
        daysContainer.className = "days";

        // Days of the week
        const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        daysOfWeek.forEach(day => {
            const dayElement = document.createElement("div");
            dayElement.className = "day";
            dayElement.textContent = day;
            daysContainer.appendChild(dayElement);
        });

        // Get the first day of the month
        const firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
        const daysInMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

        // Add empty slots for days before the first day
        for (let i = 0; i < firstDay; i++) {
            const emptySlot = document.createElement("div");
            emptySlot.className = "day";
            daysContainer.appendChild(emptySlot);
        }

        // Add days of the month
        for (let i = 1; i <= daysInMonth; i++) {
            const dayElement = document.createElement("div");
            dayElement.className = "day";
            const currentDateString = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            dayElement.textContent = i;

            if (bookingDates.includes(currentDateString)) {
                dayElement.style.backgroundColor = "red";
                dayElement.style.color = "white";
            }

            daysContainer.appendChild(dayElement);
        }

        calendar.appendChild(daysContainer);
    }

    renderCalendar(currentDate);
});