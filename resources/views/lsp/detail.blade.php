@extends('petugas')
@section('judul','Detail Arsip')
@section('body')
<body class="sb-nav-fixed">
    @include('navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @if (session('pesan'))
                    <div class="x_content bs-example-popovers">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <h5 class="text-center">{{ session('pesan') }}</h5>
                        </div>
                    </div>
                    @endif
                    <h3 class="mt-4">Arsip Surat >> Lihat</h3><br>
                    <table class="table table-borderless">
                        <tr>
                          <th width="12%">Nomor</th>
                          <td width="88%">: {{$detail->NOMOR}}</td>
                        </tr>
                        <tr>
                          <th width="12%">Kategori</th>
                          <td width="88%">: {{$detail->KAT_NAMA}}</td>
                        </tr>
                        <tr>
                          <th width="12%">Judul</th>
                          <td width="88%">: {{$detail->JUDUL}}</td>
                        </tr>
                        <tr>
                            <th width="12%">Waktu Unggah</th>
                            <td width="88%">: {{$detail->WAKTU}}</td>
                          </tr>
                    </table>
                    <center><iframe class="mb-4" width="1200" height="500"src="{{asset("arsip/$detail->DIREKTORI")}}" alt=""></iframe></center>
                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                          <a class="btn btn-secondary" href="/" role="button"><< Kembali</a>
                          <a class="btn btn-success" href="/unduh/{{$detail->DIREKTORI}}" role="button">Unduh</a>
                          <a class="btn btn-warning" href="/edit/{{$detail->ID}}" role="button">Edit / Ganti File</a>
                        </div>
                      </div>
                </div>
                
        </div>
    </div>
</body>
@endsection