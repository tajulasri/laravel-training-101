@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('List of Assets') }}</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    <table class="table table-bordered table-hover">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Label</th>
                            <th>Expiry Date</th>
                            <th>Expiry in</th>
                            <th>Is Expired</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr >
                        @foreach($assets as $asset)
                        <tr class="text-center">
                            <td>{{ $asset->id}} </td>
                            <td>{{ $asset->label}} </td>
                            
                            <td>{{ $asset->expired_date}} </td>
                            <td>{{ $asset->expiry_in_days }} days</td>
                            <td><span class="badge badge-{{ $asset->is_expired ? 'danger' : 'success'}}">{{ $asset->is_expired ? 'Expired': 'Valid' }}</span></td>
                            <td class="">{{ $asset->availability}} </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#" data-target="#assignModal-{{ $asset->id }}" data-toggle="modal">Assign</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="assignModal-{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Assign Current Asset To User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                        <form action="{{ route('asset.update',$asset->id) }}" method="post">
                                    <div class="modal-body">
                                            
                                            @csrf
                                            {{ method_field('PUT') }}

                                            <div class="form-group">
                                                <p>List of users</p>
                                                <select name="current_owned_by" class="form-control">
                                                    <option value="null">Select user</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->assignedAssets()->count() }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </table>
                    {{ $assets->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection