@extends('layouts.main')
@section('content')
@section('title', 'Edit Profil')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form isian Edit Profil</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('midwife.update', $midwife->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $midwife->user_id}}">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="midwife_name">Nama Lengkap</label>
                        <input required name="midwife_name" type="text"
                            class="form-control @error('midwife_name') is-invalid @enderror"
                            value="{{ old('midwife_name', $midwife->midwife_name)}}" id="midwife_name">
                        @error('midwife_name')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="midwife_gender">Jenis Kelamin</label>
                        <select id="midwife_gender" name="midwife_gender"
                            class="custom-select form-control @error('midwife_gender') is-invalid @enderror" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Laki-laki" {{ old('midwife_gender', $midwife->midwife_gender)=='Laki-laki' ?
                                'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ old('midwife_gender', $midwife->midwife_gender)=='Perempuan' ?
                                'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('midwife_gender')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="midwife_brithday">Tanggal Lahir</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input required name="midwife_brithday" type="text" id="midwife_brithday"
                                class="form-control datetimepicker-input @error('midwife_brithday') is-invalid @enderror"
                                value="{{ old('midwife_brithday', $midwife->midwife_brithday)}}">
                            <div class="input-group-append">
                                <label for="midwife_brithday" class="input-group-text"><i
                                        class="far fa-calendar-alt"></i></label>
                            </div>
                            <input type="hidden" id="selected_date" name="selected_date">
                            @error('midwife_brithday')
                            <div class="invalid-feedback input-group-append">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="midwife_address">Alamat Lengkap</label>
                        <textarea required name="midwife_address"
                            class="form-control @error('midwife_address')is-invalid @enderror"
                            rows="3">{{ old('midwife_address', $midwife->midwife_address) }}</textarea>
                        @error('midwife_address')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="midwife_specialization">Spesialisasi</label>
                        <input required name="midwife_specialization" type="text"
                            class="form-control @error('midwife_specialization') is-invalid @enderror"
                            value="{{ old('midwife_specialization', $midwife->midwife_specialization)}}"
                            id="midwife_specialization">
                        @error('midwife_specialization')
                        <div class="invalid-feedback input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="midwife_image">Foto</label>
                        <div class="input-group">
                            <input name="midwife_image" type="file"
                                class="custom-file-input @error('midwife_image')is-invalid @enderror"
                                id="midwife_image">
                            <label class="custom-file-label" for="midwife_image">Browse</label>
                        </div>
                        @error('midwife_image')
                        <div class="invalid-feedback input-group-append input-group-append">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if ($midwife->midwife_image)
                        <img src="{{ asset('storage/'.$midwife->midwife_image) }}"
                            class="img-fluid col-sm-3 img-pasien">
                        @else
                        <img class="img-fluid col-sm-3 img-pasien">
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@push('css')
<link rel="stylesheet" href="../../plugins/jquery-ui/jquery-ui.min.css">
@endpush

@push('script')
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    // datefiker
        $(function() {
            $("#midwife_brithday").datepicker({
            dateFormat: "yy-mm-dd", // Change the date format as per your requirement
            onSelect: function(date) {
                $("#selected_date").val(date);
                }
            });
        });

    // preview image pasien
        $('#midwife_image').change(function() {
            const image = this.files[0];
            const readerImage = new FileReader();

            readerImage.readAsDataURL(image);
            readerImage.onload = function(e) {
                $('.img-pasien').attr('src', e.target.result);
            }
        })
</script>

@endpush