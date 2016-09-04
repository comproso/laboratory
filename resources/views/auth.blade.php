@extends('layout')

@section('main')
  <div class="ui center aligned segment">
    <form class="ui form" method="post">
      <div class="ui left labeled action input">
        <label for="password" class="ui label">Admin</label>
        <input id="password" name="password" type="password" placeholder="Password">
		<input type="submit" class="ui primary button" value="SUBMIT">
	  </div>
    </form>
  </div>
@endsection