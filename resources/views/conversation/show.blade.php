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

                	@foreach($messages as $message)

                		<small>{{ $message->created_at }}</small> 

                		<br>

                		{{ $message->sender->name }}: {{ $message->body }}

                		<br>

                	@endforeach

		        	@include('conversation.form', [
		        		
		        	])

                </div>
            </div>
        </div>
    </div>
</div>
@append
