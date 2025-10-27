<!DOCTYPE html>
<html>
<head>
    <title>Machineries</title>
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
    <h1>Machinery List</h1>
    <div style="text-align:center; margin-bottom:15px;">
        <a href="{{ route('dashboard') }}">⬅ Back to Dashboard</a>
        <a href="{{ route('machineries.create') }}">➕ Add Machinery</a>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Rate/Day</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($machineries as $machinery)
        <tr>
            <td>{{ $machinery->name }}</td>
            <td>{{ $machinery->type }}</td>
            <td>{{ $machinery->rate_per_day }}</td>
            <td>{{ $machinery->status }}</td>
            <td>
                <a class="edit" href="{{ route('machineries.edit', $machinery->id) }}">Edit</a>
                <form action="{{ route('machineries.destroy', $machinery->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="delete" onclick="return confirm('Delete this machinery?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
