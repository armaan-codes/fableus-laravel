<div class="modal fade" id="register" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="row" align="center">
					<div class="col-md-3">
						<img src="{{ asset('images/elements/book-icons.png') }}" style="width: 50%">
					</div>
					<div class="col-md-6">
						<h2 class="modal-title">
							Sign Up
						</h2>
					</div>
				</div>
			</div>
			<p align="center">Enter your basic information</p>
			<div class="modal-body">
				{!! Form::open([ 'action' => 'Auth\RegisterController@register', 'class' => 'form-horizontal' ]) !!}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					{!! Form::label('name', 'Name:', [ 'class' => 'col-md-3 control-label' ]) !!}
					<div class="col-md-6">
						{!! Form::text('name', old('name'), [ 'class' => 'form-control', 'placeholder' => 'Name', 'autofocus']) !!}
						
						@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					{!! Form::label('email', 'E-mail Address:', [ 'class' => 'col-md-3 control-label' ]) !!}
					<div class="col-md-6">
						{!! Form::email('email', old('email'), [ 'class' => 'form-control', 'required', 'placeholder' => 'example@domain.com' ]) !!}
						
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					{!! Form::label('password', 'Password:', [ 'class' => 'col-md-3 control-label' ]) !!}
					<div class="col-md-6">
						{!! Form::password('password', [ 'class' => 'form-control', 'required', 'placeholder' => 'Password' ]) !!}
						
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					{!! Form::label('password_confirmation', 'Confirm Password:', [ 'class' => 'col-md-3 control-label' ]) !!}
					<div class="col-md-6">
						{!! Form::password('password_confirmation', [ 'class' => 'form-control', 'required', 'placeholder' => 'Confirm Password' ]) !!}
						
						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						{!! Form::submit('Register', [ 'class' => 'btn btn-primary btn-block' ]) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>