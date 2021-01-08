@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')





    @include('dashboard.side-nav')



        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <br>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Trash</li>
                    </ol>






                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Trash Emails</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Origin</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($trashMails as $trash)
                                    <tr tabindex="1" class="trashRow">
                                        <td>{{ $trash['id'] }}</td>
                                        @if(key_exists('to', $trash))
                                            <td>Sent</td>
                                        @else
                                            <td>Inbox</td>
                                        @endif
                                        <td>{{ $trash['subject'] }}</td>
                                        <td>{{ $trash['body'] }}</td>
                                        <td>
                                            <form action="{{ route('trash') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $trash['id'] }}">
                                                @if(key_exists('to', $trash))
                                                    <input type="hidden" name="origin" value="Sent">
                                                @else
                                                    <input type="hidden" name="origin" value="Inbox">
                                                @endif
                                                <button type="submit" name="restore" class="btn btn-success" tabindex="1">Restore</button>
                                                <button type="submit" name="delete" class="btn btn-danger" tabindex="2">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>

@endsection



