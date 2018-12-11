<a href="
{{ route('thread.show', $notification->data['thread']['id']) }}
">

	{{-- {{'notificaiton_'.snake_case(class_basename($notification->type)) }} --}}

	{{ $notification->data['user']['name']}} commented on {{ $notification->data['thread']['subject'] }}
</a>