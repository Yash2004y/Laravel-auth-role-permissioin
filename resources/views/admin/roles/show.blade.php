@extends('layouts.app')
@section('title', 'Role Detail')
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
                    <h1>Role Detail</h1>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-primary shadow-btn" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-radius shadow-3d">
                        <div class="card-body">
                            <h5 class="card-title">{{$role->name}}</h5>

                            <div class="table-responsive">

                                <!-- Table with stripped rows -->
                                <table class="table align-items-center align-center justify-center table-bordered text-center">
                                    @if(isset($rolePermissions))
                                    @foreach ($rolePermissions->chunk(4) as $permissions)
                                    <tr>
                                        @foreach($permissions as $permission)
                                        <th scope="col">{{ucfirst(str_replace('-',' ',$permission->name))}}</th>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                    @endif
                                </table>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
