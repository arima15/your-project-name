@extends('layouts.app')

@section('title', 'Pending Appointments')

@section('content')
<div class="container">
    <h2>Pending Appointments</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Transaction No.</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>
                        <a href="{{ route('booking.show', $booking->id) }}" class="action-btn">View</a>
                        <button class="action-btn" data-action="add">Add</button>
                        <button class="action-btn cancel-btn" data-id="{{ $booking->id }}">Cancel</button>
                    </td>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->service }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>Pending</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Logout Confirmation Modal -->
<div id="logout-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Are you sure you want to log out?</h2>
        <button id="confirm-logout" class="logbttn">Yes</button>
        <button id="cancel-logout" class="logbttn">No</button>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/partials/pending.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/pending.js') }}"></script>
<script src="{{ asset('js/logout/logout.js') }}"></script>
<script src="{{ asset('js/dropdown/dropdown.js') }}"></script>
<script>
    document.querySelectorAll('.cancel-btn').forEach(button => {
        button.addEventListener('click', function() {
            const bookingId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to cancel this booking?')) {
                fetch(`/booking/${bookingId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Optionally, refresh the page or remove the row from the table
                        location.reload(); // Reload the page to see the changes
                    } else {
                        alert('Failed to cancel the booking.');
                    }
                });
            }
        });
    });
</script>
@endsection

// In your controller for the pending page, fetch the bookings
public function showPending()
{
    $bookings = Booking::all();
    return view('dash.pending', compact('bookings'));
}