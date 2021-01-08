@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')





    @include('dashboard.side-nav')




        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <br>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Sent</li>
                    </ol>






                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Sent Emails</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>To</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                @foreach($sentMails as $sent)
                                    <tr onkeypress="window.location='/dashboard/sent/{{ $sent->id }}'" tabindex="1" class="emailRow">
                                        <td>{{ $sent->id }}</td>
                                        <td>{{ $sent->to }}</td>
                                        <td>{{ $sent->subject }}</td>
                                        <td>{{ $sent->body }}</td>
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
