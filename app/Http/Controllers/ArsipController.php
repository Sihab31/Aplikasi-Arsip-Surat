<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipModel;
use Illuminate\Support\Facades\Stroage;

class ArsipController extends Controller
{
    public function __construct()
    {
        $this->ArsipModel = new ArsipModel();
    }
    public function index() //Proses Controller Menampilkan data Arsip
    {
        $data = [
            'dataarsip' => $this->ArsipModel->allData(),
        ];
        return view('lsp/arsip',$data);
    }
    public function create() //Proses Controller Menampilkan form Unggah data Arsip
    {
        $data = [
            'kategori' => $this->ArsipModel->kategori(),
        ];
        return view('lsp/unggah',$data);
    }
    public function store() //Proses Controller Mengunggah data Arsip
    {
        Request()->validate([
            'no' => 'unique:arsip,ID',
            'judul' => 'max:50|unique:arsip,JUDUL',
            'file' => 'mimes:pdf',
        ],[
            'no.unique'=>'*Nomor surat sudah ada',
            'judul.unique'=>'*Judul surat sudah ada',
            'judul.max'=>'*Maksimal 50 Karakter',
            'file.mimes'=>'*File yang digunakan harus berupa PDF',
        ]);
            $file= Request()->file;
            //renamefile
            $fileName = Request()->judul.'.'.$file->extension();
            $file->move(public_path('arsip'),$fileName);

            $waktu = date("Y-m-d H:i");
            //dd($waktu);
            $data = [
                'NOMOR' => Request()->no,
                'ID_KAT' => Request()->kategori,
                'JUDUL' => Request()->judul,
                'DIREKTORI' => $fileName,
                'WAKTU' => $waktu,
            ];

            $this->ArsipModel->add($data);
            return redirect('/')->with('pesan','Data berhasil ditambahkan');
    }
    public function edit($id) //Proses Controller Menampilkan form Update data Arsip
    {
        $data = [
            'kategori' => $this->ArsipModel->kategori(),
            'edit' => $this->ArsipModel->PDF($id),
        ];
        return view('lsp/update',$data);
    }
    public function update($id) //Proses Controller Mengupdate data Arsip
    {
        Request()->validate([
            'no' => 'unique:arsip,ID',
            'judul' => 'max:50|unique:arsip,JUDUL',
            'file' => 'mimes:pdf',
        ],[
            'no.unique'=>'*Nomor surat sudah ada',
            'judul.unique'=>'*Judul surat sudah ada',
            'judul.max'=>'*Maksimal 50 Karakter',
            'file.mimes'=>'*File yang digunakan harus berupa PDF',
        ]);
            $fileName = Request()->soft;
            $file= Request()->file;
            //renamefile
            if ($file != '') {
                $fileName = Request()->judul.'.'.$file->extension();
                $file->move(public_path('arsip'),$fileName);
            }

            $waktu = date("Y-m-d H:i");
            //dd($waktu);
            $data = [
                'ID_KAT' => Request()->kategori,
                'JUDUL' => Request()->judul,
                'DIREKTORI' => $fileName,
                'WAKTU' => $waktu,
            ];

            $this->ArsipModel->rubah($data, $id);
            return redirect("/arsip/$id")->with('pesan','Data berhasil dirubah');
    }
    public function delete($id) //Proses Controller Menghapus data Arsip
    {
        $pdf = $this->ArsipModel->PDF($id);

        if($pdf->DIREKTORI <> ""){
            unlink(public_path('arsip').'/'.$pdf->DIREKTORI);
        }

        $this->ArsipModel->hapus($id);
        return redirect('/')->with('pesan','Data berhasil dihapus');
    }
    public function search() //Proses Controller Mencari data Arsip
    {
        $cari = Request()->search;
        $data = [
            'dataarsip' => $this->ArsipModel->search($cari),
        ];
        return view('lsp/arsip',$data);
    }
    public function unduh($file) //Proses Controller Mengunduh data Arsip
    {
        return response()->download(public_path('arsip/'.$file));
    }
    public function detail($no) //Proses Controller Menampilkan detail data Arsip
    {
        $data = [
            'detail' => $this->ArsipModel->detail($no),
        ];
        return view('lsp/detail',$data);
    }
}
