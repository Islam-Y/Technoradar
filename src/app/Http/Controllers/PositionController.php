<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index()
    {
        $positions = Position::all();

        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Position::create($request->all());

        return redirect()->route('position.index')->with('success','Position created successfully.');

    }

    public function show(Position $position)
    {
        return view('positions.show',compact('position'));
    }

    public function edit(Position $position)
    {
        return view('positions.edit',compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $position->update($request->all());

        return redirect()->route('position.index')->with('success','Position updated successfully');
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('position.index')
            ->with('success','position deleted successfully');
    }
}
