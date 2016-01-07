		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('body', 'Text:') !!}
			{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::label('published_at', 'Publish On:') !!}
			{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('taglist', 'Tags:') !!}
			{!! Form::select('taglist[]', $tags, null, ['id' => 'taglist', 'class' => 'form-control', 'multiple']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
		</div>


		@section('footer')
			<script type="text/javascript">
				$('#taglist').select2({
					placeholder: 'Choose a tag'
				});
					
			</script>
		@endsection