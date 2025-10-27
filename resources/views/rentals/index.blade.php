<!DOCTYPE html>
<html>
<head>
    <title>Rentals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            margin: 0;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: "HarvestHire (Lite)";
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 80px;
            font-weight: bold;
            color: rgba(0, 100, 0, 0.08);
            white-space: nowrap;
            z-index: 0;
        }

        h1 {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            margin: 5px;
            display: inline-block;
            padding: 8px 15px;
            background: #2e7d32;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
            font-size: 14px;
        }
        a:hover { background: #1b5e20; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            z-index: 1;
            position: relative;
        }

        th, td {
            border: none;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #66bb6a;
            color: #fff;
            text-transform: uppercase;
            font-size: 13px;
        }

        tr:nth-child(even) { background: #f9fbe7; }

        form { display: inline; }

        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
        }

        .edit { background: #6b8e23; color: #fff; }
        .edit:hover { background: #556b2f; }

        .delete { background: #556b2f; color: #fff; }
        .delete:hover { background: #3b4d1e; }
    </style>
</head>
<body>
    <h1>Rental Records</h1>
    <div style="text-align:center; margin-bottom:15px;">
        <a href="{{ route('dashboard') }}">⬅ Back to Dashboard</a>
        <a href="{{ route('rentals.create') }}">➕ Add Rental</a>
    </div>
    <table>
        <tr>
            <th>Machinery</th>
            <th>Renter Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Actions</th>
        </tr>
        @foreach($rentals as $rental)
        <tr>
            <td>{{ $rental->machinery->name }}</td>
            <td>{{ $rental->renter_name }}</td>
            <td>{{ $rental->rent_date }}</td>
            <td>{{ $rental->return_date }}</td>
            <td>
                <a class="edit" href="{{ route('rentals.edit', $rental->id) }}">Edit</a>
                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete" onclick="return confirm('Delete this rental?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
