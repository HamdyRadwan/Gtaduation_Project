@extends('layouts.app')
@section('title')
    Edit Ticket ({{ $ticket->type }} of {{$ticket->event->name}})
@endsection

{{-- @section('page-title-1')
    Edit Ticket ({{ $ticket->type }} of {{$ticket->event->name}})
@endsection --}}


@section('content')

       <!-- Page Title -->
       <div class="page-title" data-aos="fade" style="background-image: url({{ asset('assets/img/hotels-2.jpg') }}); ">
        <div class="container position-relative">
            {{-- <a href="{{ route('venues-user.index') }}" > --}}
                  <h1> Edit Ticket</h1>
            {{-- </a> --}}
        </div>
    </div>

    <!-- End Page Title -->

    {{--              Search    Bar --}}

    <br>
    <br>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Ticket ({{ $ticket->type }}of {{$ticket->event->name}})</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($successMsg = Session::get('success'))
                            <div class="alert alert-success text-center">
                                {{ $successMsg }}
                            </div>
                        @endif
                        <!-- General Form Elements -->
                        <form action="{{ route('ticketss.update', $ticket->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('tickets.form')
                            <div class="d-flex justify-content-lg-end">
                                <input class="btn btn-sm btn-success" type="submit" value="Update">
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('style-card')
    <style>
        .card {
            height: 500px;
        }

        .card img {
            height: 400px;
            object-fit: cover;
        }

        .card {

            width: 100%;
        }
    </style>
@endsection
