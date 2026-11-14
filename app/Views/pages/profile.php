<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="panel"><h1>Profile</h1>
<?php if (session()->get('logged_in')): ?>
<p><strong>Name:</strong> <?= esc(session()->get('user_name')) ?></p><p><strong>Email:</strong> <?= esc(session()->get('user_email')) ?></p>
<?php else: ?><p>This is a public profile page. <a href="/login">Log in</a> to view your account information.</p><?php endif; ?>
</div>
<?= $this->endSection() ?>
