<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller{
    public function mahasiswa(){
        $mahasiswa = Mahasiswa::query()
                ->orderBy('id', 'desc')
                ->paginate(10);
        return view('/mahasiswa/mahasiswa',['mahasiswa' => $mahasiswa]);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $mahasiswa = Mahasiswa::query()
            ->where('nim','like', '%'.$cari.'%')
            ->orWhere('nama', 'like', '%'.$cari.'%')
            ->paginate();
        return view('/mahasiswa/mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function formMahasiswa(){
        return view('/mahasiswa/formMahasiswa');
    }

    public function saveMahasiswa(Request $request){
        $minat = implode(", ", $request->get('minat'));
        Mahasiswa::create([
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'jurusan'=>$request->jurusan,
            'bidang_minat'=>$minat
        ]);
        return redirect('/mahasiswa/mahasiswa')->with('alertCreate', 'Data Berhasil Ditambahkan');
    }

    public function formupdateMahasiswa($id){
        $mahasiswa = Mahasiswa::find($id);
        return view('/mahasiswa/updateMahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function updateMahasiswa($id, Request $request){
        $minat = implode(', ', $request->minat);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->gender = $request->gender;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->bidang_minat = $minat;
        $mahasiswa->save();

        return redirect('/mahasiswa/mahasiswa')->with('alertUpdate', 'Data Berhasil Diubah');
    }

    public function deleteMahasiswa($id){
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        
        return redirect('/mahasiswa/mahasiswa')->with('alertDelete', 'Data Berhasil Dihapus');
    }
    
}