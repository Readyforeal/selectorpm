<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Location;
use App\Models\Selection;

class SelectionController extends Controller
{
    private $project;
    private $selection;

    public function __construct(Request $request) {
        $this->project = Project::where('uid', $request->uid)->first();
        if($request->selectionId) {
            $this->selection = Selection::find($request->selectionId);
        }
    }

    public function index(Request $request)
    {
        return view('selections', [
            'project' => $this->project
        ]);
    }

    public function create(Request $request)
    {
        return view('selection.createSelection', [
            'project' => $this->project
        ]);
    }

    public function edit(Request $request)
    {
        return view('selection.editSelection', [
            'project' => $this->project,
            'selection' => $this->selection,
        ]);
    }

    public function view(Request $request)
    {
        return view('selection.viewSelection', [
            'project' => $this->project,
            'selection' => $this->selection,
        ]);
    }

    public function store(Request $request)
    {
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

        $selection = $this->project->selections()->create([
            'title' => $data['title'],
            'needed' => isset($data['needed']),
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

        return redirect()->route('selections.index', $this->project->uid);
    }

    public function update(Request $request) {
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
            'categories' => 'nullable|array|min:1',
            'locations' => 'nullable|array|min:1',
        ]);
        
        $this->selection->update([
            'title' => $data['title'],
            'needed' => isset($data['needed']),
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

        if (isset($data['categories'])) {
            $this->selection->categories()->sync($data['categories']);
        } else {
            $this->selection->categories()->sync([]);
        }

        if (isset($data['locations'])) {
            $this->selection->locations()->sync($data['locations']);
        } else {
            $this->selection->locations()->sync([]);
        }

        return view('selection.viewSelection', [
            'project' => $this->project,
            'selection' => $this->selection,
        ]);
    }

    public function destroy(Request $request) {
        $this->selection->delete();
        return redirect()->route('selections.index', $this->project->uid);
    }
}
