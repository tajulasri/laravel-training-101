@extends('layouts.app')
@section('content')
{{-- our content is begin here --}}
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header"></div>
				<div class="card-content" style="margin-top: 20px;">
					<div class="col-md-8">
						@if (session('success'))
						<div class="alert alert-success" role="alert">
							{{ session('success') }}
						</div>
						@endif
						

						@if($errors->any())
						
						@foreach($errors->all() as $error)
						<p class="alert alert-danger">{{ $error }}</p>
						@endforeach
						@endif
						<form action="{{ route('assets.update',$asset->id) }}" method="post">
							@csrf
							{{ method_field('PUT') }}
							<div class="form-group">
								<label>Location</label>
								<select name="location_id" class="form-control">
									<option>Select location </option>
									@foreach($assetlocations as $location)
									<option {{ $location->id == $asset->location_id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->location }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Asset Status</label>
								<select name="asset_status_id" class="form-control">
									<option>Select Asset Status </option>
									@foreach($assetStatus as $status)
									<option {{ $status->id == $asset->asset_status_id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Asset Type</label>
								<select name="asset_type_id" class="form-control">
									<option>Select Asset Type </option>
									@foreach($types as $type)
									<option  {{ $type->id == $asset->asset_type_id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->type }}</option>
									@endforeach
								</select>
							</div>
							
							<div class="form-group">
								<label>Asset Label</label>
								<input type="text" name="label" value="{{ $asset->label }}" class="form-control" placeholder="Asset Label">
							</div>
							<div class="form-group">
								<label>Register Date</label>
								<input type="date" value="{{ $asset->register_date }}" name="register_date" class="form-control" placeholder="Register Date">
							</div>
							<div class="form-group">
								<label>Expiry Date</label>
								<input type="date" value="{{ $asset->expired_date }}"  name="expired_date" class="form-control" placeholder="Expiry Date">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="
								Update Asset"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection