<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    function __construct()
    {
        $this->middleware('can:departments.list')->only('index');
        $this->middleware('can:departments.edit')->only('edit, update');
        $this->middleware('can:departments.create')->only('create, store');
        $this->middleware('can:departments.destroy')->only('destroy');
    }

    public function index()
    {
        $departments = Departments::all();
        return view('departments.index', compact('departments'));
    }


    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:departments,code|min:2',
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);
        $departmets = Departments::create($request->all());
        return redirect()->route('departments.index')->with('create', 'ok');
    }


    public function edit($id)
    {
        $departments = Departments::find($id);
        return view('departments.edit', compact('departments' ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required|min:2|unique:departments,code,'. $id,
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);
        $departments = Departments::find($id);
        $departments->update($request->all());
        return redirect()->route('departments.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $departments = Departments::find($id);
        $departments->delete();
        return redirect()->route('departments.index')->with('delete', 'ok');
    }
}
