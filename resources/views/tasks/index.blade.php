@extends('layouts.app', ['title' => 'Your tasks'])
@section('content')
<div class="intro"><div><div class="eyebrow">A clear mind starts here</div><h1>Make room for what matters.</h1></div><a class="button accent" href="{{ route('tasks.create') }}">+ Add task</a></div>
<div class="layout"><section class="panel"><div class="panel-heading"><h2>All tasks</h2><span class="count">{{ $tasks->count() }} total</span></div>
@forelse ($tasks as $task)
<article class="task {{ $task->status === 'Completed' ? 'done' : '' }}"><div><h3>{{ $task->task_name }}</h3><p>{{ $task->description ?: 'No details added.' }}</p><div class="meta"><span class="status {{ $task->status === 'Pending' ? 'pending' : '' }}">{{ $task->status }}</span>{{ $task->due_date ? 'Due ' . $task->due_date->format('M j, Y') : 'No deadline' }}</div></div><div class="actions"><form method="POST" action="{{ route('tasks.status', $task) }}">@csrf @method('PATCH')<button class="icon-button" type="submit">{{ $task->status === 'Completed' ? 'Reopen' : 'Done' }}</button></form><a class="icon-button" href="{{ route('tasks.edit', $task) }}">Edit</a><form method="POST" action="{{ route('tasks.destroy', $task) }}" onsubmit="return confirm('Delete this task?')">@csrf @method('DELETE')<button class="icon-button" type="submit">Delete</button></form></div></article>
@empty <p class="empty">Nothing here yet. Add your first task and give your day a shape.</p> @endforelse
</section><aside class="panel"><div class="eyebrow">A little momentum</div><h2 style="margin-top:10px;">{{ $tasks->where('status', 'Completed')->count() }} tasks completed.</h2><p style="color:var(--muted); line-height:1.6;">Capture the next thing, then mark it done when it is behind you.</p></aside></div>
@endsection
