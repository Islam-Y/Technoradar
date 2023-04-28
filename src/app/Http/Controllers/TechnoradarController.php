<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnoradarRequest;
use App\Http\Requests\UpdateTechnoradarRequest;
use App\Models\Technoradar;
use Illuminate\Http\Request;

class TechnoradarController extends Controller
{

    public function index()
    {
        $technoradars = Technoradar::all();

        return view('technoradars.index', compact('technoradars'));
    }


    public function create()
    {
        $categories = [
            'Tools' => 'Tools',
            'Techniques' => 'Techniques',
            'Platforms' => 'Platforms',
            'Languages and frameworks' => 'Languages and frameworks'
        ];

        $user_types = [
            'ADOPT' => 'ADOPT',
            'TRIAL' => 'TRIAL',
            'ASSESS' => 'ASSESS',
            'HOLD' => 'HOLD'
        ];
        return view('technoradars.create', [
            'categories' => $categories,
            'user_types' => $user_types,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'user_type' => 'required',
        ]);

        Technoradar::create($request->all());

        return redirect()->route('technoradar.index')->with('success','Technoradar created successfully.');
    }

    public function show(Technoradar $technoradar)
    {
        return view('technoradars.show',compact('technoradar'));
    }

    public function edit(Technoradar $technoradar)
    {
        return view('technoradars.edit',compact('technoradar'));
    }

    public function update(Request $request, Technoradar $technoradar)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'user_type' => 'required',
        ]);

        $technoradar->update($request->all());

        return redirect()->route('technoradar.index')->with('success','Technoradar updated successfully');
    }

    public function destroy(Technoradar $technoradar)
    {
        $technoradar->delete();

        return redirect()->route('technoradar.index')
            ->with('success','Technoradar deleted successfully');
    }
}
