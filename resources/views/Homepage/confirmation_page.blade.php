<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="{{ asset('css/confirmation.css') }}">
</head>
<body>
    <div class="confirmation-container">
        <h1>Thank You!</h1>
        <p>Your booking is confirmed.</p>
        <h2>Booking Details:</h2>
        <p><strong>Name:</strong> <span id="name"></span></p>
        <p><strong>Email:</strong> <span id="email"></span></p>
        <p><strong>Phone Number:</strong> <span id="phone"></span></p>
        <p><strong>Address:</strong> <span id="address"></span></p>
        <p><strong>Service:</strong> <span id="service"></span></p>
        <p><strong>Date:</strong> <span id="date"></span></p>
        <p><strong>Time:</strong> <span id="time"></span></p>
        
        <!-- OK Button -->
        <button id="ok-button" class="ok-btn">OK</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve booking information from localStorage
            const name = localStorage.getItem('name');
            const email = localStorage.getItem('email');
            const phone = localStorage.getItem('phone');
            const address = localStorage.getItem('address');
            const service = localStorage.getItem('service');
            const date = localStorage.getItem('date');
            const time = localStorage.getItem('time');

            // Display the booking information on the confirmation page
            document.getElementById('name').textContent = name;
            document.getElementById('email').textContent = email;
            document.getElementById('phone').textContent = phone;
            document.getElementById('address').textContent = address;
            document.getElementById('service').textContent = service ? service : 'No service selected';
            document.getElementById('date').textContent = date;
            document.getElementById('time').textContent = time;

            // Save booking information to the database
            fetch('{{ route('store.booking') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    service: service,
                    date: date,
                    time: time
                })
            })
            .then(response => response.json())

            // OK Button functionality
            document.getElementById('ok-button').addEventListener('click', function() {
                // Redirect to the booking page
                window.location.href = '{{ route('newappschedule') }}';
            });
        });
    </script>
</body>
</html>
