<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
  public function createPage()
  {
    $categories = Category::where('user_id', Auth::user()->id)->get();
    return view('panel.tasks.create', compact('categories'));
  }

  public function addTask(Request $req)
  {

    $req->validate([
      'title' => 'required|max:15|min:3'
    ]);

    $task = new Task();
    $task->category_id = $req->category;
    $task->title = $req->title;
    $task->content = $req->content;
    $task->status = $req->status;
    $task->deadline = $req->deadline;
    $task->save();
    return redirect()->route('panel.indexTask')->with(['success' => 'Kategori başarıyla oluşturuldu']);
  }

  public function indexPage()
  {

    // $task=Task::first();
    $user = Auth::user();
    $tasks = $user->getTasks;
    
  
    return view('panel.tasks.index', compact('tasks'));
  }
}
