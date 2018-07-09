@extends('layouts.default')

@section('content')
<div class="container">
  <h2>Single card entry form</h2>
	<form method="post" action="/form/submit" enctype="multipart/form-data">
        {{ csrf_field() }}
	  <div class="form-group">
	    <label for="bank">Bank:</label>
	    <input type="text" class="form-control" id="bank" name="bank" placeholder="Bank Name" required>
	  </div>
	  <div class="form-group">
	    <label for="card_number">Card Number:</label>
	    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Card Number" required>
	  </div>
	  <div class="form-group">
	    <label for="card_date">Date Field:</label>
	    <input type="text" class="form-control" id="card_date" name="card_date" placeholder="Nov-2019" required>
	  </div>  
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
@stop
