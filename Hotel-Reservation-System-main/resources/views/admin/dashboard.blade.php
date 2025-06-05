<div class="mt-10">
    <h2 class="text-2xl font-semibold mb-4">Today’s Check-ins</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6 mt-10">
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-2">Total Rooms</h2>
        <p class="text-2xl font-bold text-blue-700">{{ $totalRooms }}</p>
    </div>

    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-2">Available Rooms</h2>
        <p class="text-2xl font-bold text-green-600">{{ $availableRooms }}</p>
    </div>

    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-2">Booked Rooms</h2>
        <p class="text-2xl font-bold text-red-600">{{ $bookedRooms }}</p>
    </div>
</div>


    @if($todaysCheckins->isEmpty())
        <p class="text-gray-500">No check-ins scheduled for today.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">Guest Name</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Check-in</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Check-out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todaysCheckins as $reservation)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->check_in_date }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $reservation->check_out_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
