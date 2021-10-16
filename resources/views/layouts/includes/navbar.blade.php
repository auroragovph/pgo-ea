<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <x-ui.icon icon="home" />
                </span>
                <span class="nav-link-title">
                  Home
                </span>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('applicant.index') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <x-ui.icon icon="clipboard-list" />
                  </span>
                  <span class="nav-link-title">
                    Applicants
                  </span>
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Screening
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">

                      @foreach(config('lists.status') as $key => $status)

                      <a class="dropdown-item" href="{{ route('screen', $key) }}" >
                        {{ $status }}
                      </a>

                      @endforeach
                      
                    </div>
                    
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('scholar.index') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <x-ui.icon icon="school" />
                  </span>
                  <span class="nav-link-title">
                    Scholars
                  </span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <x-ui.icon icon="users" />
                  </span>
                  <span class="nav-link-title">
                    Users
                  </span>
                </a>
              </li>


              {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <x-ui.icon icon="settings" />
                  </span>
                  <span class="nav-link-title">
                    Settings
                  </span>
                </a>
              </li> --}}


          
          </ul>
          <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="{{ route('track') }}" method="GET">
              <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                </span>
                <input type="text" name="id" class="form-control" placeholder="Search…" aria-label="Search in website">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>