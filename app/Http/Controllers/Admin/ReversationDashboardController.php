<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservations; // Import the Reservation model


class ReversationDashboardController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $reservations = Reservations::all();
            return view('Admin.reservations.index', compact('reservations'));
        }

        public function create()
        {
            return view('Admin.reservations.create');
        }

        // public function store(Request $request)
        // {
        //     $validatedData = $request->validate([
        //         'start' => 'required',
        //         'end' => 'required',
        //         'price' => 'required',
        //         'details' => 'required',
        //         'user_id' => 'required',
        //         'office_id' => 'required',
        //     ]);

        //     if (Reservation::where('start', $validatedData['start'])->count() === 0) {
        //         Reservation::create($validatedData);
        //         return redirect()->route('reservation.index')->with('success', 'Reservation created successfully');
        //     }

        //     return redirect()->back()->withErrors(['start' => 'The specified time already exists']);
        // }

        public function edit(Reservations $reservation)
        {
            return view('Admin.reservations.edit', compact('reservation'));
        }

        public function update(Request $request, Reservations $reservation)
        {
            $validatedData = $request->validate([
                'start' => 'required',
                'end' => 'required',
                'price' => 'required',
                'details' => 'required',
                'user_id' => 'required',
                'office_id' => 'required',
            ]);

            $reservation->update($validatedData);

            return redirect()->route('reservation.update')->with('success', 'Reservation updated successfully');
        }


// ....................................


        public function store (Request $request)
        {
            $request->validate([
                'start' => 'required',
                'end' => 'required',
                'price' => 'required',
                'details' => 'required',
                'user_id' => 'required',
                'office_id' => 'required',
            ]);

            $reservation = new Reservations;
            $reservation->start = $request->start;
            $reservation->end = $request->end;
            $reservation->price = $request->price;
            $reservation->details = $request->details;
            $reservation->user_id = $request->user_id;
            $reservation->office_id = $request->office_id;

            $reservation->save();

            return redirect()->route('reservation.index')->with('success', 'Office created successfully.');
        }


        public function destroy(Reservations $reservation)
        {
            $reservation->delete();

            return redirect()->route('reservation.destroy')->with('success', 'Reservation deleted successfully');
        }
    }

