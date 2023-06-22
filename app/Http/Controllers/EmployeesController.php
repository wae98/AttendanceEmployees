<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Employees;
use App\Models\Workplaces;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('can:departments.list')->only('index');
        $this->middleware('can:departments.edit')->only('edit, update');
        $this->middleware('can:departments.create')->only('create, store');
        $this->middleware('can:departments.destroy')->only('destroy');
    }

    public function index()
    {
        $employees = Employees::all();
        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        $departments = Departments::all();
        $workplaces = Workplaces::all();
        return view('employees.create', compact('departments', 'workplaces'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'birthdate' => 'required|date',
            'department_id' => 'required',
            'workplace_id' => 'required',
        ];

        $messages = [
            'department_id.required' => 'El campo departamento es requerido..',
            'workplace_id.required' => 'El campo area de trabajo es requerido..',
        ];
        $validatedData = $request->validate($rules, $messages);
        $employees = Employees::create($request->all());
        return redirect()->route('employees.index')->with('create', 'ok');
    }


    public function edit($id)
    {
        $departments = Departments::all();
        $workplaces = Workplaces::all();
        $employees = Employees::find($id);
        return view('employees.edit', compact('employees', 'departments', 'workplaces' ));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'birthdate' => 'required|date',
            'department_id' => 'required',
            'workplace_id' => 'required',
        ];

        $messages = [
            'workplace_id.required' => 'El campo area de trabajo es requerido..',
        ];
        $validatedData = $request->validate($rules, $messages);
        $employees = Employees::find($id);
        $employees->update($request->all());
        return redirect()->route('employees.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();
        return redirect()->route('employees.index')->with('delete', 'ok');
    }
}
