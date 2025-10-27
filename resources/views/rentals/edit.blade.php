<!DOCTYPE html>
<html>
<head>
    <title>Edit Rental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eafaf1, #d4edda);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        h1 { text-align: center; color: #2f5d50; margin-bottom: 20px; }
        label { display: block; margin-top: 10px; font-weight: bold; color:#2f5d50; }
        input, select {
            width: 100%; margin-top: 6px; padding: 10px;
            border: 1px solid #ccc; border-radius: 6px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover { background: #218838; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Edit Rental</h1>
        <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Machinery</label>
            <select name="machinery_id" required>
                @foreach($machineries as $machinery)
                    <option value="{{ $machinery->id }}" 
                        {{ $rental->machinery_id == $machinery->id ? 'selected' : '' }}>
                        {{ $machinery->name }}
                    </option>
                @endforeach
            </select>

            <label>Renter Name</label>
            <input type="text" name="renter_name" value="{{ $rental->renter_name }}" required>

            <label>Rent Date</label>
            <input type="date" name="rent_date" 
                   value="{{ \Carbon\Carbon::parse($rental->rent_date)->format('Y-m-d') }}" required>

            <label>Return Date</label>
            <input type="date" name="return_date" 
                   value="{{ \Carbon\Carbon::parse($rental->return_date)->format('Y-m-d') }}" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
