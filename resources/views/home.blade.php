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
                    

                  @if($errors->any())
                   <p class="alert alert-danger">{{ $errors->first('current_owned_by') }}</p>
                  @endif

                    <table class="table table-bordered table-hover">
                        <tr class="text-center" style="background-color: #eee;">
                            <th>ID</th>
                            <th>Label</th>
                            <th>Expiry Date</th>
                            <th>Expiry in</th>
                            <th>Is Expired</th>
                            <th>Availability</th>
                            <th>Owned By</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr >
                        @foreach($assets as $asset)
                        <tr class="text-center">
                            <td>{{ $asset->id}} </td>
                            <td>{{ $asset->label}} </td>
                            
                            <td>{{ $asset->expired_date}} </td>
                            <td>{{ $asset->expiry_in_days }} days</td>
                            <td><span class="badge badge-{{ $asset->is_expired ? 'danger' : 'success'}}">{{ $asset->is_expired ? 'Expired': 'Valid' }}</span></td>
                            <td class="" style="{{ $asset->current_owned_by != null ? 'text-decoration: line-through': '' }}">{{ __('Available') }}</td>
                            <td>{{ $asset->ownedBy->name ?? '-' }}</td>
                            <td>
                               <img src="data:image/png;base64,{{ \DNS2D::getBarcodePNG($asset->asset_serial ?? '-' , 'QRCODE')}} " alt="barcode"   />
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('assets.edit',$asset->id) }}">Edit</a>
                                        <a class="dropdown-item" href="#" data-target="#assignModal-{{ $asset->id }}" data-toggle="modal">View Code</a>
                                        <a class="dropdown-item" href="#">
                                            <form action="{{ route('assets.destroy',$asset->id) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE')}}

                                                <input type="submit" value="Delete"/>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="assignModal-{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">QR CODE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                     <div class="row justify-content-center" style="padding-top:3em; padding-bottom: 3em;">
                                         <img height="150" width="150" src="data:image/png;base64,{{ \DNS2D::getBarcodePNG($asset->asset_serial ?? '-' , 'QRCODE')}} " alt="barcode"   />
                                     </div>

                                       
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