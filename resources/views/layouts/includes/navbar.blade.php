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


              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <x-ui.icon icon="settings" />
                  </span>
                  <span class="nav-link-title">
                    Settings
                  </span>
                </a>
              </li>


          
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