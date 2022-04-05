<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <div class="container-fluid py-2">
        <a class="navbar-brand ms-4 text-success" href="{{ route('landing-page') }}"><strong>Lelangin</strong>Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul> --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                @if (Auth::user()->role == 'user')
                <li class="nav-item d-none d-lg-block" title="Item Favorit">
                    <a class="nav-link text-success" href="{{ route('liked') }}">
                        <i class="bi bi-heart-fill"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block" title="Status Lelang">
                    <a class="nav-link text-success" href="{{ route('cart') }}">
                        <i class="bi bi-bookmark-check"></i>
                    </a>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-success fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->role == 'user')
                        <li class="d-block d-lg-none" title="Item Favorit"><a class="dropdown-item" href="{{ route('liked') }}">Item Favorit</a></li>
                        <li class="d-block d-lg-none" title="Status Lelang"><a class="dropdown-item" href="{{ route('cart') }}">Keranjang belanjamu</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('setting') }}">Setting</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Log Out</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <div class="d-grid gap-2">
                        <a href="{{ route('login') }}" class="fw-bold btn btn-sm btn-outline-success me-0 me-lg-2 my-2 my-lg-0">
                            Sign In
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="d-grid gap-2">
                        <a href="{{ route('register') }}" class="text-light fw-bold btn btn-sm btn-success">
                            Sign Up
                        </a>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@auth
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success text-center" id="exampleModalLabel">Log Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin akan keluar dari akun anda?
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-success">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth