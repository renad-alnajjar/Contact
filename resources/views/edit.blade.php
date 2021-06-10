 
@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 m-auto">
			<div class="contact-form">
				<h1>Contact Us</h1>
				<p class="hint-text">We'd love to hear from you, please drop us a line if you've any query.</p>
				<form action="{{url('update/'.$contact->id)}}" method="post">
                @csrf
@method('PATCH')					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputFirstName">First Name</label>
								<input type="text"  name='fName' value='{{$contact->fName}}' class="form-control" id="inputFirstName" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputLastName">Last Name</label>
								<input type="text" name='lName' class="form-control" value='{{$contact->lName}}' id="inputLastName" required>
							</div>
						</div>
					</div>            
					<div class="form-group">
						<label for="inputEmail">Email Address</label>
						<input type="email" class="form-control"  name='email' value='{{$contact->email}}' id="inputEmail" required>
					</div>
					
					<input type="submit" class="btn btn-primary" value="Update">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection