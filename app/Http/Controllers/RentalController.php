<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Machinery;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('machinery')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $machineries = Machinery::where('status', 'available')->get();
        return view('rentals.create', compact('machineries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'renter_name'  => 'required|string|max:150',
            'rent_date'    => 'required|date',
            'return_date'  => 'required|date|after_or_equal:rent_date',
            'machinery_id' => 'required|exists:machineries,id',
        ]);

        Rental::create([
            'renter_name'  => $request->renter_name,
            'rent_date'    => $request->rent_date,
            'return_date'  => $request->return_date,
            'machinery_id' => $request->machinery_id,
        ]);

        $machinery = Machinery::findOrFail($request->machinery_id);
        $machinery->status = 'rented';
        $machinery->save();

        return redirect()->route('rentals.index')
                         ->with('success', 'Rental created successfully!');
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $machineries = Machinery::all();
        return view('rentals.edit', compact('rental', 'machineries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'renter_name'  => 'required|string|max:150',
            'rent_date'    => 'required|date',
            'return_date'  => 'required|date|after_or_equal:rent_date',
            'machinery_id' => 'required|exists:machineries,id',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update([
            'renter_name'  => $request->renter_name,
            'rent_date'    => $request->rent_date,     // fixed naming
            'return_date'  => $request->return_date,   // fixed naming
            'machinery_id' => $request->machinery_id,
        ]);

        return redirect()->route('rentals.index')
                         ->with('success', 'Rental updated successfully!');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);

        $machinery = Machinery::findOrFail($rental->machinery_id);
        $machinery->status = 'available';
        $machinery->save();

        $rental->delete();

        return redirect()->route('rentals.index')
            ->with('success', 'Rental deleted successfully!');


    }
}
