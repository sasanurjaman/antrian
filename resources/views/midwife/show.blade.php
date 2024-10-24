@extends('layouts.main')
@section('content')
@section('title', 'Profile')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profil Bidan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content row">
    <!-- Default box -->
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if ($midwife->midwife_image)
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('storage/' . $midwife->midwife_image)}}" alt="{{ $midwife->midwife_name}}">
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="/dist/img/user.png"
                        alt="{{ $midwife->midwife_name}}">
                    @endif
                </div>

                <h3 class="profile-username text-center">{{ $midwife->user->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $midwife->user->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama</b> <a class="float-right">{{ $midwife->midwife_name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Kelamin</b> <a class="float-right">{{ $midwife->midwife_gender}}</a>
                    </li>
                </ul>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
    <div class="col-md-8">
        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title d-inline">About Me</h3>
                @if (auth()->user()->role_id == 2 || auth()->user()->role_id == 4)
                <a href="{{ route('midwife.edit', $midwife->id)}}" class="float-right"><i
                        class="fas fa-user-edit"></i></a>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="far fa-calendar-alt"></i> Tanggal Lahir</strong>
                <p class="text-muted">
                    {{ $midwife->midwife_brithday}}
                </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted">{{ $midwife->midwife_address}}</p>
                <hr>

                <strong><i class="fas fa-star"></i> Spesialisasi</strong>
                <p class="text-muted">
                    {{ $midwife->midwife_specialization}}
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    @if (auth()->user()->role_id <> 4 )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">Jadwal Praktek</h4>
                </div>

                <div class="card-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Waktu Kegiatan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($midwife->user->schedule as $schedule)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $schedule->schedule_name}}</td>
                                <td>{{ $schedule->schedule_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

</section>
<!-- /.content -->

@endsection