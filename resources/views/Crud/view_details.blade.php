@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <a href="/crud" class="btn btn-danger">Back</a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <th>Name</th>
                <th>Status</th>
            </thead>
            <tbody>
                <td>{{ $lihat->name }}</td>
                @if($lihat->status == "Ready")
                    <td class="text-success">{{ $lihat->status }}</td>
                @else
                    <td class="text-danger">{{ $lihat->status }}</td>
                @endif
            </tbody>
        </table>
    </div>
@endsection