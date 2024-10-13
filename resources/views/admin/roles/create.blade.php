@extends('layouts.app')
@section('title','Create Role')
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
                <h1>Create Role</h1>
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
                  <h5 class="card-title">Enter Role Detail</h5>

                  <!-- Vertical Form -->
                  <form class="row g-3" method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="col-12">
                      <label for="name" class="form-label">Enter Name</label>
                      <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name">
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
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
                                            id="{{$pm->name}}" value="{{$pm->id}}" @if(is_array(old('permission')) && in_array($pm->id,old('permission'))) {{'checked'}} @endif>
                                            <label class="form-check-label" for="{{$pm->name}}">
                                                {{$pm->name}}
                                            </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('permission')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name">
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                        </div>
                    </div> --}}
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a class="btn btn-secondary" href="{{route('roles.index')}}">Cancel</a>
                    </div>
                  </form><!-- Vertical Form -->

                </div>
              </div>


        </div>
    </section>

</main><!-- End #main -->
@endsection
