<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function getAddProject()
    {
        return view('pages.project-create');
    }

    public function getEditProject($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $project = Project::find($id);

            if ($project) {
                return view('pages.project-edit', compact('project'));
            }

            return redirect()->route('get.dashboard')->with('error', 'Invalid project ID.');
        } catch (\Exception $e) {
            return redirect()->route('get.dashboard')->with('error', 'Invalid or expired link.');
        }
    }
}
