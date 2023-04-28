<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }


    public function create()
    {
        $companies = Company::all()->pluck('name', 'id')->all();;

        return view('departments.create', compact('companies'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
        ]);

        Department::create($request->all());

        return redirect()->route('department.index')->with('success','Department created successfully.');
    }

    public function show(Department $department)
    {
        $companies = Company::all()->pluck('name', 'id')->all();
        return view('departments.show',[
            'department' => $department,
            'companies' => $companies
        ]);
    }

    public function edit(Department $department)
    {
        $companies = Company::all()->pluck('name', 'id')->all();

        return view('departments.edit',[
            'department' => $department,
            'companies' => $companies
        ]);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required',
        ]);

        $department->update($request->all());

        return redirect()->route('department.index')->with('success','Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('department.index')
            ->with('success','department deleted successfully');
    }
}
