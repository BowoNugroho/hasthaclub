<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar">
        <div class="container-xl">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('panel.index') }}">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                </span>
                <span class="nav-link-title">
                  Home
                </span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                </span>
                <span class="nav-link-title">
                  Master Konfigurasi
                </span>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-menu-columns">
                  <div class="dropdown-menu-column">
                    <div class="dropend">
                      <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                       Akses Login
                      </a>
                      <div class="dropdown-menu">
                        <a href="{{ route('panel.user.index') }}" class="dropdown-item">
                          Data User
                        </a>
                        <a href="{{ route('panel.role.index') }}" class="dropdown-item">
                          Data Role
                        </a>
                      </div>
                    </div>
                    <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                         Pengaturan Situs
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item">
                            Informasi Situs
                          </a>
                          <a href="#" class="dropdown-item">
                            Banner Promosi
                          </a>
                          <a href="#" class="dropdown-item">
                            Banner Header
                          </a>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Data Mitra
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          Master Data 1
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item">
                            Master Data 1.1
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                          <a href="#" class="dropdown-item">
                            Master Data 1.2
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                          <a href="#" class="dropdown-item">
                            Master Data 1.3
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Data Produk & Katalog
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          Master Data
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item">
                            Master Data Produk
                          </a>
                          <a href="#" class="dropdown-item">
                            Master Kategori Produk
                          </a>
                          <a href="#" class="dropdown-item">
                            Master Katalog
                          </a>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Data Pesanan
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          Master Data 1
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item">
                            Master Data 1.1
                          </a>
                          <a href="#" class="dropdown-item">
                            Master Data 1.2
                          </a>
                          <a href="#" class="dropdown-item">
                            Master Data 1.3
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Data Komisi
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          Data 1
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item">
                            Data 1.1
                          </a>
                          <a href="#" class="dropdown-item">
                            Data 1.2
                          </a>
                          <a href="#" class="dropdown-item">
                            Data 1.3
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" /><path d="M12 12l8 -4.5" /><path d="M12 12l0 9" /><path d="M12 12l-8 -4.5" /><path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Laporan
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                          Laporan 1
                        </a>
                        <div class="dropdown-menu">
                          <a href="#" class="dropdown-item">
                            Laporan 1.1
                          </a>
                          <a href="#" class="dropdown-item">
                            Laporan 1.2
                          </a>
                          <a href="#" class="dropdown-item">
                            Laporan 1.3
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </li>
          </ul>
          {{-- <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                </span>
                <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
              </div>
            </form>
          </div> --}}
        </div>
      </div>
    </div>
  </header>