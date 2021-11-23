@extends('petugas')
@section('judul','Update Arsip')
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
                    <h3 class="mt-4">Arsip Surat >> Update</h3>
                    <h6 class="breadcrumb-item active">
                        Update surat yang telah terbit pada form ini untuk diarsipkan. <br>
                        Catatan: Gunakan file berformat PDF
                    </h6><br><br>
                    <form action="/update/{{$edit->ID}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Nomor Surat</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="no" value="{{$edit->NOMOR}}" readonly>
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
                                    <option value="{{$kat->KAT_ID}}" {{$edit->ID_KAT == $kat->KAT_ID? 'selected' : ''}}>{{$kat->KAT_NAMA}}</option>
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
                              <input type="text" class="form-control" name="judul" value="{{$edit->JUDUL}}">
                            </div>
                            <div class="text-danger">
                              @error('judul')
                                  {{$message}}
                              @enderror
                          </div><br><br><br>
                            <label for="inputPassword" class="col-sm-2 col-form-label">File Surat (PDF)</label>
                            <div class="col-sm-4">
                              <input type="file" class="form-control" name="file">
                              <input type="hidden" class="form-control" required name="soft" value="{{$edit->DIREKTORI}}">
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="text-danger">
                              @error('file')
                                  {{$message}}
                              @enderror
                          </div><br><br><br>
                            <div class="form-group">
                              <div class="col-sm-12">
                                <a class="btn btn-secondary" href="/arsip/{{$edit->ID}}" role="button"><< Kembali</a>
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