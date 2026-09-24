<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Task Manager' }} | Task Manager</title>
    <style>
        :root { --ink:#202b29; --muted:#6b7773; --paper:#f5f6f0; --panel:#fffef9; --line:#dfe4d8; --accent:#e06b3c; --green:#2e8066; }
        * { box-sizing:border-box; } body { margin:0; color:var(--ink); background:radial-gradient(circle at 10% 0%, #e6efe4 0, transparent 32%), var(--paper); font-family:Georgia, 'Times New Roman', serif; }
        a { color:inherit; text-decoration:none; } button, input, textarea, select { font:inherit; }
        .shell { width:min(1120px, calc(100% - 36px)); margin:0 auto; } header { display:flex; justify-content:space-between; align-items:center; padding:28px 0 54px; }
        .brand { font-size:1.15rem; font-weight:bold; letter-spacing:.02em; } .brand span { color:var(--accent); } .eyebrow { color:var(--accent); font:700 .72rem/1.2 Arial, sans-serif; letter-spacing:.14em; text-transform:uppercase; }
        h1 { max-width:670px; margin:10px 0 34px; font-size:clamp(2.4rem, 6vw, 5rem); line-height:.96; font-weight:normal; letter-spacing:-.04em; } h2 { margin:0; font-size:1.45rem; font-weight:normal; }
        .intro { display:flex; justify-content:space-between; align-items:end; gap:24px; margin-bottom:34px; } .button { display:inline-flex; align-items:center; justify-content:center; border:0; cursor:pointer; padding:12px 18px; border-radius:3px; color:white; background:var(--ink); font:700 .82rem Arial, sans-serif; }
        .button.accent { background:var(--accent); } .button.light { color:var(--ink); background:#eef1e9; } .layout { display:grid; grid-template-columns:minmax(0, 1.6fr) minmax(280px, .8fr); gap:26px; align-items:start; }
        .panel { padding:26px; border:1px solid var(--line); border-radius:5px; background:rgba(255,254,249,.85); box-shadow:0 14px 35px rgba(32,43,41,.05); } .panel-heading { display:flex; justify-content:space-between; align-items:center; gap:12px; margin-bottom:20px; } .count { color:var(--muted); font:700 .75rem Arial, sans-serif; }
        .task { display:grid; grid-template-columns:1fr auto; gap:16px; padding:19px 0; border-top:1px solid var(--line); } .task:first-child { border-top:0; padding-top:0; } .task h3 { margin:0 0 6px; font-size:1.13rem; font-weight:normal; } .task p { margin:0; color:var(--muted); font: .88rem/1.5 Arial, sans-serif; } .task.done h3 { color:var(--muted); text-decoration:line-through; }
        .meta { margin-top:12px; color:var(--muted); font:700 .72rem Arial, sans-serif; } .status { display:inline-block; margin-right:8px; padding:5px 8px; border-radius:20px; color:var(--green); background:#e1f0e8; } .status.pending { color:#a45a2b; background:#f8e9d7; }
        .actions { display:flex; align-items:start; gap:7px; } .icon-button { border:1px solid var(--line); cursor:pointer; padding:7px 9px; border-radius:3px; color:var(--muted); background:transparent; font:700 .7rem Arial, sans-serif; } .icon-button:hover { color:var(--ink); border-color:var(--ink); }
        form label { display:block; margin:0 0 7px; color:var(--muted); font:700 .72rem Arial, sans-serif; text-transform:uppercase; letter-spacing:.08em; } .field { margin-bottom:17px; } input, textarea, select { width:100%; border:1px solid var(--line); border-radius:3px; padding:11px 12px; color:var(--ink); background:#fff; } textarea { min-height:100px; resize:vertical; }
        .form-actions { display:flex; gap:9px; margin-top:22px; } .alert { margin-bottom:22px; padding:13px 15px; border-left:3px solid var(--green); background:#e7f1e9; font: .88rem Arial, sans-serif; } .errors { margin:0 0 22px; padding:13px 15px 13px 30px; border-left:3px solid var(--accent); background:#f9e8df; font: .85rem/1.5 Arial, sans-serif; } .empty { padding:30px 0 8px; color:var(--muted); font: .9rem Arial, sans-serif; } footer { padding:42px 0 28px; color:var(--muted); font: .72rem Arial, sans-serif; }
        @media (max-width:760px) { header { padding-bottom:34px; } .intro { display:block; } .intro .button { margin-top:18px; } .layout { grid-template-columns:1fr; } .task { grid-template-columns:1fr; gap:10px; } .actions { order:2; } }
    </style>
</head>
<body><div class="shell"><header><a class="brand" href="{{ route('tasks.index') }}">day<span>/</span>list</a><span class="eyebrow">Personal task manager</span></header>
@if (session('success')) <div class="alert">{{ session('success') }}</div> @endif
@if ($errors->any()) <ul class="errors">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul> @endif
@yield('content')<footer>Built with Laravel · Keep the small things moving.</footer></div></body>
</html>
