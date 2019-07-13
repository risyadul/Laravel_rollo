@extends('layouts.master')

@section('content')
    <div class="main">
      <div class="main-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                      <h1 class="panel-title">Data Siswa</h1>
                      <div class="right">
                          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                      </div>
                    </div>
                    <div class="panel-body">
                      @if(session('sukses'))
                      <div class="alert alert-success" role="alert">
                          {{session('sukses')}}
                      </div>
                      @endif
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_siswa as $siswa)
                                <tr>
                                    <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama}}</a></td>
                                    <td>{{$siswa->jenisKelamin}}</td>
                                    <td>{{$siswa->agama}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form action="/siswa/create" method="post">
                        {{csrf_field()}}
                            <div class="form-group">
                              <label for="nama">Nama Lengkap</label>
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter Nama Lengkap">
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                    <label for="jenisKelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenisKelamin" id="jenisKelamin">
                                      <option>L</option>
                                      <option>P</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" class="form-control" id="agama" placeholder="Enter agama">
                            </div>
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
          </div>
        </div>
@stop