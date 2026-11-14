<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="panel" style="max-width:500px;margin:auto">
<h1>Login</h1>
<?php if (isset($validation)): ?><div class="error"><?= $validation->listErrors() ?></div><?php endif; ?>
<form method="post" action="/login"><?= csrf_field() ?>
<label for="email">Email</label><input id="email" type="email" name="email" required value="<?= esc(old('email')) ?>">
<label for="password">Password</label><input id="password" type="password" name="password" required>
<button type="submit">Log In</button>
</form>
<p class="muted">Demo: demo@example.com / password123</p>
</div>
<?= $this->endSection() ?>
