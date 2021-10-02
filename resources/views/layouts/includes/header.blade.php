<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="{{ route('homepage') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            Educational Assistance
        </a>

        @if(false)

        <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item dropdown">
                
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">

                    <img class="avatar avatar-sm" src="{{ authenticated()->employee->info['image'] ?? null }}"
                        onerror="this.src='/assets/images/user.png'" alt="User Image">

                    <div class="d-none d-xl-block ps-2">
                        <div>{{ name(authenticated()->employee->name) }}</div>
                        <div class="mt-1 small text-muted">{{ authenticated()->employee->position->name ?? 'User' }}</div>
                    </div>


                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Profile & account</a>
                    <a href="javascript:;" onclick="document.getElementById('logoutForm').submit();" role="button" class="dropdown-item" >Logout</a>
                </div>

                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>

        @endif


    </div>
</header>
