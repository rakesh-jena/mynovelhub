@php
if(Auth::check()){
    $user = Auth::user();
    $user_meta = App\Models\UserMeta::where('user_id', $user->id)->first();
}    
@endphp
<div class="admin-header">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="{{ url('') }}">
                <img src="{{ URL::asset('images/logo.png') }}" alt="logo"></a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('') }}">
                <img src="{{ URL::asset('images/logo-mini.png') }}" alt="logo"></a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <ul class="navbar-nav navbar-nav-left">
                <li class="nav-item nav-genre dropdown">
                    <a class="nav-link dropdown-toggle" id="genreDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-genre-text">
                            <p class="mb-1 text-black">Genre</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" style="width: max-content" aria-labelledby="genreDropdown">
                        <div class="row">
                        @php
                        $genres = \App\Models\Genre::orderBy('genre', 'asc')->get();
                        $count = 0;
                        @endphp
                        @foreach($genres as $genre)
                        @php
                        $count++;
                        @endphp
                        @if($count === 1)
                        <div class="col">
                            @endif
                            <a class="dropdown-item text-capitalize" href="{{ url('genre') }}/{{$genre->id}}/{{$genre->slug}}">
                                {{ $genre->genre }} </a>
                    @if(!next( $genres ))
                    <div class="dropdown-divider"></div>
                    @endif
                    @if($count === 6)
                    <?php $count = 0; ?>
                        </div>
                    @endif
                    @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-novel dropdown">
                    <a class="nav-link dropdown-toggle" id="novelDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-novel-text">
                            <p class="mb-1 text-black">Novels</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="novelDropdown">
                        <a class="dropdown-item" href="{{ url('novels') }}">
                            All 
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('genre') }}">
                            All Genre 
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('tags') }}">
                            All Tags 
                        </a>
                    </div>
                </li>
            </ul>

            <div class="search-field d-none d-md-block">
                <form class="d-flex align-items-center h-100" action="#">
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" class="form-control bg-transparent border-0" id="search"
                            data-image="{{ URL::asset('images/book-cover/48/') }}" data-url="{{ url('search') }}"
                            placeholder="Search projects">
                    </div>
                </form>
                <div class="book-search-result box-sh d-none"></div>
            </div>

            <ul class="navbar-nav navbar-nav-right">
                @if (Auth::check())
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="{{ URL::asset('images/user-avatar') }}/{{ $user_meta->avatar }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            <i class="mdi mdi-account mr-2 text-success"></i> Profile </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('library') }}">
                            <i class="mdi mdi-library mr-2 text-success"></i> Library </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('reading-history') }}">
                            <i class="mdi mdi-history mr-2 text-success"></i> History </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('user_logout') }}">
                            <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                    </div>
                </li>
                @else
                <li class="nav-item d-md-block mr-2">
                    <button class="btn btn-rounded btn-gradient-primary btn-sm font-weight-medium" data-toggle="modal"
                        data-target="#login_modal">
                        LOG IN
                    </button>
                </li>
                <li class="nav-item d-none d-md-block">
                    <button class="btn btn-rounded btn-gradient-primary btn-sm font-weight-medium" data-toggle="modal"
                        data-target="#register_modal">
                        SIGN UP
                    </button>
                </li>
                @endif

            </ul>
        </div>
    </nav>
</div>