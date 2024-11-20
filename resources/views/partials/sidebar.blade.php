<div class="sidebar">
    <nav id="navbar">
        <span class="close">&times;</span>
        <div class="profile">
            <img src="{{ asset('profilepic.png') }}" alt="Profile Picture" class="profile-picture">
            <div class="profile-text">
                <h4>Arima Kousei</h4>
                <p><a href="{{ route('profile') }}">Visit profile</a></p>
            </div>
        </div>
        <hr>
        <ul>
            <li><a href="{{ url('dashboard') }}" id="programMenu">Dashboard</a></li>
            <li><a href="{{ url('events/events') }}">Events</a></li> 
            <li><a href="{{ url('transact/transactions') }}">Transaction</a></li>
            <li><a href="{{ url('pending') }}" id="studentMenu">Appointment</a></li> 
            <div class="dropdown-content" id="dropdownMenu">
                <a href="{{ url('appointment/pending/pending') }}">Pending</a>
                <a href="{{ url('appointment/accepted/accepted') }}">Approved</a>
                <a href="{{ url('appointment/rejected/rejected') }}">Rejected</a>
            </div>
            <li><a href="#" class="logout">Log out</a></li>
        </ul>
    </nav>
    <div class="contact-info">
        <h3>Contact Us</h3>
        <p><i class="bx bx-phone"></i> +1 (123) 456-7890</p>
        <p><i class="bx bx-envelope"></i> support@clinic.com</p>
        <p><i class="bx bx-map"></i> 123 Clinic St, Mandaue City, Cebu</p>
    </div>
</div>
