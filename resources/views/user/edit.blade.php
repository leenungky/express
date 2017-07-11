<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
     @include('head')
     <style type="text/css" media="print">
     	   @media print {
			    @page { margin: 0px 6px; }
  				body  { margin: 0px 6px; }   					  
			}
     </style>
</head>
<body >
    <?php use App\Http\Helpers\Helpdesk; ?>
 
 <div id="contents">
    <div class="container container-fluid">       
		@include('header')		
		<br/>
		@if (count($errors))     
			<div class="row">				
				<div class="col-md-12 alert alert-danger">		
				    <ul>
				        @foreach($errors->all() as $error) 		            				            
				            <li>{{str_replace("name","Nama toko",$error)}}</li>
				        @endforeach 
				    </ul>
			    </div>
		    </div>
		@endif 
		<br/>
		<div class="row">				
			<div class="col-md-12">		
				<form method="post" action="/user/create" class="formsubmit">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">					
					<div class="form-group">
					    <label for="email">Firstname</label>
						 <input type="text" class="form-control" id="firstname" name="firstname" placeholder="input username" value="{{$user->first_name}}" required>
					</div>					
					<div class="form-group">
					    <label for="email">Lastname</label>
						 <input type="text" class="form-control" id="lastname" name="lastname" placeholder="input username" value="{{$user->last_name}}" required>
					</div>					
					<div class="form-group">
					    <label for="email">email</label>
						 <input type="text" class="form-control" id="email" name="email" placeholder="input email" value="{{$user->email}}" required>
					</div>
					<div class="form-group">
					    <label for="email">Role User</label>
						<select name="role" class="form-control">
							@foreach ($role as $key => $value)
								@if ($value->id==$user->role_id)
									<option value="{{$value->id}}" selected>{{$value->name}}</option>
								@else
									<option value="{{$value->id}}">{{$value->name}}</option>
								@endif								
							@endforeach
						</select>
					</div>					
					<div class="form-group">
					    <label for="pwd">Password:</label>
					    <input type="text" class="form-control" name="password" placeholder="input password" value="{{ old('password') }}" required>
					</div>
					<div class="form-group">
					    <label for="pwd">Password Confirmation:</label>
					    <input type="text" class="form-control" name="password_confirmation" placeholder="input password" value="{{ old('password_confirmation') }}" required>
					</div>
					<button type="submit" class="btn">Submit</button>
				</form>
			</div>
			<div class="col-md-4">			
				<div class="row">
					<div class="col-md-12">
            			<table class="table">
            				<thead>
            					<th>
            						<input type="checkbox" name="all_role" class="form-control" style="height: 20px" />
            					</th>
            					<th>Role Name</th><th>Description</th>
            				</thead>
            			</table>
					</div>
				</div>
			</div>
		</div>
	</div>	    	

</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){	
		$( "input[name=name]" ).focus();
	});
</script>