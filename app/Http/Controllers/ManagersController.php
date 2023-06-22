<?php

namespace App\Http\Controllers;

use App\Models\Managers;
use Illuminate\Http\Request;

class ManagersController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('can:managers.list')->only('index');
        $this->middleware('can:managers.edit')->only('edit, update');
        $this->middleware('can:managers.create')->only('create, store');
        $this->middleware('can:managers.destroy')->only('destroy');
    }

    public function index()
    {
        $managers = Managers::all();
        return view('managers.index', compact('managers'));
    }


    public function create()
    {
        return view('managers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'phone_number' => 'required|min:8'
        ]);
        $managers = Managers::create($request->all());
        return redirect()->route('managers.index')->with('create', 'ok');
    }


    public function edit($id)
    {
        $managers = Managers::find($id);
        return view('managers.edit', compact('managers' ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'phone_number' => 'required|min:8'
        ]);
        $managers = Managers::find($id);
        $managers->update($request->all());
        return redirect()->route('managers.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $managers = Managers::find($id);
        $managers->delete();
        return redirect()->route('managers.index')->with('delete', 'ok');
    }
}
