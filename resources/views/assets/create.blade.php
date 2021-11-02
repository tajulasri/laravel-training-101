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
						<form action="{{ route('assets.store') }}" method="post">
							@csrf

							<div class="form-group">
								<label>Location</label>
								<select name="location_id" class="form-control">
									<option>Select location </option>
									@foreach($assetlocations as $location)
										<option value="{{ $location->id }}">{{ $location->location }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Asset Status</label>
										<select name="asset_status_id" class="form-control">
									<option>Select Asset Status </option>
									@foreach($assetStatus as $status)
										<option value="{{ $status->id }}">{{ $status->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Asset Type</label>
										<select name="asset_type_id" class="form-control">
									<option>Select Asset Type </option>
										@foreach($types as $type)
										<option value="{{ $type->id }}">{{ $type->type }}</option>
									@endforeach
								</select>
							</div>

							

							<div class="form-group">
								<label>Asset Label</label>
								<input type="text" name="label" class="form-control" placeholder="Asset Label">
							</div>

							<div class="form-group">
								<label>Register Date</label>
								<input type="date" name="label" class="form-control" placeholder="Register Date">
							</div>

							<div class="form-group">
								<label>Expiry Date</label>
								<input type="date" name="label" class="form-control" placeholder="Expiry Date">
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Add Asset"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection