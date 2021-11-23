<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArsipModel extends Model
{
    use HasFactory;

    public function allData() //Proses Model menampilkan data Arsip
    {
        return DB::table('arsip')
        ->join('kategori', 'kategori.kat_id', '=', 'arsip.id_kat')
        ->select('arsip.*','kategori.KAT_NAMA')
        ->get();
    }
    public function kategori() //Proses Model menampilkan kategori dari data Arsip
    {
        return DB::table('kategori')->get();
    }
    public function add($data) //Proses Model mengunggah data Arsip
    {
        DB::table('arsip')->insert($data); //Proses Model mengunggah data Arsip
    }
    public function rubah($data, $id) //Proses Model mengupdate data Arsip
    {
        DB::table('arsip')->where('id',$id)->update($data);
    }
    public function PDF($id) //Proses Model menampilkan data Arsip berdasarkan id
    {
        return DB::table('arsip')->where('id',$id)->first();
    }
    public function hapus($id) //Proses Model menghapus data Arsip
    {
        return DB::table('arsip')->where('id',$id)->delete();
    }
    public function search($search) //Proses Model mencari data Arsip
    {
        return DB::table('arsip')
        ->join('kategori', 'kategori.kat_id', '=', 'arsip.id_kat')
        ->select('arsip.*','kategori.KAT_NAMA')
        ->where('judul','like','%'.$search.'%')
        ->get();
    }
    public function detail($no) //Proses Model menampilkan detail data Arsip
    {
        return DB::table('arsip')
        ->join('kategori', 'kategori.kat_id', '=', 'arsip.id_kat')
        ->select('arsip.*','kategori.KAT_NAMA')
        ->where('id',$no)
        ->first();
    }
}
