<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Tempatpkl;
use Illuminate\Http\Request;
use App\Models\Nilaiinstansi;
use App\Http\Controllers\Controller;
use App\Models\User;

class InstansiController extends Controller
{
    function kehadiran(){
        $data = Absensi::all();
        return view('guru.auth.kehadiran', compact('data'));
    }
    function hadir($id){
        $data = Absensi::find($id);
        $data -> verifikasi = 'Hadir';
        $data->save();
        return redirect()->back();
    }
    function nonhadir($id){
        $data = Absensi::find($id);
        $data -> verifikasi = 'Tidak Hadir';
        $data->save();
        return redirect()->back();
    }
    function nilai(){
        $data = Tempatpkl::all();
        return view('guru.auth.nilai2', compact('data'));
    }
    function give($id){
        $data = Tempatpkl::find($id);
        $data->nilaiinstansi='Sudah dinilai';
        $data->save();
        return redirect()->back();
    }
    function send(Request $request,$id){
        $data = new Nilaiinstansi;
        $data->name = $request->name;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->instansi = $request->instansi;
        $data->prestasi = $request->prestasi;
        $data->disiplin = $request->disiplin;
        $data->inisiatif = $request->inisiatif;
        $data->kerjasama = $request->kerjasama;
        $data->sikap = $request->sikap;
        $data->kehadiran = $request->kehadiran;
        $data->save();
        return redirect()->back();
    }

    function instansi($role){
        $data = User::where('role',['instansi'], $role)->get();
        return view('guru.auth.instansi', compact('data'));
    }
    function addinstansi(){
        return view('guru.auth.addinstansi');
    }
    function uploadinstansi(Request $request){
        $data = new User;
        $data -> name = $request -> name;
        $data -> email = $request ->email;
        $data -> alamat_instansi = $request->alamat_instansi;
        $data -> password = bcrypt($request->password);
        $data -> role = $request->role;
        $data -> save();
        return redirect()->back()->with('success', 'Instansi Berhasil ditambah');
    }

    function delete($id){
        $data = User::find($id);
        $data -> delete();
        return redirect()->back()->with('success', 'Instansi Berhasil dihapus');
    }
    function edit($id){
        $data = User::find($id);;
        return view('guru.auth.editinstansi', compact('data'));
    }
    function postedit(Request $request, $id){
        $data = User::find($id);;
        $data -> name = $request -> name;
        $data -> email = $request ->email;
        $data -> alamat_instansi = $request->alamat_instansi;
        $data -> password = bcrypt($request->password);
        $data -> role = $request->role;
        $data -> save();
        return redirect()->back()->with('success', 'Instansi Berhasil ditambah');
    }
}
