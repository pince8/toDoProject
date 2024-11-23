<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    public function createPage(){

        return view('panel.tasks.create');
    }

    public function addTask(Request $req)
    {
 
        $req->validate([
            'title' => 'required|max:15|min:3'
        ]);
    
        $task = new Task();
        $task->title = $req->title;
        $task->content = $req->content;
        $task->status = $req->status;
        $task->deadline = $req->deadline;
        $task->save();
    
        
    }
    
}
