<!DOCTYPE html>
<html>
<head>
    <title>Edit Machinery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        body::before {
            content: "HarvestHire (Lite)";
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 70px;
            font-weight: bold;
            color: rgba(0, 100, 0, 0.08);
            white-space: nowrap;
            z-index: 0;
        }

        .form-box {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            width: 350px;
            z-index: 1;
        }

        h1 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            margin: 8px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 10px;
            width: 100%;
            background: #2e7d32;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #1b5e20; }
    </style>
</head>
<body>
    <div class="form-box">
        <h1>Edit Machinery</h1>
        <form action="{{ route('machineries.update', $machinery->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $machinery->name }}" required>
            <input type="text" name="type" value="{{ $machinery->type }}" required>
            <input type="number" name="rate_per_day" value="{{ $machinery->rate_per_day }}" required>
            <select name="status">
                <option value="available" {{ $machinery->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="rented" {{ $machinery->status == 'rented' ? 'selected' : '' }}>Rented</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
