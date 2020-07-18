@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/crud/update" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="hidden" name="id" value="{{ $crud->id }}">
                <input type="text" name="name" class="form-control" value="{{ $crud->name }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option>{{ $crud->status }}</option>
                    @if($crud->status=="Ready")
                        <option>Not Ready</option>
                    @else
                        <option>Ready</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" value="ubah">Ubah</button>
            </div>
        </form>
    </div>
@endsection