@extends('layout')

@section('main')
  <div class="ui segment">
  	<ul class="ui list">
    @foreach($projects as $project)
      <li class="list item">{{ $project->name }}: <a href="{{ url('/export/'.$project->id.'/xlsx') }}" title="XLSX file"><i class="file excel outline icon"></i></a></li>
    @endforeach
  	</ul>
  </div>
@endsection
