@if (Session::has('flash_message'))
	<div class="alert alert-succes {{ Session::has('flash_message_important') ? 'alert-important'">
		@if (Session::has('flash_message_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		@endif

		{{ session('flash_messsage') }}
		
	</div>