@extends('layouts.app')
@section('title', 'Role Edit')
@section('content')

    @push('app-css')
        {{-- add css in layout --}}
    @endpush
    @push('app-top-part-js')

    @endpush
    @push('app-bottom-part-js')
        {{-- add js in bottom of layout --}}
        <script>
            $(document).ready(function(){
                $("#select_all").change(function(e){

                    $(".permission-box").prop('checked',$(this).prop('checked'))
                })
            })
          </script>
    @endpush
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h1>Edit Role</h1>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-primary shadow-btn" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="card shadow-3d card-radius">
                    <div class="card-body">
                        <h5 class="card-title">Role Edit</h5>
                        <form method="POST" class="row g-3" action="{{ route('roles.update', $role->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="name" class="form-label">Role Name </label>
                                <input type="text" class="form-control" id="name" name = "name"
                                    value="{{ $role->name }}">
                            </div>
                            <div class="col-12">
                                <label for="rolePermissions" class="form-label">Role Permissions </label>
                                <br>
                        <div class="form-check">

                        <input class="form-check-input" type="checkbox" id="select_all">
                        <label class="form-check-label" for="select_all">
                            Select All Permission
                        </label>
                    </div>
                    <br>
                                <div class="row g-2">
                                    @foreach ($permission as $pm)
                                        <div class="col-3 col-lg-3 col-sm-3 col-md-3">
                                            <div class="form-check">

                                                    <input class="form-check-input permission-box" type="checkbox" name="permission[{{$pm->id}}]"
                                                    id="{{$pm->name}}" value="{{$pm->id}}" @if(in_array($pm->id,$rolePermissions)) {{"checked"}} @endif>
                                                    <label class="form-check-label" for="{{$pm->name}}">
                                                        {{$pm->name}}
                                                    </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="{{route('roles.index')}}">Cancel</a>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
