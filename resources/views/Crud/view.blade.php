@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- Button Modal Tambah -->
        <div class="form-group float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                Tambah
            </button>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($crud as $key => $c)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $c->name }}</td>
                        @if($c->status == "Ready")
                            <td class="text-success">{{ $c->status }}</td>
                        @else
                            <td class="text-danger">{{ $c->status }}</td>
                        @endif
                        <td>
                            <a href="{{ URL('/crud/view/'.$c->id) }}" class="btn btn-info">view</a>
                            <a href="{{ URL('/crud/edit/'.$c->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ URL('/crud/delete/'.$c->id) }}" class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/crud/store" method="post">
            {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option>Ready</option>
                                <option>Not Ready</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection