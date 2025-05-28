<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function addTask($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $project = Project::find($id);

            if ($project) {
                return view('pages.task-create', compact('project'));
            }

            return redirect()->route('get.dashboard')->with('error', 'Invalid project ID.');
        } catch (\Exception $e) {
            return redirect()->route('get.dashboard')->with('error', 'Invalid or expired link.');
        }
    }

    public function showTask($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $project = Project::find($id);

            if ($project) {
                $projectId = $project->id;

                return view('pages.task-show', compact('projectId'));
            }

            return redirect()->route('get.dashboard')->with('error', 'Invalid project ID.');
        } catch (\Exception $e) {
            return redirect()->route('get.dashboard')->with('error', 'Invalid or expired link.');
        }
    }

    public function showTaskActivityLog($encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $task = Task::find($id);

            if ($task) {
                $taskId = $task->id;

                return view('pages.activity-logs', compact('taskId'));
            }

            return redirect()->route('get.dashboard')->with('error', 'Invalid project ID.');
        } catch (\Exception $e) {
            return redirect()->route('get.dashboard')->with('error', 'Invalid or expired link.');
        }
    }
}
