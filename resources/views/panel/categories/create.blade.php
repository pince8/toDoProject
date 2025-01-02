@extends('panel.layout.app')

@section('content')
<div class="card p-4">

<div class="card-header">
    <h3>Kategori Oluştur</h3>
</div>
<div class="card-body">
    <form action="{{route('panel.categoryAdd')}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Kategori Adı :</label>
        <input type="text" class="form-control"  placeholder="Lütfen Kategori Adı Giriniz" name="category_name">
        

        <label for="exampleFormControlInput1" class="form-label mt-3">Kategori Durumu :</label>
        <select name="category_status" class="form-control">
            <option value="Aktif">Aktif</option>
            <option value="Pasif">Pasif</option>
        </select>
        </div>
        <button type="submit" class="btn btn-info mt-3">Kaydet</button>
    </form>
</div>
</div>
@endsection