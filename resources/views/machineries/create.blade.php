<!DOCTYPE html>
<html>
<head>
    <title>Add Machinery - HarvestHire (Lite)</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
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
            color: rgba(0, 100, 0, 0.08);
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
            color: #2e7d32;
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
            background: #2e7d32;
            color: #fff;
        }

        button.save:hover {
            background: #1b5e20;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Machinery</h1>
        <form action="{{ route('machineries.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="type" placeholder="Type" required>
            <input type="number" name="rate_per_day" placeholder="Rate per Day" required>
            <select name="status">
                <option value="available">Available</option>
                <option value="rented">Rented</option>
            </select>
            <button type="submit" class="save">Save</button>
        </form>
    </div>
</body>
</html>
