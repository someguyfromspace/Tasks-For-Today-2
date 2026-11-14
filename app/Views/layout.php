<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Tasks for Today') ?> | Tasks for Today</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font:16px/1.5 Arial,sans-serif;background:#f4f6fb;color:#202938}
        header{background:#172554;color:white;padding:18px 5%;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap}
        header a{color:white;text-decoration:none;margin-right:16px}main{max-width:950px;margin:32px auto;padding:0 18px}
        .panel{background:white;padding:24px;border-radius:12px;box-shadow:0 4px 18px #17255412;margin-bottom:18px}
        input,textarea{width:100%;padding:11px;margin:6px 0 15px;border:1px solid #cbd5e1;border-radius:6px}
        button,.btn{display:inline-block;background:#1d4ed8;color:white;padding:9px 14px;border:0;border-radius:6px;text-decoration:none;cursor:pointer}
        .danger{background:#b91c1c}.muted{color:#64748b}.alert{padding:12px;border-radius:6px;background:#e0f2fe;margin-bottom:14px}
        .error{color:#b91c1c}table{width:100%;border-collapse:collapse}th,td{text-align:left;padding:12px;border-bottom:1px solid #e2e8f0}
        footer{text-align:center;padding:25px;color:#64748b}
    </style>
</head>
<body>
<header>
    <strong>Tasks for Today</strong>
    <nav>
        <a href="/">Welcome</a><a href="/tasks">Task List</a><a href="/profile">Profile</a><a href="/about">About</a>
        <?php if (session()->get('logged_in')): ?>
            <span><?= esc(session()->get('user_name')) ?></span> <a href="/logout">Logout</a>
        <?php else: ?><a href="/login">Login</a><?php endif; ?>
    </nav>
</header>
<main>
    <?php if ($msg = session()->getFlashdata('success')): ?><div class="alert"><?= esc($msg) ?></div><?php endif; ?>
    <?php if ($msg = session()->getFlashdata('error')): ?><div class="alert"><?= esc($msg) ?></div><?php endif; ?>
    <?= $this->renderSection('content') ?>
</main>
<footer>IT0049 Web System Technologies · Tasks for Today Management System</footer>
</body>
</html>
