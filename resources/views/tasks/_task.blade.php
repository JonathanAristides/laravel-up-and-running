{{--#10--}}
<li>
    {{ $task->title }}
    @if(!$task->completed)
        <button>Mark as done</button>
    @endif
</li>
