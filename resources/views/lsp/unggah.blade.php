@extends('petugas')
@section('judul','Unggah Arsip')
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
                    <h3 class="mt-4">Arsip Surat >> Unggah</h3>
                    <h6 class="breadcrumb-item active">
                        Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
                        Catatan: Gunakan file berformat PDF
                    </h6><br><br>
                    <form action="/add" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" required name="no">
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="text-danger">
                                @error('no')
                                    {{$message}}
                                @enderror
                            </div><br><br><br>
                            <label for="inputPassword" class="col-sm-2 col-form-label">kategori</label>
                            <div class="col-sm-4">
                              <select class="form-select" aria-label="Default select example" required name="kategori">
                                @foreach ($kategori as $kat)
                                    <option value="{{$kat->KAT_ID}}">{{$kat->KAT_NAMA}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="text-danger">
                              @error('kategori')
                                  {{$message}}
                              @enderror
                          </div><br><br><br>
                            <label for="inputPassword" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" required name="judul">
                            </div>
                            <div class="text-danger">
                              @error('judul')
                                  {{$message}}
                              @enderror
                          </div><br><br><br>
                            <label for="inputPassword" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                            <div class="col-sm-4">
                              <input type="file" class="form-control" required name="file">
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="text-danger">
                              @error('file')
                                  {{$message}}
                              @enderror
                          </div><br><br><br>
                            <div class="form-group">
                              <div class="col-sm-12">
                                <a class="btn btn-secondary" href="/" role="button"><< Kembali</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>
@endsection