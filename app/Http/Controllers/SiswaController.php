<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama', 'LIKE', '%'. $request->search . '%')->get();
        }else {
            $data_siswa = \App\Siswa::all();
        }
        return view('utama.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        //input data ke table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->remember_token = str_random(60);
        $user->save();
        //Input data ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());

        return redirect('/siswa')->with('sukses', 'Data Berhasil diInput');
    }
    
    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('utama.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil diUpdate');
    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data Berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('utama.profile', ['siswa' => $siswa]);
    }
    
}
