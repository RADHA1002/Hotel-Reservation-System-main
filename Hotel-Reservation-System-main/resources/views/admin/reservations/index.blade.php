<x-app-layout>
    <div class="max-w-6xl mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-6">Guest Reservations</h2>

        @if ($reservations->count())
            <table class="min-w-full bg-white border">
                <thead>
    <tr class="bg-gray-100 text-left">
        <th class="py-2 px-4 border-b">Name</th>
        <th class="py-2 px-4 border-b">Email</th>
        <th class="py-2 px-4 border-b">Check-In</th>
        <th class="py-2 px-4 border-b">Check-Out</th>
        <th class="py-2 px-4 border-b">Room Type</th>
        <th class="py-2 px-4 border-b">Guests</th>
        <th class="py-2 px-4 border-b">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($reservations as $reservation)
        <tr>
            <td class="py-2 px-4 border-b">{{ $reservation->guest_name }}</td>
            <td class="py-2 px-4 border-b">{{ $reservation->email }}</td>
            <td class="py-2 px-4 border-b">{{ $reservation->check_in }}</td>
            <td class="py-2 px-4 border-b">{{ $reservation->check_out }}</td>
            <td class="py-2 px-4 border-b">{{ $reservation->room_type }}</td>
            <td class="py-2 px-4 border-b">{{ $reservation->guests }}</td>
            <td class="py-2 px-4 border-b">
                <a href="{{ route('admin.reservations.edit', $reservation->id) }}"
                   class="text-blue-600 hover:underline">Edit</a>

                <form action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                      method="POST" class="inline-block ml-2"
                      onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $reservation->guest_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $reservation->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $reservation->check_in }}</td>
                            <td class="py-2 px-4 border-b">{{ $reservation->check_out }}</td>
                            <td class="py-2 px-4 border-b">{{ $reservation->room_type }}</td>
                            <td class="py-2 px-4 border-b">{{ $reservation->guests }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $reservations->links() }}
            </div>
        @else
            <p>No reservations found.</p>
        @endif
    </div>
</x-app-layout>
