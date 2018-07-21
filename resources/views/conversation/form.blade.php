<form action="{{ route('conversation.store') }}" method="POST">
	@csrf
	<div class="form-group">
		<textarea id="body" name="body" class="form-control"></textarea>
		<input type="hidden" name="receiver_id" value="{{ $sender_id }}">
	</div>
	<button type="submit" class="btn btn-primary btn-block">Send</button>
</form>