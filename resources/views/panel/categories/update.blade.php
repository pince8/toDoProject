@extends('panel.layout.app')

@section('content')
<div class="card p-3">
    <div class="card-header">
     <h3>Kategori Güncelle</h3>

    </div>
    <div class="card-body">


    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

       
    <form action="{{route('panel.updateCategory')}}", method="POST">
        @csrf

        <input type="hidden" value="{{$category->id}}" name="catID">
        <label for="">Kategori Adı: </label>
        <input type="text" class="form-control" name="catName"value="{{$category->name}}">

        <label for="" class="mt-4">Kategori Durumu: </label>
        <select  id="" class="form-control" name="catStatus">
            <option value="1" @if($category->is_active==1) selected @endif>Aktif</option>
            <option value="0" @if($category->is_active==0) selected @endif>Pasif</option>
        </select>

        <button type="submit" class="btn btn-success mt-3">Güncelle</button>
    </form>
                                 
    </div>
</div>
@endsection
