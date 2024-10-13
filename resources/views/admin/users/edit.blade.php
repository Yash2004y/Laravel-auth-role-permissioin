@extends('layouts.app')
@section('title','Edit User')
@section('content')

@push('app-css')
{{-- add css in layout --}}
@endpush
@push('app-top-part-js')

@endpush
@push('app-bottom-part-js')

@endpush

<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                <a class="btn btn-primary shadow-btn" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="card shadow-3d card-radius">
                <div class="card-body">
                  <h5 class="card-title">Enter User Detail</h5>

                  <!-- Vertical Form -->
                  <form class="row g-3" method="POST" action="{{ route('users.update',$user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                      <label for="name" class="form-label">Enter Name</label>
                      <input type="text" class="form-control" value="{{$user->name}}" placeholder="Name" id="name" name="name">
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Enter Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}" id="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">Enter Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" value="{{old('password')}}" class="form-control">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                    <div class="col-12">
                        <label for="confirm-password" class="form-label">Enter Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" value="{{old('confirm-password')}}" class="form-control">
                            @error('confirm-password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>

                    <div class="col-12">
                        {{-- roles[] --}}
                        <x-multi-select :selectedItems=$userRole :data=$roles textField="name" valueField="name" inputLabel="Select Roles" firstLabelItem="-- Select Roles --" inputId="roles" inputName="roles[]" inputNameText="roles" />
                        @error('roles')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a class="btn btn-secondary" href="{{route('users.index')}}">Cancel</a>
                    </div>
                  </form><!-- Vertical Form -->

                </div>
              </div>


        </div>
    </section>

</main><!-- End #main -->
@endsection
