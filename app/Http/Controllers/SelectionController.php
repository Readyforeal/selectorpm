<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Location;
use App\Models\Selection;

class SelectionController extends Controller
{

    public function index(Request $request)
    {
        $project = Project::where('uid', $request->uid)->first();
        return view('selections', compact('project'));
    }

    public function create(Request $request)
    {
        $project = Project::where('uid', $request->uid)->first();
        return view('selection.createSelection', compact('project'));
    }

    public function edit(Request $request)
    {
        $project = Project::where('uid', $request->uid)->first();
        $selection = Selection::find($request->selectionId);
        return view('selection.editSelection', compact('project', 'selection'));
    }

    public function view(Request $request)
    {
        $project = Project::where('uid', $request->uid)->first();
        $selection = Selection::find($request->selectionId);
        return view('selection.viewSelection', compact('project', 'selection'));
    }

    public function store(Request $request)
    {
        $project = Project::where('uid', $request->uid)->first();

        $data = $request->validate([
            'title' => 'required',
            'needed' => '',
            'name' => '',
            'item_number' => '',
            'supplier' => '',
            'link' => '',
            'image' => '',
            'quantity' => '',
            'dimensions' => '',
            'finish' => '',
            'color' => '',
            'category' => '',
            'locations' => '',
        ]);

        $selection = $project->selections()->create([
            'title' => $data['title'],
            'needed' => $data['needed'] = 'on' ? false : true,
            'name' => $data['name'],
            'item_number' => $data['item_number'],
            'supplier' => $data['supplier'],
            'link' => $data['link'],
            'image' => $data['image'],
            'quantity' => $data['quantity'],
            'dimensions' => $data['dimensions'],
            'finish' => $data['finish'],
            'color' => $data['color'],
        ]);

        if (isset($data['category'])) {
            $selection->categories()->attach($data['category']);
        }

        if (isset($data['locations'])) {
            foreach ($data['locations'] as $locationId) {
                $selection->locations()->attach($locationId);
            }
        }

        return redirect()->route('selections.index', $project->uid);
    }
}
