@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

        	@include('common.users_list', [
        		'users' => $users
        	])

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Conversation</div>

                <div class="card-body">

                	<div id="conversation-messages" style="overflow-y: scroll;height: 500px;">

                	@foreach($messages as $message)

                		<small>{{ $message->created_at }}</small> 

                		<br>

                		{{ $message->sender->name }}: {{ $message->body }}

                		<br>

                	@endforeach

                	</div>

		        	@include('conversation.form', [
		        		
		        	])

                </div>
            </div>
        </div>
    </div>
</div>
@append

@section('scripts')

    <script>
      $( document ).ready(function() {

        var socket = io.connect('//{{ Request::getHost() }}:3000', {path: '/socket.io'});

        socket.on('connect', function(){
          console.log('Connected as ' + socket.io.engine.id);
        });

        socket.on('disconnect', function(){
          console.log('Disconnected');
        });

        socket.on('MessageEvent', function(msg){
          
          if (msg.sender_id == {{ $sender_id }}) {

            $("#conversation-messages").append('{{ $message->sender->name OR '' }}: ' + msg.body + '<br><small>' + msg.created_at + '</small><br>');

            $("#conversation-messages").animate({ scrollTop: $('#conversation-messages').prop("scrollHeight")}, 1000);

          }

          console.log(msg);
        });

      });
    </script>

@append