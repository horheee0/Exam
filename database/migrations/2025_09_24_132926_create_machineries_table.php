<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Machinery;

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'type' => 'required',
        'rate_per_day' => 'required|numeric',
    ]);

    Machinery::create([
        'name' => $request->name,
        'type' => $request->type,
        'rate_per_day' => $request->rate_per_day,
        'status' => 'available', // lowercase only
    ]);

    return redirect()->route('machineries.index');
}
