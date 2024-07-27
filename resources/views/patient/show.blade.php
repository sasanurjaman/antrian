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
                    <li class="breadcrumb-item active">Profil Pasien</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content container-fluid queue-content row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cash-register"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Antrian Saya</span>

                @if ($queque)
                <span class="info-box-number">
                    {{ $queque->queue_number}}
                </span>
                @else
                <span class="info-box-number">
                    <a href="#" data-toggle="modal" data-target="#staticBackdrop">Ambil Antrian</a>
                </span>
                @endif

                {{-- modal --}}
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ambil Antrian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('queue.store')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$patient->id}}" name="patient_id">
                                <div class="modal-body">
                                    Apakah Mau Ambil Antrian Pasien?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-phone-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Nomor Antrian</span>
                <span class="info-box-number queue_latest"></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hospital-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Jumlah Antrian</span>
                <span class="info-box-number queue_count"></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</section>

<section class="content row">
    <!-- Default box -->
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if ($patient->patient_image)
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('storage/'. $patient->patient_image)}}" alt="{{ $patient->patient_name}}">
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="/dist/img/user.png"
                        alt="{{ $patient->patient_name}}">
                    @endif
                </div>

                <h3 class="profile-username text-center">{{ $patient->name}}</h3>

                <p class="text-muted text-center">{{ $patient->role_name}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $patient->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama</b> <a class="float-right">{{ $patient->patient_name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Kelamin</b> <a class="float-right">{{ $patient->patient_gender}}</a>
                    </li>
                </ul>
                @if ($patient->patient_is_bpjs == 1)
                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-bpjs"><b>Lihat
                        photo BPJS</b></a>
                @endif

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
                @if (auth()->user()->role_id == 3)
                <a href="{{ route('patient.edit', $patient->id)}}" class="float-right"><i
                        class="fas fa-user-edit"></i></a>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-location-arrow"></i></i> Tempat Lahir</strong>
                <p class="text-muted">
                    {{ $patient->patient_born}}
                </p>
                <hr>

                <strong><i class="far fa-calendar-alt"></i> Tanggal Lahir</strong>
                <p class="text-muted">
                    {{ $patient->patient_brithday}}
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Umur</strong>
                <p class="text-muted">
                    {{ $patient->patient_age}}
                </p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">{{ $patient->patient_address}}</p>

                <hr>

                <strong><i class="fas fa-info-square"></i> Status</strong>

                <p class="text-muted">
                    {{ $patient->patient_status}}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i>Anggta BPJS</strong>
                @if ($patient->patient_is_bpjs == 1)
                <p class="text-muted">Ya</p>
                @else
                <p class="text-muted">Bukan</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

</section>
<!-- /.content -->

<div class="modal fade" id="modal-bpjs">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Phot BPJS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img class="card-img-top" src="{{ $patient->patient_file }}" alt="Card image cap">
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection

@push('script')
<script>
    $(function() {
            queuelatest();
        })
    setInterval(queuelatest, 1000);
    
    function queuelatest() {
        $.get('/queuelatest', {}, function (data) {
            $('.queue_count').text(data.queue_count);
            $('.queue_latest').text(data.queue_latest);
        })
    }queuelatest
</script>
@endpush