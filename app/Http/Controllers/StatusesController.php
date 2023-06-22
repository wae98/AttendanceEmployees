<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('can:statuses.list')->only('index');
        $this->middleware('can:statuses.edit')->only('edit, update');
        $this->middleware('can:statuses.create')->only('create, store');
        $this->middleware('can:statuses.destroy')->only('destroy');
    }

    public function index()
    {
        $statuses = Statuses::all();
        return view('statuses.index', compact('statuses'));
    }


    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
        $statuses = Statuses::create($request->all());
        return redirect()->route('statuses.index')->with('create', 'ok');
    }


    public function edit($id)
    {
        $statuses = Statuses::find($id);
        return view('statuses.edit', compact('statuses' ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);
        $statuses = Statuses::find($id);
        $statuses->update($request->all());
        return redirect()->route('statuses.index')->with('update', 'ok');
    }

    public function destroy($id)
    {
        $statuses = Statuses::find($id);
        $statuses->delete();
        return redirect()->route('statuses.index')->with('delete', 'ok');
    }
}
