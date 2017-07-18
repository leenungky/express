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
				            <li>{{$error}}</li>
				        @endforeach 
				    </ul>
			    </div>
		    </div>
		@endif 
		<br/>
		<div class="row">				
			<div class="col-md-12">		
				<form method="post" action="/employ/create" class="formsubmit">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">					
					<div class="form-group">
					    <label for="email">Nama</label>
						 <input type="text" class="form-control" id="nama" name="nama" placeholder="input nama" value="{{ old('nama') }}" required>
					</div>					
					<div class="form-group">
					    <label for="email">Posisi</label>
						 <select name="position" class="form-control" required>
						 	<option>Pilih Posisi</option>
						 	<option value="sales">Sales</option>
						 	<option value="finance">Finance</option>
						 	<option value="admin_operational">Admin Operasional</option>
						 	<option value="kurir">Kurir</option>
						 </select>
					</div>						
					<div class="form-group">
					    <label for="email">Phone</label>
						 <input type="text" class="form-control" id="phone" name="phone" placeholder="input phone" value="{{ old('phone') }}" required>
					</div>						
					<div class="form-group">
					    <label for="email">Alamat</label>
						 <textarea name="address" class="form-control" placeholder="input alamat" required>{{ old('address') }}</textarea>
					</div>										
					<button type="submit" class="btn">Submit</button>
				</form>
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