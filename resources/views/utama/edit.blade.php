@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>Edit Data Siswa</h3>
                            </div>
                            <div class="panel-body">
                                    <form action="/siswa/{{$siswa->id}}/update" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="nama">Nama Lengkap</label>
                                                <input type="text" name="nama" value="{{$siswa->nama}}" class="form-control" id="nama" placeholder="Enter Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label for="jenisKelamin">Jenis Kelamin</label>
                                                <select class="form-control" name="jenisKelamin" id="jenisKelamin">
                                                      <option value="L" @if($siswa->jenisKelamin == "L") selected @endif>L</option>
                                                      <option value="P" @if($siswa->jenisKelamin == "P") selected @endif>P</option>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="agama">Agama</label>
                                                <input type="text" value="{{$siswa->agama}}" name="agama" class="form-control" id="agama" placeholder="Enter agama">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{$siswa->alamat}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="avatar">Avatar</label>
                                                <input type="file" name="avatar" class="form-control" id="avatar">
                                            </div>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
@stop
@section('content1')
        <h1>Edit Data Siswa</h1>
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
        <div class="row">
        <div class="col-lg-12">
            <form action="/siswa/{{$siswa->id}}/update" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{$siswa->nama}}" class="form-control" id="nama" placeholder="Enter Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenisKelamin" id="jenisKelamin">
                                  <option value="L" @if($siswa->jenisKelamin == "L") selected @endif>L</option>
                                  <option value="P" @if($siswa->jenisKelamin == "P") selected @endif>P</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" value="{{$siswa->agama}}" name="agama" class="form-control" id="agama" placeholder="Enter agama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3">{{$siswa->alamat}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
