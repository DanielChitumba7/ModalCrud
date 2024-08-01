<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::simplepaginate(5);
        return view('Employee.index', compact('employees'));
    }

    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function edit($id)
    {
        $employees = Employee::find($id);
        return view('Employee.index', compact('employees'));

    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->route('Employee.index');
    }
}