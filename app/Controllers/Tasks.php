<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    private function model(): TaskModel { return new TaskModel(); }

    public function index()
    {
        return view('tasks/index', ['title' => 'Task List', 'tasks' => $this->model()->activeTasks()]);
    }

    public function new()
    {
        return view('tasks/form', ['title' => 'New Task', 'task' => null]);
    }

    public function create()
    {
        $rules = ['title' => 'required|min_length[2]|max_length[255]', 'task_date' => 'required|valid_date[Y-m-d]'];
        if (! $this->validate($rules)) {
            return view('tasks/form', ['title' => 'New Task', 'task' => null, 'validation' => $this->validator]);
        }
        $this->model()->insert([
            'user_id' => session()->get('user_id'),
            'title' => trim($this->request->getPost('title')),
            'description' => trim((string) $this->request->getPost('description')),
            'task_date' => $this->request->getPost('task_date'),
            'is_archived' => 0,
        ]);
        return redirect()->to('/tasks')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = $this->model()->where('is_archived', 0)->find($id);
        if (! $task) return redirect()->to('/tasks')->with('error', 'Task not found.');
        return view('tasks/form', ['title' => 'Edit Task', 'task' => $task]);
    }

    public function update($id)
    {
        $task = $this->model()->where('is_archived', 0)->find($id);
        if (! $task) return redirect()->to('/tasks')->with('error', 'Task not found.');
        $rules = ['title' => 'required|min_length[2]|max_length[255]', 'task_date' => 'required|valid_date[Y-m-d]'];
        if (! $this->validate($rules)) {
            return view('tasks/form', ['title' => 'Edit Task', 'task' => $task, 'validation' => $this->validator]);
        }
        $this->model()->update($id, [
            'title' => trim($this->request->getPost('title')),
            'description' => trim((string) $this->request->getPost('description')),
            'task_date' => $this->request->getPost('task_date'),
        ]);
        return redirect()->to('/tasks')->with('success', 'Task updated successfully.');
    }

    public function archive($id)
    {
        $task = $this->model()->where('is_archived', 0)->find($id);
        if (! $task) return redirect()->to('/tasks')->with('error', 'Task not found.');
        $this->model()->update($id, ['is_archived' => 1]);
        return redirect()->to('/tasks')->with('success', 'Task archived. It was not permanently deleted.');
    }
}
