<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalReservations = \App\Models\Reservation::count();
        $upcomingCheckins = \App\Models\Reservation::where('check_in_date', '>=', now())->count();
        $todaysCheckins = \App\Models\Reservation::whereDate('check_in_date', \Carbon\Carbon::today())->get();
    
        // Room Stats
        $totalRooms = Room::count();
        $availableRooms = Room::where('is_available', true)->count();
        $bookedRooms = Room::where('is_available', false)->count();
    
        return view('admin.dashboard', compact(
            'totalReservations',
            'upcomingCheckins',
            'todaysCheckins',
            'totalRooms',
            'availableRooms',
            'bookedRooms'
        ));
    }
}
