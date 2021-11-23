@extends('petugas')
@section('judul','Arsip')
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
                    <h3 class="mt-4">Arsip Surat</h3>
                    <h6 class="breadcrumb-item active">
                        Berikut ini adalah surat - surat yang telah terbit dan diarsipkan. <br>
                        Klik "Lihat" pada kolom aksi untuk menampilkan surat.
                    </h6><br><br>
                    <form action="/search" method="GET">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">Cari surat:</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" id="inputPassword" name="search" required>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary mb-3">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>NO</th>
                              <th>Nomor Surat</th>
                              <th>Kategori</th>
                              <th>Judul</th>
                              <th>Waktu pengarsipan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($dataarsip as $arsip)
                            <tr>
                                <td width="5%">{{$loop->iteration}}</td>
                                <td width="20%">{{$arsip->NOMOR}}</td>
                                <td width="15%">{{$arsip->KAT_NAMA}}</td>
                                <td width="20%">{{$arsip->JUDUL}}</td>
                                <td width="20%">{{$arsip->WAKTU}}</td>
                                <td width="20%%">
                                    <form class="d-inline" action="{{url('/delete/'.$arsip->ID)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus arsip surat ini?')">
                                        @method('delete')
                                        @csrf
                                        <button  class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    <a href="/unduh/{{$arsip->DIREKTORI}}" class="btn btn-success btn-sm">Unduh</a>
                                    <a href="/arsip/{{$arsip->ID}}" class="btn btn-primary btn-sm">Lihat >></a>
                                </td>
                            </tr>
                            @empty
                               <tr>
                                    <td colspan="6"><h4 class="text-center"><b>Tidak ada data</b></h4></td>
                               </tr>
                            @endforelse
                          </tbody>
                    </table>
                    <a href="/unggah" class="btn btn-primary">Arsipkan Surat</a>
                </div>
            </main>
        </div>
    </div>
</body>
@endsection