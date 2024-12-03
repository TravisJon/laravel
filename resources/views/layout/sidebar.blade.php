<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (Auth::user()->role_id === 1)
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="ri-group-line"></i><span>Data User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse {{ request()->is('datauser') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('datauser') }}" class="{{ request()->is('datauser') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data User</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-laptop"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav"
                class="nav-content collapse {{ request()->is('datapelanggan', 'jenisbarang', 'barangjasa') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                @if (Auth::user()->role_id === 1)
                    <li>
                        <a href="{{ route('datapelanggan') }}"
                            class="{{ request()->is('datapelanggan') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Pelanggan</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role_id === 1)
                    <li>
                        <a href="{{ route('jenisbarang') }}" class="{{ request()->is('jenisbarang') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Jenis Barang</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('barangjasa') }}" class="{{ request()->is('barangjasa') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Barang dan Jasa</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-wrench"></i><span>Data Servis</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav"
                class="nav-content collapse {{ request()->is('tandaterima', 'dataservis/status/baru') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                @if (Auth::user()->role_id === 1)
                    <li>
                        <a href="{{ route('tandaterima') }}"
                            class="{{ request()->is('tandaterima') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Tanda Terima</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('dataservis.baru') }}"
                        class="{{ request()->is('dataservis/status/baru') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Servis</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li> --}}
            </ul>
        </li><!-- End Tables Nav -->

        @if (Auth::user()->role_id === 1)
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-credit-card"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav"
                    class="nav-content collapse {{ request()->is('pengambilan', 'transaksi') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('pengambilan') }}"
                            class="{{ request()->is('pengambilan') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Pengambilan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('transaksi') }}" class="{{ request()->is('transaksi') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Riwayat Transaksi</span>
                        </a>
                    </li>
                    {{-- <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li> --}}
                </ul>
            </li><!-- End Charts Nav -->
        @endif


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav"
                class="nav-content collapse {{ request()->is('laporan_servis', 'laporan_perteknisi', 'laporan_transaksi') ? 'show' : '' }} "
                data-bs-parent="#sidebar-nav">

                @if (Auth::user()->role_id === 1)
                    <li>
                        <a href="{{ route('laporan_servis') }}"
                            class="{{ request()->is('laporan_servis') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Laporan Servis</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('laporan_perteknisi') }}"
                        class="{{ request()->is('laporan_perteknisi') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Laporan Per Teknisi</span>
                    </a>
                </li>

                @if (Auth::user()->role_id === 1)
                    <li>
                        <a href="{{ route('laporan_transaksi') }}"
                            class="{{ request()->is('laporan_transaksi') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Laporan Transaksi</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li><!-- End Icons Nav -->


        <li class="nav-heading">Pages</li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profil Saya</span>
            </a>
        </li><!-- End Profil Saya Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-chat-left-text"></i>
                <span>Pesan</span>
            </a>
        </li><!-- End Profil Saya Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li><!-- End Pengaturan Page Nav --> --}}

        <li class="nav-item">
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                @method('POST')
                <button class="nav-link collapsed" type="submit">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li><!-- End Logout Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
