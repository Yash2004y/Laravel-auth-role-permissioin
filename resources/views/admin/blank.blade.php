@extends('layouts.app')
@section('title','Blank Page')
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
        <h1>Blank Page</h1>
        {{-- <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
        </nav> --}}
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            {{-- add content --}}
        </div>
    </section>

</main><!-- End #main -->
@endsection
