<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    //
    function ground_team() : View {

        $employees = Employee::where('function', '!=', 'controller')->get();

        return view('teams.ground', [
            'employees' => $employees
        ]);
    }

    function controllers() : View {
        $employees = Employee::where('function', 'controller')->get();

        return view('teams.controllers', [
            'employees' => $employees
        ]);
    }

    function add_employee(Request $request)  {


        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'employee_id' => 'required|string|unique:employees,employee_id',
            'function' => 'required|string',
            'email' => 'nullable',
            'phone' => 'nullable',
            'hire_date' => 'nullable|string',
        ]);

        $validatedData['uuid'] = (string) Str::uuid();

        Employee::create($validatedData);

        return redirect()->back()->with('success', 'Employee added successfully');
    }
}
