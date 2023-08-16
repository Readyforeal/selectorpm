<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $projects = Project::get();
        return view('projects', compact('projects'));
    }

    public function create() {
        return view('project.createProject');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $uid = uniqid();

        $project = Project::create([
        'name' => $data['name'],
            'address' => $request['address'],
            'uid' => $uid,
        ]);

        return redirect()->route('project.view', [$project->uid]);
    }

    public function view(Request $request) {
        $project = Project::where('uid', $request->uid)->first();
        return view('project.viewProject', compact('project'));
    }

    public function edit(Request $request) {
        $project = Project::where('uid', $request->uid)->first();
        return view('project.editProject', compact('project'));
    }

    public function update(Request $request) {
        $project = Project::where('uid', $request->uid)->first();
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $project->update([
            'name' => $data['name'],
            'address' => $data['address'],
        ]);

        return view('project.viewProject', compact('project'));
    }

    public function destroy(Request $request) {
        $project = Project::where('uid', $request->uid)->first();
        $project->delete();
        return redirect()->route('projects.index');
    }
}
