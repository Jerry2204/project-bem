        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        @if(auth()->user()->role == 'admin')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/list_departemen" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Departemen</span></a></li>
                        @endif
                        @if(auth()->user()->role == 'kadep')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Informasi Departemen</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="/proker/{{ auth()->user()->kadep->departemen->id }}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">Program Kerja</span></a></li>
                                <li class="sidebar-item"><a href="/anggota/{{ auth()->user()->kadep->departemen->id }}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">Anggota</span></a></li>
                            </ul>
                        </li>
                        @endif
                        @if(auth()->user()->role == 'admin')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/list_kadep" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Kepala Departemen</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/keuangan" aria-expanded="false"><i class="fas fa-money-bill-alt"></i><span class="hide-menu"> Pemasukan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/pengeluaran" aria-expanded="false"><i class="fas fa-money-bill-alt"></i><span class="hide-menu"> Pengeluaran</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu"> Admin</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/kelas" aria-expanded="false"><i class="fas fa-users"></i><span class="hide-menu"> Kelas</span></a></li>
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
