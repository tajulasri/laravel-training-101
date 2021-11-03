@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="card col-md-10">
			<div class="card-header"></div>
			<div class="card-content" style="margin-top: 2em;">
				{{-- our content is begin here --}}
				<form action="{{ route('files.upload.store') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="form-group">
						<input type="file" name="file" />
						<input type="submit" value="Upload" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection