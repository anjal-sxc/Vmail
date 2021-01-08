@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')

    @include('dashboard.side-nav')


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <br>



                <div id="layoutCompose">
                    <div id="layoutCompose_content">
                        <main>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7">
                                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Send Email</h3></div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('compose') }}">
                                                    @csrf

                                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">From: </label>
                                                        <input name="fromEmail" class="form-control py-4" id=""
                                                               type="email" aria-describedby="emailHelp" placeholder="Enter email"
                                                        value="{{ auth()->user()->email.config('vmail') }}" readonly/></div>

                                                    <div class="form-group"><label class="small mb-1" for="emailTo">To: </label>
                                                        <input name="to" class="form-control py-4" id="emailTo"
                                                               type="text" aria-describedby="emailHelp" placeholder="Enter email" tabindex="1" /></div>

                                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Subject: </label>
                                                        <input name="subject" class="form-control py-4" id="emailSubject"
                                                               type="text" aria-describedby="emailHelp" placeholder="Enter subject" tabindex="2"/></div>

                                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Body: </label>
                                                        <textarea  class="form-control py-4" name="body" id="emailBody" cols="" rows="" tabindex="3"></textarea></div>

                                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block" id="emailSend" tabindex="4">Send</button></div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>

                </div>






            </div>
        </main>

    </div>





    </div>

@endsection




