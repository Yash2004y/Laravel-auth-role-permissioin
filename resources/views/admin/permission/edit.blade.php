@extends('layouts.app')
@section('title','Permission Management')
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
                <h1>Edit Permission</h1>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                <a class="btn btn-primary shadow-btn" href="{{ route('permission.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="card shadow-3d card-radius">
                <div class="card-body">
                  <h5 class="card-title">Enter Permission Detail</h5>

                  <!-- Vertical Form -->
                  <form class="row g-3" method="POST" action="{{ route('permission.update',$permission->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                      <label for="name" class="form-label">Enter Name</label>
                      <input type="text" class="form-control" value="{{$permission->name}}" placeholder="Name" id="name" name="name">
                      @error('name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a class="btn btn-secondary" href="{{route('permission.index')}}">Cancel</a>
                    </div>
                  </form><!-- Vertical Form -->

                </div>
              </div>


        </div>
    </section>

</main><!-- End #main -->
@endsection
