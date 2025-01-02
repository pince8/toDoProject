@extends('panel.layout.app')

@section('content')
<div class="card p-3">
    <div class="card-header">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('errors'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h3>Tasklar</h3>
        <a href="{{ route('panel.CreateTaskPage') }}" class="btn btn-sm btn-success">Yeni Task Oluştur</a>
    </div>

    <div class="card-body">
        <div class="card">
<table>
    <thead>

    </thead>

    <tbody>
        @foreach($tasks as $t)
<tr>
    <td>{{$t->title}}</td>
</tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div> 
  </div> 

@endsection
