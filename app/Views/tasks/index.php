<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="panel">
<h1>Task List</h1>
<p>Only active tasks are shown. Archived tasks are hidden and retained in the database.</p>
<?php if (session()->get('logged_in')): ?><a class="btn" href="/tasks/new">+ New Task</a><?php else: ?><p><a href="/login">Log in</a> to create, edit, or archive tasks.</p><?php endif; ?>
<?php if (empty($tasks)): ?><p class="muted">No active tasks found.</p><?php else: ?>
<table><thead><tr><th>Title</th><th>Description</th><th>Task date</th><?php if (session()->get('logged_in')): ?><th>Actions</th><?php endif; ?></tr></thead><tbody>
<?php foreach ($tasks as $task): ?><tr>
<td><?= esc($task['title']) ?></td><td><?= esc($task['description']) ?></td><td><?= esc($task['task_date']) ?></td>
<?php if (session()->get('logged_in')): ?><td><a class="btn" href="/tasks/edit/<?= $task['id'] ?>">Edit</a>
<form method="post" action="/tasks/archive/<?= $task['id'] ?>" style="display:inline" onsubmit="return confirm('Archive this task?')"><?= csrf_field() ?><button class="danger" type="submit">Archive</button></form></td><?php endif; ?>
</tr><?php endforeach; ?></tbody></table>
<?php endif; ?>
</div>
<?= $this->endSection() ?>
