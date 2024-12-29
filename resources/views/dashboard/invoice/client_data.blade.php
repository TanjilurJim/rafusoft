<!DOCTYPE html>
<html>
<head>
    <title>Client Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

@php
    $index=1;
@endphp

<body>
    <h1>Client Data</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->phone }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>