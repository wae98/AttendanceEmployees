<?php

namespace App\Http\Controllers;

use App\Models\Managers;
use App\Models\Workplaces;
use Illuminate\Http\Request;
use MongoDB\Driver\Manager;

class WorkplacesController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('can:workplaces.list')->only('index');
        $this->middleware('can:workplaces.edit')->only('edit, update');
        $this->middleware('can:workplaces.create')->only('create, store');
        $this->middleware('can:workplaces.destroy')->only('destroy');
    }

    public function index()
    {
        $workplaces = Workplaces::all();
        return view('workplaces.index', compact('workplaces'));
    }


    public function create()
    {
        $managers = Managers::all();
        return view('workplaces.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'manager_id' => 'required',
        ];

        $messages = [
            'manager_id.required' => 'El campo manager es requerido..',
        ];
        $validatedData = $request->validate($rules, $messages);
        $employees = Workplaces::create($request->all());
        return redirect()->route('workplaces.index')->with('create', 'ok');
    }


    public function edit($id)
    {
        $managers = Managers::all();
        $workplaces = Workplaces::find($id);
        return view('workplaces.edit', compact('workplaces', 'managers'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'manager_id' => 'required',
        ];

        $messages = [
            'manager_id.required' => 'El campo manager es requerido..',
        ];
        $validatedData = $request->validate($rules, $messages);
        $workplaces = Workplaces::find($id);
        $workplaces->update($request->all());
        return redirect()->route('workplaces.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $workplaces = Workplaces::find($id);
        $workplaces->delete();
        return redirect()->route('employees.index')->with('delete', 'ok');
    }
}
