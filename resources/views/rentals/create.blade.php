<!DOCTYPE html>
<html>
<head>
    <title>Add Rental - HarvestHire (Lite)</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #e0f2f1, #a5d6a7);
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Watermark */
        body::before {
            content: "HarvestHire (Lite)";
            position: absolute;
            font-size: 5rem;
            font-weight: bold;
            color: rgba(0, 77, 64, 0.08);
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            pointer-events: none;
        }

        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 20px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        h1 {
            color: #00695c;
            text-align: center;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        button.save {
            background: #43a047;
            color: #fff;
        }

        button.save:hover {
            background: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Rental</h1>
        <form action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <label>Machinery</label>
            <select name="machinery_id" required>
                @foreach($machineries as $machinery)
                    <option value="{{ $machinery->id }}">{{ $machinery->name }} ({{ $machinery->status }})</option>
                @endforeach
            </select>

            <input type="text" name="renter_name" placeholder="Renter Name" required>
            <input type="date" name="rent_date" required>
            <input type="date" name="return_date" required>

            <button type="submit" class="save">Save</button>
        </form>
    </div>
</body>
</html>
