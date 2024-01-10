<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic Calendar of Events</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
    }

    .month-name {
      text-align: center;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .calendar {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 10px;
    }

    .day {
      padding: 10px;
      border: 1px solid #ddd;
      position: relative;
    }

    .event {
      position: absolute;
      bottom: 5px;
      left: 5px;
      background-color: #f2f2f2;
      padding: 2px 5px;
      font-size: 12px;
    }
  </style>
</head>
<body>

<h1>Dynamic Calendar of Events</h1>
<div class="month-name" id="monthName"></div>

<div class="calendar" id="calendar"></div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const calendar = document.getElementById('calendar');
    const monthNameElement = document.getElementById('monthName');
    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    function updateCalendar() {
      const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
      const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();

      calendar.innerHTML = '';
      monthNameElement.textContent = new Date(currentYear, currentMonth, 1).toLocaleString('en-US', { month: 'long', year: 'numeric' });

      // Create header
      const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
      daysOfWeek.forEach(day => {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = day;
        calendar.appendChild(dayElement);
      });

      // Create days
      for (let i = 0; i < firstDayIndex; i++) {
        const emptyDay = document.createElement('div');
        emptyDay.classList.add('day');
        calendar.appendChild(emptyDay);
      }

      for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.textContent = day;
        calendar.appendChild(dayElement);

        // Add click event for adding events
        dayElement.addEventListener('click', function() {
          const eventText = prompt('Enter event for ' + day + '/' + (currentMonth + 1) + '/' + currentYear);
          if (eventText) {
            const eventElement = document.createElement('div');
            eventElement.classList.add('event');
            eventElement.textContent = eventText;
            dayElement.appendChild(eventElement);
          }
        });
      }
    }

    updateCalendar();

    // Add navigation buttons
    const prevBtn = document.createElement('button');
    prevBtn.textContent = 'Prev Month';
    prevBtn.addEventListener('click', function() {
      currentMonth--;
      if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
      }
      updateCalendar();
    });

    const nextBtn = document.createElement('button');
    nextBtn.textContent = 'Next Month';
    nextBtn.addEventListener('click', function() {
      currentMonth++;
      if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
      }
      updateCalendar();
    });

    calendar.parentElement.insertBefore(prevBtn, calendar);
    calendar.parentElement.appendChild(nextBtn);
  });
</script>

</body>
</html>
