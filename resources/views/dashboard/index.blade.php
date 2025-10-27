<!DOCTYPE html>
<html>
<head>
    <title>HarvestHire (Lite)</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a8e063, #56ab2f); /* green gradient */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(6px);
            border-radius: 30px;
            padding: 40px 60px;
            text-align: center;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.2);
        }

        h1 {
            color: #2e7d32; /* deep green */
            margin-bottom: 25px;
            font-size: 28px;
        }

        .btn {
            display: inline-block;
            margin: 12px;
            padding: 14px 28px;
            background: linear-gradient(135deg, #4caf50, #81c784);
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: linear-gradient(135deg, #388e3c, #66bb6a);
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>🌾 HarvestHire (Lite)</h1>
        <a href="{{ route('machineries.index') }}" class="btn">Manage Machineries</a>
        <a href="{{ route('rentals.index') }}" class="btn">Manage Rentals</a>
    </div>
</body>
</html>
