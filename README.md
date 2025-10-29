# HarvestHire (Lite)

## Description / Overview  
**HarvestHire (Lite)** is a simplified machine rental web system designed to make agricultural machinery booking easy and efficient.  
It provides two main management units:  
1. **Manage Machineries** – where users can add, edit, or delete machinery records.  
2. **Manage Rentals** – where users can create a rental by selecting from the available machineries.  

This system helps reduce manual booking work and allows digital management of both machinery and rental transactions.

---

## Objectives  
1. To develop a machine rental system where users can book machinery online without the hassle of going physically    .  
2. To practice CRUD (Create, Read, Update, Delete) operations for managing machinery efficiently.  
3. To apply web technologies such as **HTML**, **CSS**, **JavaScript**, **PHP**, and **Laravel** in system development.  

---

## Features / Functionality  
- Add, edit, or delete machinery under **Manage Machineries**.  
- Create and manage machinery rentals under **Manage Rentals**.  
- Select existing machinery for new rentals.  
- Automatic status update when machinery is rented.  
- Simple and user-friendly interface for easy management.  

---

## Installation Instructions  
1. Install **XAMPP** or any local web server with PHP and MySQL.  
2. Install **Composer** (for Laravel dependency management).  
3. Open your terminal and run:  
   ```bash
   composer install
4. Set up your database in .env and migrate the tables:
   ```bash
    php artisan migrate
5. Start the Laravel development server:
    ```bash
    php artisan serve
6. Open your browser and go to http://localhost:8000.

---

## Usage
1. Go to Manage Machineries to add or edit your list of available machinery.
2. Go to Manage Rentals to create a new rental and choose an existing machinery.
3. Machinery status changes automatically from available to rented when booked.
4. Edit or delete any entry easily from the rentals page if you want to cancel.

---

## Screenshots or Code Snippets
### HTML
``` html
TRYYYY
```
### DashboardController.php
``` php
<?php
namespace App\Http\Controllers;

class DashboardController extends Controller {
    public function index() {
        return view('dashboard.index');
    }
}
```
### MachineryController.php
``` php
<?php
namespace App\Http\Controllers;
use App\Models\Machinery;
use Illuminate\Http\Request;

class MachineryController extends Controller {
    public function index() {
        $machineries = Machinery::all();
        return view('machineries.index', compact('machineries'));
    }

    public function create() {
        return view('machineries.create');
    }

    public function store(Request $request) {
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

    public function edit($id) {
        $machinery = Machinery::findOrFail($id);
        return view('machineries.edit', compact('machinery'));
    }

    public function update(Request $request, $id) {
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

    public function destroy($id) {
        $machinery = Machinery::findOrFail($id);
        $machinery->delete();
        return redirect()->route('machineries.index')
            ->with('success', 'Machinery deleted successfully!');
    }
}

```
### RentalController.php
``` php
<?php
namespace App\Http\Controllers;
use App\Models\Rental;
use App\Models\Machinery;
use Illuminate\Http\Request;

class RentalController extends Controller {
    public function index() {
        $rentals = Rental::with('machinery')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function create() {
        $machineries = Machinery::where('status', 'available')->get();
        return view('rentals.create', compact('machineries'));
    }

    public function store(Request $request) {
        $request->validate([
            'renter_name' => 'required|string|max:150',
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rent_date',
            'machinery_id' => 'required|exists:machineries,id',
        ]);
        Rental::create([
            'renter_name' => $request->renter_name,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'machinery_id' => $request->machinery_id,
        ]);
        $machinery = Machinery::findOrFail($request->machinery_id);
        $machinery->status = 'rented';
        $machinery->save();
        return redirect()->route('rentals.index')
            ->with('success', 'Rental created successfully!');
    }

    public function edit($id) {
        $rental = Rental::findOrFail($id);
        $machineries = Machinery::all();
        return view('rentals.edit', compact('rental', 'machineries'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'renter_name' => 'required|string|max:150',
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rent_date',
            'machinery_id' => 'required|exists:machineries,id',
        ]);
        $rental = Rental::findOrFail($id);
        $rental->update([
            'renter_name' => $request->renter_name,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'machinery_id' => $request->machinery_id,
        ]);
        return redirect()->route('rentals.index')
            ->with('success', 'Rental updated successfully!');
    }

    public function destroy($id) {
        $rental = Rental::findOrFail($id);
        $machinery = Machinery::findOrFail($rental->machinery_id);
        $machinery->status = 'available';
        $machinery->save();
        $rental->delete();
        return redirect()->route('rentals.index')
            ->with('success', 'Rental deleted successfully!');
    }
}

```

---

## Contributor
- Jorge Jose Abenojar
- Neil Basti Benitez

---

## License
*None*

---
