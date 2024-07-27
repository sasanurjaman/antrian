<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Klinik dr. Agung</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

                @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fa-th nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a href="{{ route('queue.index') }}" class="nav-link">
                        <i class="fa-th nav-icon far fa-list-alt"></i>
                        <p>
                            Antrian Pasien
                        </p>
                    </a>
                </li>
                @endif

                @php
                $user_id = Auth::user()->id;
                $patient = App\Models\Patient::where('user_id', $user_id)->first();
                $doctor = App\Models\Doctor::where('user_id', $user_id)->first();
                @endphp

                @if (Auth::user()->role_id == 3)
                <li class="nav-item">
                    <a href="{{ route('patient.show', $patient->id) }}" class="nav-link">
                        <i class="fa-th nav-icon fas fa-user-alt"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role_id == 2)
                <li class="nav-item">
                    <a href="{{ route('doctor.show', $doctor->id) }}" class="nav-link">
                        <i class="fa-th nav-icon fas fa-user-alt"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('schedule.index')}}" class="nav-link">
                        <i class="fa-th nav-icon far fa-calendar-check"></i>
                        <p>
                            Jadwal Doktor
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role_id == 2 or Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a href="{{ route('patient.index')}}" class="nav-link">
                        <i class="fa-th nav-icon far fa-address-book"></i>
                        <p>
                            Daftar Pasien
                        </p>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                    <a href="{{ route('doctor.index')}}" class="nav-link">
                        <i class="fa-th nav-icon fas fa-user-md"></i>
                        <p>
                            Daftar Doktor
                        </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('logout') }}}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>