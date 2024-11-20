<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/newappfront.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirmation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <title>Schedule Appointment</title>
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

<!-- Booking Form Section -->
<section class="booking-form">
    <h2>Booking Form</h2>
    <form id="booking-form" onsubmit="return validateBooking(event)">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        
        <button type="submit" class="submit-btn">Book Now</button>
    </form>
</section>

<script>
    document.getElementById('booking-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Store booking information in localStorage
        localStorage.setItem('name', document.getElementById('name').value);
        localStorage.setItem('email', document.getElementById('email').value);
        localStorage.setItem('phone', document.getElementById('phone').value);
        localStorage.setItem('address', document.getElementById('address').value);
        
        // Redirect to the newappscheduled page to select a date and time
        window.location.href = '{{ route('newappscheduled') }}'; // Redirect to newappscheduled
    });
</script>

<!-- Footer -->
<footer>
    <div class="flexcontainer">
        <h3>Contact Us</h3>
        <p>Benedicto College</p>
        <p>A.S Fortuna Street, Brgy. Bakilid, Mandaue City</p>
        <p>Email: benedictocollege@gmail.com</p>
        <p>Phone: (123) 456-7890</p>
    </div>
    <div class="flexcontainer2">
        <p>© 2024 Benedicto College. All rights reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>
    <div class="flexcontainer3">
        <h3>Follow Us</h3>
        <a href="#"><i class='bx bxl-facebook-circle bx-md'></i></a>
        <a href="#"><i class='bx bxl-twitter bx-md' style='color:#ffffff' ></i></a>
        <a href="#"><i class='bx bxl-linkedin-square bx-md' style='color:#ffffff' ></i></a>
        <a href="#"><i class='bx bxl-instagram bx-md'></i></a>
    </div>
</footer>
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
                // Removed the alert message
                // alert(`Service selected: ${selectedService}`);
                // Redirect to the confirmation page or next step
                window.location.href = '{{ route('confirmation') }}'; // Adjust as needed
            } else {
                alert('Please select a service.');
            }
        });
    });
</script>
</body>
</html>