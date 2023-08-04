<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Nilai;
use App\Models\Absensi;
use App\Models\Pengajuan;
use App\Models\Tempatpkl;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Nilaiinstansi;
use Illuminate\Support\Facades\Auth;
use Storage;

class AdminController extends Controller
{
    function index(){
        return view('index');
    }
    function admin(){
        $data = Absensi::all();
        return view('guru.index', compact('data'));
    }
    function guru(){
        $data = Absensi::all();
        return view('guru.index', compact('data'));
    }
    function panitia(){
        $data = Absensi::all();
        return view('guru.index', compact('data'));
    }
    function instansi(){
        $data = Absensi::all();
        return view('guru.index', compact('data'));
    }
    function siswa(){
        return view('index');
    }
    //absensi
    function absensi(){
        return view('siswa.absensi');
    }
    function send(Request $request){
        // dd($request->all());
        // $id = $request->input('id');

        // // Cek status pengajuan siswa dengan ID tersebut
        // $siswa = User::find($id);

        // // Jika siswa belum melakukan pengajuan, kembalikan pesan error
        // if (!$siswa || $siswa->pengajuan !== 'sudah diajukan') {
        //     return redirect()->back()->with('error', 'Anda belum melakukan pengajuan.');
        // }
        // return redirect('prakerin/absensi');
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'laporan' => 'required|string',
            'image' => 'required|string', // Adjust this rule if needed
            'photo_laporan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust this rule if needed
        ]);

        // Check if the user has already submitted data on the same day
            $existingData = Absensi::where('nis', $request->nis)
            ->whereDate('created_at', Carbon::today())
            ->first();

            if ($existingData) {
                return redirect()->back()->with('error', 'Anda sudah mengisi data hari ini.');
            }
        
        // Process the webcam-captured image
        $imageData = $request->input('image');
        $folderPath = "public/absensi/";
        // $imageData = str_replace('data:image/jpg;base64,', '', $imageData);
        $image_parts = explode(";base64", $imageData);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_base64 = base64_decode($image_parts[1]);
        // $imageData = str_replace(' ', '+', $imageData);
        // $imageFile = base64_decode($imageData);
        // $filename = uniqid('capture_', true) . '.jpg';
        $filename = $request->name . "_" . time() . ".png";
        // dd($filename);
        $file = $folderPath . $filename;
        Storage::put($file, $image_base64);
        $data = Absensi::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'email' => $request->email,
            'laporan' => $request->laporan,
            'image' => $filename,
            'photo_laporan' => $request->photo_laporan,
        ]);
        // $path = public_path('absensi/' . $filename);
        // file_put_contents($path, $imageFile);
        // $data->image = 'absensi/' . $filename; // Save the image path to the data model
        
        // Process the uploaded photo_laporan image
        $image = $request->file('photo_laporan');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('laporan'), $imagename);
        $data->photo_laporan = 'laporan/' . $imagename;
    $data->save();

    return redirect()->back()->with('success', 'Berhasil dikirim');
    }

    function showabsen(){
        $data = absensi::all();
        return view('guru.index', compact('data'));
    }

    function showsiswa($role){
        $data = user::where('role',['siswa'], $role)->get();
        return view('guru.auth.siswa', compact('data'));
    }

    function addsiswa(){
        $data = Jurusan::all();
        return view('guru.auth.addsiswa', compact('data'));

    }
    function uploadsiswa(Request $request){
        $data = new User;
        $data->name = $request->name;
        $data->nis = $request->nis;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->kelas = $request->input('kelas');
        $data->jurusan = $request->input('jurusan');
        $data->gender = $request->input('gender');
        $data->save();
        return redirect()->back()->with('success', 'Data siswa berhasil disimpan.');
    }
    
    function deletesiswa($id){
        $data = user::whereId($id)->first();
            $data->delete();
            return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
        }
        
    function editsiswa( $id){
        $data = User::whereId($id)->first();
        $jurusan = Jurusan::all();
        return view('guru.auth.editsiswa', compact('data', 'jurusan'));
    }

    function savesiswa(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->nis = $request->nis;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->kelas = $request->input('kelas');
        $data->jurusan = $request->input('jurusan');
        $data->gender = $request->input('gender');
        $data->save();
        return redirect()->back()->with('success', 'Siswa berhasil diubah');
    }

    //guru
    function showguru($role){
        $data = user::where('role',['guru'], $role)->get();
        return view('guru.auth.guru', compact('data'));
    }
    
    function deleteguru($id){
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }
    
    function addguru(){
        return view('guru.auth.addguru');
    }
    
    function uploadguru(Request $request){
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->gender = $request->input('gender');
        $data->role = $request->role;
        $data->save();
        return redirect()->back()->with('success', 'Data guru berhasil disimpan.');
    }
    function editguru($id){
        $data = User::find($id);
        return view('guru.auth.editguru',compact('data'));
    }
    function saveguru(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->gender = $request->input('gender');
        $data->save();
        return redirect()->back()->with('success', 'Data guru berhasil diubah.');
    }
    //tempat pkl
    function showpkl(){
        $data = Pengajuan::all();
        return view('guru.auth.showpkl', compact('data'));
    }
    function addpkl(){
        $jurusan = Jurusan::all();
        return view('guru.auth.addpkl', compact('jurusan'));
    }
    function uploadpkl(Request $request){
        $data = new Tempatpkl;
        $data->nama = $request->name;
        $data->jurusan = $request->jurusan;
        $data->instansi = $request->instansi;
        $data->kelas = $request->kelas;
        $data->gender = $request->input('gender');
        $data->save();
        return redirect()->back()->with('success', 'Data Tempat PKL berhasil disimpan.');
    }
    function editpkl($id){
        $data = Tempatpkl::find($id);
        $jurusan = Jurusan::all();
        return view('guru.auth.editpkl', compact('data', 'jurusan'));
    }
    function savepkl(Request $request, $id){
        $data = Tempatpkl::find($id);
        $data->nama = $request->name;
        $data->jurusan = $request->jurusan;
        $data->instansi = $request->instansi;
        $data->kelas = $request->kelas;
        $data->gender = $request->input('gender');
        $data->save();
        return redirect()->back()->with('success', 'Data Tempat PKL berhasil diubah.');
    }
    function delpkl($id){
        $data = Tempatpkl::find($id);
        $data->delete();
        
        return redirect()->back();
    }
    //rekomendasi
    function showrekomen(){
        $data = Rekomendasi::all();
        return view('guru.auth.showrekomen', compact('data'));
    }

    function uploadreko(Request $request){
        $data = new Rekomendasi;
        $data->instansi = $request->instansi;
        $data->jurusan = $request->jurusan;
        $data->alamat = $request->alamat;
        $data->phone = $request->phone;
        $data->kuota = $request->kuota;
        $data->save();
        return redirect()->back()->with('success', 'Data Tempat Rekomendasi berhasil ditambah.');
    }
    function addreko(){
        return view('guru.auth.addrekomendasi');
    }
    function editreko($id){
        $data = Rekomendasi::find($id);
        return view('guru.auth.editreko',compact('data'));
    }
    function savereko(Request $request, $id){
        $data = Rekomendasi::find($id);
        $data->instansi = $request->instansi;
        $data->jurusan = $request->jurusan;
        $data->alamat = $request->alamat;
        $data->phone = $request->phone;
        $data->kuota = $request->kuota;
        $data->save();
        return redirect()->back()->with('success', 'Data Tempat Rekomendasi berhasil diubah.');
    }
    function delreko($id){
        $data = Rekomendasi::find($id);
        $data->delete();
        return redirect()->back();
    }
    //absen
    function delabsen($id){
        $data = Absensi::find($id);
        $data->delete();
        return redirect()->back();
    }

    function monitoring(){
        $data = Tempatpkl::all();
        return view('guru.auth.monitor', compact('data'));
    }

    //nilai
    function nilai(){
        $data = Tempatpkl::all();
        return view('guru.auth.nilai', compact('data'));
    }
    function givenilai($id){
        $data = Tempatpkl::find($id);
        $data->nilai='Sudah dinilai';
        $data->save();
        return redirect()->back();
    }

    function sendnilai(Request $request, $id){
        $data = new Nilai;
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

    //user
    function datatempat(){
        $data = Rekomendasi::all();
        return view('siswa.datatempat', compact('data'));
    }
    function tempatpkl(){
        $data = tempatpkl::all();
        return view('siswa.tempatpkl', compact('data'));
    }
    // function nilaippkl(){
    //     $data = Nilai::all();
    //     return view('siswa.nilaipkl', compact('data'));
    // }
    function nilaipkl(){
        if (Auth::check()) { // Check if the user is authenticated
            $name = Auth::user()->name;
            
            // Fetch records from the 'Nilai' table where 'name' matches the user's name
            $data = Nilai::where('name', $name)->get();
    
            // Fetch records from the 'Nilaiinstansi' table where 'name' matches the user's name
            $instansi = Nilaiinstansi::where('name', $name)->get();
    
            return view('siswa.nilaipkl', compact('data', 'instansi'));
        } else {
            return redirect()->back();
        }
    }

    function getGradeFromPercentage($percentage) {
        if ($percentage >= 86 && $percentage <= 100) {
            return 'A';
        } elseif ($percentage >= 76 && $percentage <= 85) {
            return 'B';
        } elseif ($percentage >= 60 && $percentage <= 75) {
            return 'C';
        } else {
            return 'N/A'; // If the percentage does not fall within any range, return 'N/A' or handle as needed
        }
    }

    function pengajuan(){
        
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $data = Pengajuan::where('id', $id)->get();
            return view('siswa.pengajuan', compact('data'));
        }else{
            return redirect()->back();
        }

    }
    function addpengajuan(){
        return view('siswa.addpengajuan');
    }
    function sendpengajuan(Request $request){
            // Retrieve the stok_obat from the Obat model
        $kuota = Rekomendasi::where('instansi', $request->instansi)->value('kuota');

        // Calculate the new stok_obat after deducting the quantity
        $newkuota = $kuota - 1;
    
    if ($newkuota < 0) {
        return redirect()->back()->withErrors('Kuota Sudah Penuh.')->withInput();
    }
        $data = new Pengajuan();
        $data->name = $request->name;
        $data->nis = $request->nis;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->instansi = $request->instansi;
        // $data->status = $request->status;
        $data->save();

        // Update the stok_obat in the Obat table
        Rekomendasi::where('instansi', $request->instansi)->update(['kuota' => $newkuota]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim');
    }

    function delpengajuan($id){
        $data = Pengajuan::find($id);
        $data->delete();
        return redirect()->back();
    }
    function pengajuanpkl(){
        $data = Pengajuan::all();
        return view('guru.auth.pengajuan', compact('data'));
    }

    function terima($id){
        $data = Pengajuan::find($id);
        $data->status='Diterima';
        $data->save();
        return redirect()->back();
    }
    function tolak($id){
        $data = Pengajuan::find($id);
        $data->status='Ditolak';
        $data->save();
        return redirect()->back();
    }
    function batal($id){
        $data = Pengajuan::find($id);
        $data->status='Diproses';
        $data->save();
        return redirect()->back();
    }

    function jurusan(){
        $data = Jurusan::all();
        return view('guru.auth.jurusan', compact('data'));
    }
    function addjurusan(Request $request){
        $data = new Jurusan;
        $data -> jurusan = $request -> jurusan;
        $data -> save();
        return redirect()->back()->with('success', 'Jurusan Berhasil Ditambah!');
    }
    function deljurusan($id){
        $data = Jurusan::find($id);
        $data -> delete();
        return redirect()->back()->with('danger', 'Jurusan Berhasil Dihapus!');
    }

    function editjurusan($id){
        $data = Jurusan::find($id);
        return view('guru.auth.editjurusan', compact('data'));
    }
    function savejurusan(Request $request, $id){
        $data = Jurusan::find($id);
        $data -> jurusan = $request -> jurusan;
        $data -> save();
        return redirect()->back()->with('success', 'Jurusan Berhasil Diubah!');
    }
    // function editpengajuan($id){
    //     $data = Pengajuan::find($id);
    //     return view('siswa.editpengajuan', compact('data'));
    // }
    // function savepengajuan(Request $request, $id){
    //     $data = Pengajuan::find($id);
    //     $data->name = $request->name;
    //     $data->nis = $request->nis;
    //     $data->kelas = $request->kelas;
    //     $data->jurusan = $request->jurusan;
    //     $data->instansi = $request->instansi;
    //     // $data->status = $request->status;
    //     $data->save();
    //     return redirect()->back()->with('success', 'Pengajuan berhasil diubah');
    // }

}
