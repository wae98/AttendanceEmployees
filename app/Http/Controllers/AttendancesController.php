<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use App\Models\Employees;
use App\Models\Statuses;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('can:attendances.list')->only('index');
        $this->middleware('can:attendances.edit')->only('edit, update');
        $this->middleware('can:attendances.create')->only('create, store');
        $this->middleware('can:attendances.destroy')->only('destroy');
    }

    public function index()
    {
        $attendances = Attendances::all();
        return view('attendances.index', compact('attendances'));
    }


    public function create()
    {
        $employees = Employees::all();
        $statuses = Statuses::all();
        return view('attendances.create', compact('employees', 'statuses'));
    }

    public function store(Request $request)
    {
        $rules = [
            'date' => 'required|date',
            'employee_id' => 'required',
            'status_id' => 'required',
        ];

        $messages = [
            'employee_id.required' => 'El campo empleado es requerido..',
            'status_id.required' => 'El campo status es requerido..',
        ];
        $validatedData = $request->validate($rules, $messages);
        $attendances = Attendances::create($request->all());
        return redirect()->route('attendances.index')->with('create', 'ok');
    }


    public function edit($id)
    {
        $employees = Employees::all();
        $statuses = Statuses::all();
        $attendances = Attendances::find($id);
        return view('attendances.edit', compact('employees', 'statuses', 'attendances'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'date' => 'required|date',
            'employee_id' => 'required',
            'status_id' => 'required',
        ];

        $messages = [
            'employee_id.required' => 'El campo empleado es requerido..',
            'status_id.required' => 'El campo status es requerido..',
        ];
        $validatedData = $request->validate($rules, $messages);
        $attendances = Attendances::find($id);
        $attendances->update($request->all());
        return redirect()->route('attendances.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $attendances = Attendances::find($id);
        $attendances->delete();
        return redirect()->route('attendances.index')->with('delete', 'ok');
    }
}
