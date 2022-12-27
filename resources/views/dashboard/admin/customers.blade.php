@extends('dashboard.layouts.main')

@section('container')
<div class="details row px-4 gap-3">
    <div class="recentCustomer col p-3">
        <div class="cardHeader d-flex justify-content-between">
            <h5>Customer</h5>
            <a href="#" class="badge badge-primary bg-primary h-50">View All</a>
        </div>
        <div class="table-customer">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{$user->image}}" alt="" style="width: 45px; height: 45px;" class="rounded-circle">
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1">{{$user->name}}</p>
                                        <p class="text-muted mb-0">{{$user->email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-muted mb-0">{{$user->username}}</p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">{{$user->no_telphone}}</p>
                            </td>
                            <td>
                                <p class="text-muted mb-0">{{$user->address}}</p>
                            </td>
                            <td>
                                <a href="#" class="badge badge-delete text-white bg-danger rounded-pill d-inline">
                                    delete
                                </a>
                                <span class="mx-1"></span>
                                <a href="/dashboard/customers/{{{$user->id}}}/edit" class="badge badge-edit text-white bg-warning rounded-pill d-inline">
                                    edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    

            <div class="d-flex mt-2 justify-content-end">
                {!! $users->links() !!}
            </div>
        </div> 
    </div>
</div>
@endsection