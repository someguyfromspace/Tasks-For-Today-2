<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="panel">
<h1>Welcome to Tasks for Today</h1>
<p>Organize your work, keep track of deadlines, and manage your tasks in one place.</p>
<a class="btn" href="/tasks">View Task List</a>
<?php if (session()->get('logged_in')): ?> <a class="btn" href="/tasks/new">Create a Task</a><?php else: ?> <a class="btn" href="/login">Log in to manage tasks</a><?php endif; ?>
</div>
<div class="panel">
<h2>Upcoming active tasks</h2>
<?php if (empty($tasks)): ?><p class="muted">There are no active tasks yet.</p><?php else: ?>
<ul><?php foreach ($tasks as $task): ?><li><strong><?= esc($task['title']) ?></strong> — <?= esc($task['task_date']) ?></li><?php endforeach; ?></ul>
<?php endif; ?>
</div>
<?= $this->endSection() ?>
