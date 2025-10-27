<?php

namespace App\Http\Controllers;

use App\Models\Machinery;
use Illuminate\Http\Request;

class MachineryController extends Controller
{
    public function index()
    {
        $machineries = Machinery::all();
        return view('machineries.index', compact('machineries'));
    }

    public function create()
    {
        return view('machineries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'type' => 'required|string|max:100',
            'rate_per_day' => 'required|numeric',
            'status' => 'required|string|max:50',
        ]);

        Machinery::create($request->all());

        return redirect()->route('machineries.index')
                         ->with('success', 'Machinery added successfully!');
    }

    public function edit($id)
    {
        $machinery = Machinery::findOrFail($id);
        return view('machineries.edit', compact('machinery'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'type' => 'required|string|max:100',
            'rate_per_day' => 'required|numeric',
            'status' => 'required|string|max:50',
        ]);

        $machinery = Machinery::findOrFail($id);
        $machinery->update($request->all());

        return redirect()->route('machineries.index')
                         ->with('success', 'Machinery updated successfully!');
    }

    public function destroy($id)
    {
        $machinery = Machinery::findOrFail($id);
        $machinery->delete();

        return redirect()->route('machineries.index')
                         ->with('success', 'Machinery deleted successfully!');
    }
}
