<div class="list-group">
@foreach($users as $user)

	@if($user->id != Auth::user()->id)
    <a href="{{ route('conversation.show', $user->id) }}" class="list-group-item list-group-item-action @if(isset($sender_id) and $user->id == $sender_id) active @endif">
        
        {{ $user->name }}

    </a>
    @endif

@endforeach
</div>