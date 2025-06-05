<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reserve');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string',
            'email' => 'required|email',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_type' => 'required|string',
            'guests' => 'required|integer|min:1',
        ]);

        Reservation::create($validated);

        return redirect('/reserve')->with('success', 'Reservation successful!');
    }

    public function index()
    {
        $reservations = Reservation::latest()->paginate(10); // Show 10 per page
        return view('admin.reservations.index', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'guest_name' => 'required|string|max:255',
        'email' => 'required|email',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after_or_equal:check_in',
        'room_type' => 'required|string|max:100',
        'guests' => 'required|integer|min:1',
    ]);

    $reservation = Reservation::findOrFail($id);
    $reservation->update($validated);

    return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated.');
}
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted!');
    }

    

}