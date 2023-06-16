<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\mahasiswa;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ['key'=>'home']);
    }
    public function profile()
    {
        return view('profile', ['key'=>'profile']);
    }
    public function student()
    {
        $mhs=Mahasiswa::paginate(10);

        return view('student', ['key'=>'student', 'mhs'=>$mhs]);
    }
    public function search(Request $request)
    {
        $cari=$request->q;
        $mhs= Mahasiswa::where('nama','like','%'.$cari.'%')->paginate(5);
        $mhs->appends($request->all());
        return view('student',['key'=>'student', 'mhs'=>$mhs]);
    }
    public function formadd()
    {
        return view('formadd', ['key'=>'student']);
    }
    public function save(Request $request)
    {
        $minat= implode(',',$request->get('minat'));
        Mahasiswa::create([
            'nim' =>$request->nim,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'prodi' =>$request->prodi,
            'minat' =>$minat
        ]);
        return redirect('student')->with('flash', 'Data Berhasil Disimpan')->with('alert-class', 'alert-success');
    }
    public function formedit($id)
    {
        $mhs= Mahasiswa:: find($id);

        return view('formedit',['key'=>'student','mhs'=>$mhs]);
    }
    public function update($id, Request $request)
    {
        $minat= implode(',',$request->get('minat'));
        $mhs = Mahasiswa:: find($id);
        $mhs ->nim = $request->nim;
        $mhs ->nama = $request->nama;
        $mhs ->gender = $request->gender;
        $mhs ->prodi = $request->prodi;
        $mhs ->minat = $minat;
        $mhs->save();

        return redirect('student')->with('flash','Data Berhasil Diubah')->with('alert-class', 'alert-info');
    }
    public function delete($id)
    {
        $mhs = Mahasiswa:: find($id);
        $mhs->delete();

        return redirect('student')->with('flash','Data Berhasil Dihapus')->with('alert-class', 'alert-danger');
    }

    public function contact()
    {
        return view('contact', ['key'=>'contact']);
    }
}
