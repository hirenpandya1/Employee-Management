<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            width: 60%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px #0000001a;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="file"], input[type="radio"], input[type="checkbox"] {
            display: inline-block;
            margin-top: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="First Name">First Name:</label>
    <input type="text" name="first_name" value="{{ $employee->first_name }}" required><br>

    <label for="Last Name">Last Name:</label>
    <input type="text" name="last_name" value="{{ $employee->last_name }}" required><br>

    <label for="E-mail">E-mail:</label>
    <input type="email" name="email" value="{{ $employee->email }}" required><br>

    <label for="Mobile No">Mobile No:</label>
    <input type="text" name="mobile_no" value="{{ $employee->mobile_no }}" required><br>

    <label for="Country Code">Country Code:</label>
    <input type="text" name="country_code" value="{{ $employee->country_code }}" required><br>

    <label for="Address">Address:</label>
    <input type="text" name="address" value="{{ $employee->address }}" required><br>

    <label for="Gender">Gender:</label>
    <input type="radio" name="gender" value="male" {{ $employee->gender == 'male' ? 'checked' : '' }}> Male
    <input type="radio" name="gender" value="female" {{ $employee->gender == 'female' ? 'checked' : '' }}> Female<br>

    <label for="Hobbies">Hobbies:</label>
    {{-- @php
        $hobbies = json_decode($employee->hobby, true) ?? [];
    @endphp
    <input type="checkbox" name="hobby[]" value="reading" {{ in_array('reading', $hobbies) ? 'checked' : '' }}> Reading
    <input type="checkbox" name="hobby[]" value="travelling" {{ in_array('travelling', $hobbies) ? 'checked' : '' }}> Travelling
    <input type="checkbox" name="hobby[]" value="sports" {{ in_array('sports', $hobbies) ? 'checked' : '' }}> Sports<br> --}}

    <label for="Photo">Photo:</label>
    <input type="file" name="photo"><br>
    <button type="submit">Update Employee</button>
    </form>
</body>
</html>
