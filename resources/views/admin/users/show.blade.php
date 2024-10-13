@extends('layouts.app')
@section('title', 'User Detail')
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
                    <h1>User Detail</h1>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end">
                    <a class="btn btn-primary shadow-btn" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i>
                        Back</a>
                </div>
            </div>

        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card card-radius shadow-3d">
                        <div class="card-body p-3 pb-0">
                            <div class="table-responsive">

                                <!-- Table with stripped rows -->
                                <table
                                    class="table align-items-center border border-dark align-center justify-center table-bordered text-center">
                                    <tr>
                                        <th class="table-secondary border border-dark">Name</th>
                                        <td style="text-align: left;">{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-secondary border border-dark">Email</th>
                                        <td style="text-align: left;">{{ $user->email }}</td>
                                    </tr>

                                    <tr>
                                        <th class="table-secondary border border-dark">Roles</th>
                                        <td scope="col" style="text-align: left;">
                                            @forelse ($user->getRoleNames()->chunk(4) as $roles)
                                                {{-- {{$roles}} --}}
                                                @foreach ($roles as $role)
                                                    <label class="badge bg-success">{{ $role }}</label>
                                                @endforeach
                                            @empty
                                                N/A
                                            @endforelse
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table-secondary border border-dark">Created At</th>
                                        <td style="text-align: left;">{{ $user->created_at }}</td>
                                    </tr>


                                </table>
                            </div>
                        </div>


                    </div>
                </div>
        </section>

    </main><!-- End #main -->
@endsection
