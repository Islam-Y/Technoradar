<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all()->pluck('name', 'id')->all();
        $positions = Position::all()->pluck('name', 'id')->all();

        return view('employees.create', [
            'departments' => $departments,
            'positions' => $positions
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required',
            'department_id' => 'required'
        ]);

        Employee::create($request->all());

        return redirect()->route('employee.index')->with('success','Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        $departments = Department::all()->pluck('name', 'id')->all();
        $positions = Position::all()->pluck('name', 'id')->all();

        return view('employees.show',[
            'employee' => $employee,
            'departments' => $departments,
            'positions' => $positions
        ]);
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all()->pluck('name', 'id')->all();
        $positions = Position::all()->pluck('name', 'id')->all();

        return view('employees.edit',[
            'employee' => $employee,
            'departments' => $departments,
            'positions' => $positions
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required',
            'department_id' => 'required'
        ]);

        $employee->update($request->all());

        return redirect()->route('employee.index')->with('success','Employee updated successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index')
            ->with('success','Employee deleted successfully');
    }
}
