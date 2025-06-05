<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-4">Edit Reservation</h2>

        <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Name</label>
                <input type="text" name="guest_name" class="w-full border p-2 rounded"
                       value="{{ old('guest_name', $reservation->guest_name) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded"
                       value="{{ old('email', $reservation->email) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Check-In</label>
                <input type="date" name="check_in" class="w-full border p-2 rounded"
                       value="{{ old('check_in', $reservation->check_in) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Check-Out</label>
                <input type="date" name="check_out" class="w-full border p-2 rounded"
                       value="{{ old('check_out', $reservation->check_out) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Room Type</label>
                <input type="text" name="room_type" class="w-full border p-2 rounded"
                       value="{{ old('room_type', $reservation->room_type) }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Guests</label>
                <input type="number" name="guests" class="w-full border p-2 rounded"
                       value="{{ old('guests', $reservation->guests) }}" min="1" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Reservation
            </button>
        </form>
    </div>
</x-app-layout>
