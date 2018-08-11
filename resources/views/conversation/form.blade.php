<form id="conversation-form" action="{{ route('conversation.store') }}" method="POST">
	@csrf
	<div class="form-group">
		<textarea id="conversation-form-body" name="body" class="form-control"></textarea>
		<input type="hidden" name="receiver_id" value="{{ $sender_id }}">
	</div>
	<button type="submit" class="btn btn-primary btn-block">Send</button>
</form>

@section('scripts')

<script>
  $( document ).ready(function() {

  	$( "#conversation-form" ).on( "submit", function( event ) {
	    
	    event.preventDefault();

		var request = $.ajax({
		  url: '{{ route('api.conversation.store') }}',
		  method: "POST",
		  data: $( this ).serialize(),
		});

		request.done(function( msg ) {

			$("#conversation-messages").append('{{ Auth::user()->name }}: ' + msg.body + '<br><small>' + msg.created_at + '</small><br>');

            $("#conversation-messages").animate({ scrollTop: $('#conversation-messages').prop("scrollHeight")}, 1000);

		  $("#conversation-messages").animate({ scrollTop: $('#conversation-messages').prop("scrollHeight")}, 1000);

		  $( "#conversation-form-body" ).val('');
		  //console.log(msg);
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  console.log(jqXHR);
		  console.log(textStatus);
		});

	});

  	$("#conversation-messages").animate({ scrollTop: $('#conversation-messages').prop("scrollHeight")}, 1000);
  });
</script>

@append