<a
               class="sidebar-brand d-flex align-items-center justify-content-center"
               href="/dashboard"
            >
               <div class="sidebar-brand-text mx-3">Perpustakaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{(Request::is('buku')) ? 'active' : ''}}">
               <a class="nav-link" href="{{url('buku')}}">
                  <span>Buku</span></a>
            </li>

            @if(Auth()->user()->role === 'admin')
            <li class="nav-item {{(Request::is('kategori')) ? 'active' : ''}}">
               <a class="nav-link" href="{{url('kategori')}}">
                  <span>Kategori</span></a>
            </li>
            @endif

            @if (Auth()->user()->role === 'admin')
            <li class="nav-item {{(Request::is('anggota')) ? 'active' : ''}}">
               <a class="nav-link" href="{{url('anggota')}}">
                  <span>Anggota</span></a>
            </li>
            @endif

            <li class="nav-item {{(Request::is('pinjam')) ? 'active' : ''}}">
               <a class="nav-link" href="{{url('pinjam')}}">
                  <span>Peminjaman</span></a>
            </li>