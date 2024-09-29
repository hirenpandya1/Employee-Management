<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            border-radius: 50%;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        form {
            display: inline;
        }
        div {
            margin-bottom: 15px;
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Employees</h2>
    <a href="{{ route('employees.create') }}">Add Employee</a>
    @if(session('success'))
       <div>{{ session('success') }}</div>
    @endif
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-MAIL</th>
            <th>Mobile No</th>
            <th>Country Code</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Hobbies</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->mobile_no }}</td>
            <td>{{ $employee->country_code }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ ucfirst($employee->gender) }}</td>
             {{-- <td>
                @if($employee->hobby)
                {{ implode(',', json_decode($employee->hobby)) }}
                @else
                No Hobbies
                @endif
            </td>  --}}
            <td>
                @if($employee->photo)
                <img src="{{ asset('storage/' .$employee->photo) }}" alt="photo" width="50">
                @else
                No Photo
                @endif
            </td>
            <td>
                <a href="{{ route('employees.edit', $employee) }}">Edit</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                 @csrf
                 @method('DELETE')
                 <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
