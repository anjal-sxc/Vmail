<div id="layoutSidenav">
<div id="layoutSidenav_nav">


    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('dashboard') }}" >
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('compose') }}" >
                    <div class="sb-nav-link-icon"><i class="fas fa-edit"></i></div>
                    Compose</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('inbox') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-inbox"></i></div>
                    Inbox</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('sent') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></div>
                    Sent</a>
            </div>
            <div class="nav">
                <a class="nav-link" href="{{ route('trash') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-trash-restore"></i></div>
                    Trash</a>
            </div>

            <div class="sb-sidenav-footer align-bottom">
                <div class="small">Logged in as:</div>
                {{ auth()->user()->name }}
            </div>


    </nav>



</div>

