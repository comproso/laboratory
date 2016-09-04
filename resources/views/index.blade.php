@extends('layout')

@section('main')
  <div class="ui center aligned segment">
    <form class="ui form" method="post" action="/">
	  {{ csrf_field() }}
      <div class="ui right labeled input">
        <input id="identifier" name="identifier" type="number" min="1">
        <label for="identifier" class="ui label">Identifier</label>
      </div>
      <br><br>
    @foreach($projects as $project)
      <input id="p{{ $project->id }}" type="radio" value="{{ $project->id }}" name="project">
      <label for="p{{ $project->id }}">{{ $project->name }}</label><br>
    @endforeach
      <input type="submit" class="ui primary button" value="SUBMIT">
    </form>
  </div>
@endsection
