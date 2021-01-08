@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')

    @include('dashboard.side-nav')


    <div id="layoutSidenav_content">
        <main class="emailDetails">
            <div class="container-fluid">
                <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Inbox</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Inbox Email</div>
                    <div class="card-body">
                        <p>From: {{ $inbox->from }}.</p>
                        <p>Subject: {{ $inbox->subject }}.</p>
                        <p>Date: {{ $inbox->created_at->format('l, jS F, Y. h:i:s A') }}</p>
                        <br>
                        <p>{{ $inbox->body }}</p>
                    </div>
                </div>







            </div>
        </main>

        <div class="container mb-5">
            <form method="POST" action="{{ route('inbox') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $inbox->id }}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>



    </div>





    </div>

@endsection





