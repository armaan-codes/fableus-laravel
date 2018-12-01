<div class="modal fade" id="write" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="row" align="center">
					<img src="{{ asset('images/elements/book-icons.png') }}" style="width: 30%">
					<h3 class="modal-title">Write a Story...</h3>
				</div>
			</div>
			<div class="modal-body">
				{!! Form::open([ 'route' => 'story.create', 'class' => 'form-horizontal' ]) !!}

				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
					{!! Form::label('title', 'Title:', [ 'class' => 'col-md-3 control-label' ]) !!}
					<div class="col-md-6">
						{!! Form::text('title', old('title'), [ 'class' => 'form-control', 'required', 'placeholder' => 'Story Title...' ]) !!}
						
						@if ($errors->has('title'))
							<span class="help-block">
								<strong>{{ $errors->first('title') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
					{!! Form::label('type', 'Type:', [ 'class' => 'col-md-3 control-label' ]) !!}
					<div class="col-md-6">
						@foreach(App\StoryType::all() as $type)
							{!! Form::radio('type', $type->id) !!} {{ $type->name }}<br>
						@endforeach

						@if ($errors->has('type'))
							<span class="help-block">
								<strong>{{ $errors->first('type') }}</strong>
							</span>
						@endif
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-3">
						{!! Form::submit('Login', [ 'class' => 'btn btn-primary btn-block' ]) !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>