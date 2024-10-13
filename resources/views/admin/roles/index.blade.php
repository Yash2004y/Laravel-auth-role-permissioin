@extends('layouts.app')
@section('title','Role Management')
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
                <h1>Role Management</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                    @can('role-create')
                        <a class="btn btn-success shadow-btn" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
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
    {{-- @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession --}}
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">

                <div class="card card-radius shadow-3d">
                  <div class="card-body">
                    <form action="" method="GET">
                        <div class="row my-3">
                            <div class="col-lg-10 col-md-10 col-sm-10 col">
                                <input type="search" name="q" value="{{Request::get('q') ?? ''}}" placeholder="Search" class="form-control"/>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col justify-content-around d-flex">
                                <button type="submit" class="btn btn-dark"><i class=" fa fa-search"></i></button>
                                <a href="{{route('roles.index')}}" class="btn btn-danger"><i class=" fa fa-times"></i></a>
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
                          <th scope="col">Created At</th>
                          <th scope="col">Updated At</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($roles as $key => $role)

                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ date('Y-m-d',strtotime($role?->created_at)) ?? '-' }}</td>
                            <td>{{ date('Y-m-d',strtotime($role?->updated_at)) ?? '-' }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm shadow-btn" href="{{ route('roles.show',$role->id) }}"><i class="fa-sharp fa-solid fa-eye"></i></a>
                                @can('role-edit')
                                    <a class="btn btn-warning btn-sm shadow-btn" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pencil"></i></a>
                                @endcan

                                @can('role-delete')
                                <form method="POST" action="{{route('roles.destroy',$role->id)}}" style="display: inline-block;">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm shadow-btn"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <h2>🙅 Record not available</h2>
                            </td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
                {!! $roles->links('pagination::bootstrap-5') !!}

                  </div>
                </div>


              </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection
