document.querySelectorAll('.service-option').forEach(option => {
    option.addEventListener('click', function() {
        const selectedService = this.getAttribute('data-value');
        const serviceDescription = document.getElementById('service-description');

        switch (selectedService) {
            case 'consultation':
                serviceDescription.innerHTML = 'Consult with a Dentist<br>Duration: 1 hour<br>Price: $100';
                break;
            case 'cleaning':
                serviceDescription.innerHTML = 'Teeth Cleaning<br>Duration: 30 minutes<br>Price: $75';
                break;
            case 'whitening':
                serviceDescription.innerHTML = 'Teeth Whitening<br>Duration: 1 hour<br>Price: $150';
                break;
            case 'extraction':
                serviceDescription.innerHTML = 'Tooth Extraction<br>Duration: 45 minutes<br>Price: $120';
                break;
            default:
                serviceDescription.innerHTML = 'Select a service to see details.';
        }

        // Enable the next button when a service is selected
        document.getElementById('next-btn').disabled = false;
    });
});

nextBtn.addEventListener('click', function() {
    const selectedTime = document.getElementById('time-slots').value;
    const selectedService = document.getElementById('service-select').value;
    if (selectedDate && selectedTime && selectedService) {
        const appointmentDate = new Date(selectedDate);
        const threeDaysLater = new Date();
        threeDaysLater.setDate(appointmentDate.getDate() + 3);

        localStorage.setItem('date', appointmentDate.toDateString());
        localStorage.setItem('time', selectedTime);
        localStorage.setItem('service', selectedService);

        alert(`Appointment confirmed on ${appointmentDate.toDateString()} at ${selectedTime}`);
        
        if (appointmentDate.toDateString() === new Date().toDateString()) {
            document.querySelectorAll('td').forEach(td => {
                const dateInCell = new Date(currentYear, currentMonth, parseInt(td.innerText));
                if (dateInCell > appointmentDate && dateInCell <= threeDaysLater) {
                    td.classList.add('disabled-date');
                }
            });
        }

        window.location.href = 'confirmation_page/confirmation_page.html';
    } else {
        alert('Please select a valid date, time slot, and service.');
    }
});

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