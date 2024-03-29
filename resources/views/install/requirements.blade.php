@extends('install.install-layout')

@section('content')

<div class="login-content installation-page" >

		<div class="logo text-center"><img src="{{IMAGES}}logo.png" alt=""></div>
		@include('errors.errors')
		{!! Form::open(array('url' => URL_UPDATE_INSTALLATATION_DETAILS, 'method' => 'POST', 'name'=>'registrationForm ', 'novalidate'=>'', 'class'=>"loginform", 'id'=>"install_form")) !!}
	
<div class="row" >
<?php $isInstallable = 1; ?>
	 <div class="col-md-12">
	 <table class="table">
  <thead>
    <tr>
       
      <th>Requirement</th>
      <th>Status</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">PHP Version >= 7.1.3 </th>
      
      <td>
	      	@if (version_compare(phpversion(), '7.0.0', '>'))  
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
      
    </tr>
  
    <tr>
      <th scope="row">max_execution_time</th>
      
      <td>
	      	@if(ini_get('max_execution_time'))
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    
    <tr>
      <th scope="row">zip</th>
      
      <td>
	      	@if(extension_loaded('zip')) 
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">fileinfo</th>
      
      <td>
	      	@if(extension_loaded('fileinfo')) 
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">openssl</th>
      
      <td>
	      	@if (extension_loaded('openssl')) 
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">mbstring</th>
      
      <td>
	      	@if(extension_loaded('mbstring'))
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">tokenizer</th>
      
      <td>
	      	@if(extension_loaded('tokenizer'))
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
    <tr>
      <th scope="row">allow_url_fopen</th>
      
      <td>
	      	@if( ini_get('allow_url_fopen') )
	      		<i class="fa fa-check text-success" aria-hidden="true"></i>
	      	@else
		      	<i class="fa fa-times text-danger" aria-hidden="true"></i>
		      	<?php $isInstallable = 0; ?>
	      	@endif
      </td>
    </tr>
  
  </tbody>
</table>
	 	
	 </div>
	
</div>
		
		


		

		
			@if($isInstallable)
		
			<div class="text-center buttons">

				<button type="button"  class="btn button btn-success btn-lg" 

				ng-disabled='!registrationForm.$valid' onclick="submitForm();" >Next</button>

			</div>
			@else
			<p class="text-danger">Note: Please install/enable the above requirements to continue... </p>
			@endif

		{!! Form::close() !!}
		

		 <div class="loadingpage text-center" style="display: none;" id="after_display">
		 	
		 	<p>Please Wait...</p>

		 	<img width="50" src="<?php echo IMAGES;?>loading.gif">
		 </div>

	</div>

@stop



@section('footer_scripts')

	@include('common.validations');
<script src="{{JS}}bootstrap-toggle.min.js"></script>
 <script>
 	function submitForm() {
 		$('#install_form').hide();
 		$('#after_display').show();
 		$('#install_form').submit();
 	}
 </script>
@stop