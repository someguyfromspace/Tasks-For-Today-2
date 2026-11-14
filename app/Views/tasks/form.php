<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="panel">
<h1><?= esc($title) ?></h1>
<?php if (isset($validation)): ?><div class="error"><?= $validation->listErrors() ?></div><?php endif; ?>
<?php $editing = ! empty($task); ?>
<form method="post" action="<?= $editing ? '/tasks/update/' . $task['id'] : '/tasks/create' ?>">
<?= csrf_field() ?>
<label for="title">Task title *</label>
<input id="title" name="title" maxlength="255" required value="<?= esc(old('title', $task['title'] ?? '')) ?>">
<label for="description">Description</label>
<textarea id="description" name="description" rows="4"><?= esc(old('description', $task['description'] ?? '')) ?></textarea>
<label for="task_date">Task date *</label>
<input id="task_date" type="date" name="task_date" required value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>">
<button type="submit"><?= $editing ? 'Save Changes' : 'Create Task' ?></button> <a href="/tasks">Cancel</a>
</form>
<p class="muted">Fields marked * are required.</p>
</div>
<?= $this->endSection() ?>
