<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dentist Appointment</title>
    <link rel="stylesheet" href="{{ asset('css/newappfront.css') }}">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/main.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Adjusted Layout */
        body {
            font-family: 'Arial', sans-serif; /* Change font for a cleaner look */
            background-color: #f4f4f4; /* Light background for contrast */
            margin: 0;
            padding: 20px; /* Add padding around the body */
        }

        .container {
            display: grid; /* Change to grid layout */
            grid-template-columns: 1fr 1fr 1fr; /* Three equal columns for landscape */
            gap: 20px; /* Adjust gap between items */
            padding: 20px;
        }

        .calendar-container, .availability-container, .service-details {
            width: 100%;
            max-width: 400px; /* Adjust max width for better fit */
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Softer shadow */
            padding: 20px;
            text-align: center;
            opacity: 0.95; /* Slightly more opaque */
        }

        h2 {
            color: #6200EE;
            margin-bottom: 20px;
            font-size: 1.8em; /* Larger font size for headings */
            font-weight: bold; /* Bold text for emphasis */
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-header button {
            background-color: #6200EE;
            color: white;
            border: none;
            padding: 10px 15px; /* Adjust padding */
            border-radius: 5px;
            cursor: pointer;
            width: 80px; /* Adjust button size */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .calendar-header button:hover {
            background-color: #3700B3; /* Darker shade on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tbody td {
            padding: 15px; /* Increased padding for better touch targets */
            text-align: center;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        tbody td:hover {
            background-color: #f0f0f0; /* Light gray on hover */
        }

        .disabled-date {
            color: #ccc; /* Grey color for past and blocked dates */
            cursor: not-allowed;
        }

        .availability-container {
            margin-top: 20px;
            width: 100%; /* Full width */
            max-width: 600px; /* Limit max width */
        }

        .availability-container button {
            background-color: #6200EE;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            width: 100%; /* Full width */
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        .availability-container button:hover {
            background-color: #3700B3; /* Darker shade on hover */
        }

        .time-dropdown {
            margin-top: 10px;
        }

        .time-dropdown select {
            padding: 10px;
            font-size: 18px;
            width: 100%;
            border-radius: 5px; /* Rounded corners */
            border: 1px solid #ccc; /* Border for dropdown */
            transition: border-color 0.3s; /* Smooth transition */
        }

        .time-dropdown select:focus {
            border-color: #6200EE; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }

        .service-details {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Softer shadow */
            padding: 20px;
            width: 100%; /* Full width */
            max-width: 600px; /* Limit max width */
        }

        .service-details h3 {
            margin-top: 0;
            color: #6200EE; /* Primary color for headings */
        }

        .service-details button {
            background-color: #6200EE;
            color: white;
            border: none;
            padding: 15px;
            width: 100%; /* Full width */
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        .service-details button:hover {
            background-color: #3700B3; /* Darker shade on hover */
        }

        .selected-date {
            background-color: #6200EE; /* Highlight color */
            color: white; /* Text color for highlighted date */
        }

        /* Media Queries for Mobile Responsiveness */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr; /* Stack items vertically on smaller screens */
                padding: 10px; /* Adjust padding */
            }

            .calendar-container, .service-details, .availability-container {
                width: 100%; /* Full width for smaller screens */
                max-width: none; /* Remove max width */
                margin-bottom: 20px; /* Add space between stacked items */
            }

            h2, h3 {
                font-size: 1.5em; /* Adjust font size for smaller screens */
            }

            .calendar-header button, .availability-container button, .service-details button {
                padding: 12px; /* Adjust padding for smaller screens */
                width: 100%; /* Full width for buttons */
            }

            .time-dropdown select {
                font-size: 16px; /* Adjust font size for dropdown */
            }
        }

        /* Adjusted Layout for Wide Devices */
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr; /* Three equal columns for landscape */
            gap: 20px;
            padding: 20px;
        }

        @media (min-width: 1200px) {
            .container {
                grid-template-columns: 2fr 1fr 1fr; /* Adjust columns for wide screens */
            }
        }

        /* Ensure the section is scrollable on mobile */
        section {
            overflow-x: auto; /* Allow horizontal scrolling */
            overflow-y: hidden; /* Prevent vertical scrolling */
            padding: 10px; /* Add padding for better spacing */
        }

        .container {
            display: grid;
            grid-template-columns: 1fr; /* Stack items vertically on smaller screens */
            gap: 20px;
            padding: 10px;
        }

        /* Media Queries for Mobile Responsiveness */
        @media (min-width: 768px) {
            .container {
                grid-template-columns: 1fr 1fr; /* Two columns for medium screens */
            }
        }

        @media (min-width: 1200px) {
            .container {
                grid-template-columns: 2fr 1fr 1fr; /* Three columns for wide screens */
            }
        }
    </style>
</head>
<body>
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Login</h1>
            <form id="login-form" onsubmit="return validateLogin(event)">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <button type="button" id="toggle-password" class="toggle-password">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                <button type="submit" class="logbttn">Login</button>
            </form>
            <a href="#" class="foRGOT"><p>Forgot your password?</p></a>
        </div>
    </div>

<!-- Navigation Bar -->
<div class="navbar">
    <img src="https://feji.us/v3pycq" class="logo" alt="Clinic Logo" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;">
    <h3>Clinic System</h3>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Service</a></li>
        <li><a href="#">Contact</a></li>
        <button id="login-btn" class="bTTn">Login</button>
    </ul>
</div>

<!-- Dentist Booking Section -->
<section>
    <div class="container">
        <!-- Custom Calendar Section -->
        <div class="calendar-container">
            <h2>Select a Date</h2>
            <div class="calendar-header">
                <button class="prev-month">&#8249;</button>
                <span class="month-year"></span>
                <button class="next-month">&#8250;</button>
            </div>
            <table class="calendar">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody id="calendar-body"></tbody>
            </table>
        </div>

        <div class="availability-container">
            <button id="check-availability">Check Availability</button>
            <div class="time-dropdown" style="display:none;">
                <h3>Select a Time Slot</h3>
                <select id="time-slots">
                    <!-- Options will be populated dynamically -->
                </select>
            </div>
        </div>

        <!-- Service Details -->
        <div class="service-details">
            <h3>Service Details</h3>
            <label for="service-select">Choose a service:</label>
            <div class="service-options" id="service-select">
                <div class="service-option" data-value="consultation" data-description="Consult with a Dentist - $50">Consult with a Dentist</div>
                <div class="service-option" data-value="cleaning" data-description="Teeth Cleaning - $75">Teeth Cleaning</div>
                <div class="service-option" data-value="whitening" data-description="Teeth Whitening - $100">Teeth Whitening</div>
                <div class="service-option" data-value="extraction" data-description="Tooth Extraction - $150">Tooth Extraction</div>
            </div>
            <div id="service-description">
                Select a service to see details.
            </div>
            <button id="next-btn" disabled>Next</button>
        </div>
    </div>
</section>

<script src="{{ asset('js/login.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('#toggle-password');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarBody = document.getElementById('calendar-body');
    const monthYearDisplay = document.querySelector('.month-year');
    const prevMonthBtn = document.querySelector('.prev-month');
    const nextMonthBtn = document.querySelector('.next-month');
    const today = new Date();
    const nextBtn = document.getElementById('next-btn');
    let selectedDate = null;
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const timeSlots = ["09:00 AM", "10:00 AM", "11:00 AM", "12:00 PM", "02:00 PM", "03:00 PM"];

    // Render the calendar
    function renderCalendar(month, year) {
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        calendarBody.innerHTML = '';
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

        let date = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement('tr');
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    const cell = document.createElement('td');
                    row.appendChild(cell);
                } else if (date > daysInMonth) {
                    break;
                } else {
                    const cell = document.createElement('td');
                    const cellText = document.createTextNode(date);
                    cell.appendChild(cellText);
                    const cellDate = new Date(year, month, date);

                    // Disable past dates
                    if (cellDate < today.setHours(0, 0, 0, 0)) {
                        cell.classList.add('disabled-date');
                    } else {
                        cell.addEventListener('click', function() {
                            // Remove highlight from previously selected cells
                            document.querySelectorAll('td').forEach(td => td.classList.remove('selected-date'));
                            // Highlight the clicked cell
                            cell.classList.add('selected-date');
                            selectedDate = cellDate;
                        });
                    }
                    row.appendChild(cell);
                    date++;
                }
            }
            calendarBody.appendChild(row);
        }
    }

    // Check Availability
    document.getElementById('check-availability').addEventListener('click', function() {
        if (!selectedDate) {
            alert('Please select a date first.');
            return;
        }
        const timeDropdown = document.querySelector('.time-dropdown');
        timeDropdown.style.display = 'block';
        const timeSlotsDropdown = document.getElementById('time-slots');
        timeSlotsDropdown.innerHTML = '';
        timeSlots.forEach(slot => {
            const option = document.createElement('option');
            option.value = slot;
            option.textContent = slot;
            timeSlotsDropdown.appendChild(option);
        });

        nextBtn.disabled = false; // Enable the next button when time slots are displayed
    });

    // "Next" Button Functionality
    nextBtn.addEventListener('click', function() {
        const selectedTime = document.getElementById('time-slots').value;
        if (selectedDate && selectedTime) {
            const appointmentDate = new Date(selectedDate);
            const threeDaysLater = new Date();
            threeDaysLater.setDate(appointmentDate.getDate() + 3);

            // Store the selected date, time, and service in localStorage
            localStorage.setItem('date', appointmentDate.toDateString());
            localStorage.setItem('time', selectedTime);
            localStorage.setItem('service', document.getElementById('service-select').value); // Assuming service is selected

            alert(`Appointment confirmed on ${appointmentDate.toDateString()} at ${selectedTime}`);
            
            // Disable the next 3 days if the appointment is made today
            if (appointmentDate.toDateString() === new Date().toDateString()) {
                document.querySelectorAll('td').forEach(td => {
                    const dateInCell = new Date(currentYear, currentMonth, parseInt(td.innerText));
                    if (dateInCell > appointmentDate && dateInCell <= threeDaysLater) {
                        td.classList.add('disabled-date');
                    }
                });
            }

            // Redirect to the confirmation page using the route helper
            window.location.href = '{{ route('confirmation') }}'; // Use the route helper
        } else {
            alert('Please select a valid time slot.');
        }
    });

    // Previous and Next month functionality
    prevMonthBtn.addEventListener('click', function() {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    nextMonthBtn.addEventListener('click', function() {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    // Initialize the calendar to show the current month and year
    renderCalendar(currentMonth, currentYear);
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceOptions = document.querySelectorAll('.service-option');
        const serviceDescription = document.getElementById('service-description');
        const nextBtn = document.getElementById('next-btn');
        let selectedService = null;

        serviceOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Remove active class from all options
                serviceOptions.forEach(opt => opt.classList.remove('active'));
                // Add active class to the selected option
                this.classList.add('active');
                // Update the selected service
                selectedService = this.getAttribute('data-value');
                // Update the service description
                serviceDescription.textContent = this.getAttribute('data-description');
                // Enable the next button
                nextBtn.disabled = false;
            });
        });

        // "Next" Button Functionality
        nextBtn.addEventListener('click', function() {
            if (selectedService) {
                // Store the selected service in localStorage
                localStorage.setItem('service', selectedService);
                // Proceed with the next steps (e.g., redirect or show next section)
                alert(`Service selected: ${selectedService}`);
                // Redirect to the confirmation page or next step
                window.location.href = '{{ route('confirmation') }}'; // Adjust as needed
            } else {
                alert('Please select a service.');
            }
        });
    });
</script>

<script src="newappfrontt.js"></script>
</body>
</html>