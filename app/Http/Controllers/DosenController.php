<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class DosenController extends Controller{
    public function dosen(){
        $dosen = Dosen::query()
                ->orderBy('id', 'desc')
                ->paginate(10);
        return view('/dosen/dosen',['dosen' => $dosen]);
    }

    public function search(Request $request){
        $cari = $request->cari;
        $dosen = Dosen::query()
            ->where('nip','like', '%'.$cari.'%')
            ->orWhere('nama', 'like', '%'.$cari.'%')
            ->paginate();
        return view('/dosen/dosen', ['dosen' => $dosen]);
    }

    public function formDosen(){
        return view('/dosen/formDosen');
    }

    public function saveDosen(Request $request){
        Dosen::create([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'no_hp'=>$request->no_hp,
            'email'=>$request->email
        ]);
        return redirect('/dosen/dosen')->with('alertCreate', 'Data Berhasil Ditambahkan');
    }

    public function formupdateDosen($id){
        $dosen = Dosen::find($id);
        return view('/dosen/updateDosen', ['dosen' => $dosen]);
    }

    public function updateDosen($id, Request $request){
        $dosen = Dosen::find($id);
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->gender = $request->gender;
        $dosen->no_hp = $request->no_hp;
        $dosen->email = $request->email;
        $dosen->save();

        return redirect('/dosen/dosen')->with('alertUpdate', 'Data Berhasil Diubah');
    }

    public function deleteDosen($id){
        $dosen = Dosen::find($id);
        $dosen->delete();
        
        return redirect('/dosen/dosen')->with('alertDelete', 'Data Berhasil Dihapus');
    }
    
}