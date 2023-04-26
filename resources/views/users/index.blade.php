@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User </a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="col-lg-9 mt-4 mt-lg-0">
    <div class="row">
        <div class="col-md-12">
            <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                <table class="table manage-candidates-top mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Roles</th>
                            <th class="action text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                        <tr class="candidates-list">
                            <td class="title">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ $user->profile_photo_url }}" alt="">
                                </div>
                                <div class="candidate-list-details">
                                    <div class="candidate-list-info">
                                        <div class="candidate-list-title">
                                            <h5 class="mb-0"><a href="#">{{ $user->name }}</a></h5>
                                        </div>
                                        <div class="candidate-list-option">
                                            <ul class="list-unstyled">
                                                <li><i class="fas fa-filter pr-1"></i>Information Technology</li>
                                                <li><i class="fas fa-map-marker-alt pr-1"></i>Rolling Meadows, IL 60008</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="candidate-list-favourite-time text-center">
                                <span class="candidate-list-time order-1">{{ $user->email }}</span>
                            </td>
                            <td class="candidate-list-favourite-time text-center">
                                <span class="candidate-list-time order-1"> @foreach($user->getRoleNames() as $v)
                                  {{ $v }}
                                    @endforeach</span>
                            </td>
                            <td>
                                <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                    <li><a href="{{ route('users.show',$user->id) }}" class="text-primary" data-toggle="tooltip" title="" data-original-title="view"><i class="far fa-eye"></i></a></li>
                                    <li><a href="{{ route('users.edit',$user->id) }}" class="text-info" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                    <li> {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}<button type="submit" href="#" class="text-danger" data-toggle="tooltip" title="" data-original-title="Delete"><i class="far fa-trash-alt"></i></button></li> {!! Form::close() !!}
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</table>


{!! $data->links('pagination::bootstrap-4') !!}


</div>


@endsection
