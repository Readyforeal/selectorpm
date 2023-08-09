<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class SelectionController extends Controller
{

    public function index(Request $request) {
        $project = Project::where('uid', $request->uid)->first();
        return view('selections', compact('project'));
    }

    public function create(Request $request) {
        $project = Project::where('uid', $request->uid)->first();
        return view('selection.createSelection', compact('project'));
    }
}
