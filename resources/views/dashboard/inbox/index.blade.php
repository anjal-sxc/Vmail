@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')





    @include('dashboard.side-nav')




        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <br>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>






                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Inbox Emails</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>From</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($inboxMails as $inbox)
                                    <tr onkeypress="window.location='/dashboard/inbox/{{ $inbox->id }}'" tabindex="1" class="emailRow">
                                        <td>{{ $inbox->id }}</td>
                                        <td>{{ $inbox->from }}</td>
                                        <td>{{ $inbox->subject }}</td>
                                        <td>{{ $inbox->body }}</td>
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



