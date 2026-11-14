<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'title', 'description', 'task_date', 'is_archived'];
    protected $useTimestamps = true;
    protected $returnType = 'array';

    public function activeTasks()
    {
        return $this->where('is_archived', 0)->orderBy('task_date', 'ASC')->findAll();
    }
}
