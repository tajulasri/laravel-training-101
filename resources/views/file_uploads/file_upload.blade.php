@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="card col-md-10">
			 @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

			<div class="card-header"></div>
			<div class="card-content" style="margin-top: 2em;">
				<img src="{{ asset('storage/images/unnamed.jpg') }}" width="200" height="auto">
				<br />
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