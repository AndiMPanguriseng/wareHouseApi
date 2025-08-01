<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-bootstrap-fill me-2"></i>
                MyApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-collection me-1"></i> Products
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($menus as $menu)
                            <li class="nav-item">
                                <a wire:navigate href="{{ route($menu['route']) }}" class="flext py-2 px-3 hover:bg-gray-700 rounded">
                                    {{ $menu['label'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>

