@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<h1>Submit a link</h1>
			<form action="/submit" method="post">
				{!! csrf_field() !!}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
				</div>
				<div class="form-group">
					<label for="url">Url</label>
					<input type="text" class="form-control" id="url" name="url" placeholder="Url" value="{{ old('url') }}">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="textarea" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
@endsection