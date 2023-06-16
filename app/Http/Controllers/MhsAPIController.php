<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MhsAPIController extends Controller
{
    public function read()
    {
        $mhs= Mahasiswa ::all();
        return response()->json([
        'succes'=> true,
        'message'=> 'data berhasil di tampilkan',
        'data'=> $mhs
        ], 200);
    }
    public function create(Request $request)
    {
        $mhs=Mahasiswa::create([
            'nim'=> $request->nim,
            'nama'=> $request->nama,
            'gender'=>$request->gender,
            'prodi'=>$request->prodi,
            'minat'=>$request->minat
        ]);
        if($mhs)
        {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil ditambahkan'
            ], 200);
        }
        else
        {
            return response()->json([
                'succes'=>false,
                'message'=>'data gagal ditambahkan'
            ], 400);
        }
    }
    public function update($id, Request $request)
    {
        $mhs= Mahasiswa::find($id)->update([
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'prodi'=>$request->prodi,
            'minat'=>$request->minat
        ]);
        if($mhs)
        {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil diubah'
            ], 200);
        }
        else
        {
            return response()->json([
                'succes'=>false,
                'message'=>'data gagal diubah'
            ], 200);
        }
    }
    public function delete($id)
    {
        $mhs=Mahasiswa::find($id)->delete();
        if ($mhs)
        {
            return response()->json([
                'succes'=>true,
                'message'=>'data berhasil dihapus'
            ], 200);
        }
        else
        {
            return response()->json([
                'succes'=>false,
                'message'=>'data gagal dihapus'
            ], 400);
        }
    }
}


