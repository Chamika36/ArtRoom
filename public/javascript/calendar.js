document.addEventListener("DOMContentLoaded", function () {
    const prevButton = document.querySelector(".prev");
    const nextButton = document.querySelector(".next");
    const monthDisplay = document.querySelector(".month h2");
    const daysContainer = document.querySelector(".days");
    const eventsList = document.querySelector(".events");

    // Sample events data (you can replace this with your events data)
    const eventsData = [
        { date: "2023-06-05", title: "Event 1" },
        { date: "2023-06-15", title: "Event 2" },
        // Add more events here
    ];

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();

    function updateCalendar() {
        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
    
        monthDisplay.textContent = new Intl.DateTimeFormat("en-US", {
            year: "numeric",
            month: "long",
        }).format(firstDay);
    
        let days = "<tr>";
    
        // Add empty cells for days before the first day of the month
        for (let i = 0; i < firstDay.getDay(); i++) {
            days += "<td></td>";
        }
    
        for (let i = 1; i <= lastDay.getDate(); i++) {
            const dayDate = new Date(currentYear, currentMonth, i);
            const isEventDate = eventsData.some(
                (event) =>
                    event.date ===
                    dayDate.toISOString().split("T")[0]
            );
    
            days += `<td class="${isEventDate ? "event-date" : ""}">${i}</td>`;
    
            if ((firstDay.getDay() + i) % 7 === 0) {
                days += "</tr><tr>";
            }
        }
    
        // Add empty cells for days after the last day of the month
        for (let i = (firstDay.getDay() + lastDay.getDate()) % 7; i < 6; i++) {
            days += "<td></td>";
        }
    
        days += "</tr>";
        daysContainer.innerHTML = days;
    }
    

    function updateEventsList(date) {
        const selectedDateEvents = eventsData.filter(
            (event) => event.date === date
        );

        const eventsHTML = selectedDateEvents.map(
            (event) => `<li>${event.title}</li>`
        ).join("");

        eventsList.innerHTML = eventsHTML;
    }

    function navigateMonth(direction) {
        if (direction === "prev") {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
        } else if (direction === "next") {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
        }

        updateCalendar();
    }

    daysContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("event-date")) {
            const selectedDate = new Date(
                currentYear,
                currentMonth,
                parseInt(event.target.textContent)
            );

            const formattedDate = selectedDate
                .toISOString()
                .split("T")[0];

            updateEventsList(formattedDate);
        }
    });

    prevButton.addEventListener("click", function () {
        navigateMonth("prev");
    });

    nextButton.addEventListener("click", function () {
        navigateMonth("next");
    });

    updateCalendar();
});
