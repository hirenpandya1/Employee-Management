<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:employees',
        'mobile_no' => 'required',
        'country_code' => 'required',
        'address' => 'required',
        'gender' => 'required',
        'hobby' => 'array',
        'photo' => 'image|nullable|max:1999',
    ]);

    $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null;

    Employee::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'mobile_no' => $request->mobile_no,
        'country_code' => $request->country_code,
        'address' => $request->address,
        'gender' => $request->gender,
        'hobby' => json_encode($request->hobby),
        'photo' => $photoPath,
    ]);

    return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit' ,compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees,email, ' .$employee->id,
            'mobile_no' => 'required',
            'country_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'hobby' => 'array',
            'photo' => 'image|nullable|max:1999',
        ]);

        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos', 'public') : $employee->photo;

        $employee->update(array_merge($request->all(),['photo' => $photoPath]));

        return redirect()->route('employees.index')->with('success','Employee Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Delete Successfully.');
    }
}
