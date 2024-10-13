@extends('layouts.app')
@section('title','User Management')
@section('content')

@push('app-css')
    {{-- add css in layout --}}
@endpush
@push('app-top-part-js')

@endpush
@push('app-bottom-part-js')
      {{-- add js in bottom of layout --}}
@endpush

<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h1>User Management</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                    @can('user-create')
                        <a class="btn btn-success shadow-btn" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>
                    @endcan
            </div>
        </div>
        {{-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
        </nav> --}}
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card card-radius shadow-3d">
                  <div class="card-body">
                    {{-- <h5 class="card-title">All Users</h5> --}}
                    <form action="" method="GET">
                        <div class="row my-3">
                            <div class="col-lg-10 col-md-10 col-sm-10 col">
                                <input type="search" name="q" value="{{Request::get('q') ?? ''}}" placeholder="Search" class="form-control"/>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col justify-content-around d-flex">
                                <button type="submit" class="btn btn-dark"><i class=" fa fa-search"></i></button>
                                <a href="{{route('users.index')}}" class="btn btn-danger"><i class=" fa fa-times"></i></a>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">

                    <!-- Table with stripped rows -->
                    <table class="table table-striped align-items-center align-center justify-center table-bordered text-center">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Roles</th>
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($users as $key => $user)

                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user?->name ?? '-' }}</td>
                            <td>{{ $user?->email ?? '-'}}</td>
                            <td>@forelse($user?->getRoleNames() as $role)
                                    <label class="badge bg-success">{{ $role }}</label>
                                @empty
                                    N/A
                                @endforelse
                            </td>

                            <td>{{ date('Y-m-d',strtotime($user?->created_at)) ?? '-'}}</td>
                            <td>{{ date('Y-m-d',strtotime($user?->updated_at)) ?? '-'}}</td>

                            <td>
                                <a class="btn btn-primary btn-sm shadow-btn" href="{{route('users.show',$user->id)}}"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                @can('user-edit')
                                    <a class="btn btn-warning btn-sm shadow-btn" href="{{route('users.edit',$user->id)}}"><i class="fa-solid fa-pencil"></i></a>
                                @endcan

                                @can('user-delete')
                                <form method="POST" action="{{route('users.destroy',$user->id)}}" style="display: inline-block;">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm shadow-btn"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <h2>🙅 Record not available</h2>
                            </td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
                {!! $users->links('pagination::bootstrap-5') !!}

                  </div>
                </div>


              </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
