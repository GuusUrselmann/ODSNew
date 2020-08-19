@extends('adminlte::page')
@section('title', 'Product aanmaken')
@section('plugins.Select2', true)
@section('content_header')
    <h1>Nieuw Product</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card p-3">
                <div class="card-body p-0">
                    <form id="formProductAdd" class="form-product-add needs-validation" method="POST" action="" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Naam</label>
                                <input type="text" class="form-control" placeholder="Naam" name="name" required>
                                <div class="invalid-feedback">
                                    Vul a.u.b. een geldige naam in.
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label>Prijs</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-euro-sign"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="00,00" name="price" required>
                                    <div class="invalid-feedback">
                                        Vul a.u.b. een geldig bedrag in.
                                    </div>
                                </div>
                           </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Beschrijving</label>
                                <textarea class="form-control" rows="3" placeholder="Beschrijving" name="description"></textarea>
                             </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Categorieën</label>
                                <select class="categories-select" multiple="multiple" name="categories[]" required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Vul a.u.b. geldige categorieën in.
                                </div>
                            </div>
                        </div>
                        <div class="col-2 float-right">
                            <button type="submit" form="formProductAdd" class="form-user-add-submit btn btn-lg btn-success mb-2">Aanmaken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card p-3">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Plaatje</label>
                            <div class="form-image">
                                <button id="image-upload" class="btn btn-info">Plaatje uploaden</button>
                                <input id="image-input" type="file" name="image_path" form="formProductAdd">
                            </div>
                            <div class="form-image-preview">
                                <label>Voorbeeld:</label>
                                <img src="" class="image-preview">
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('/css/adminPages.css')}}">
@stop
@section('js')
    <script>
    $(document).ready(function() {
        $(".categories-select").select2({
            tags: true,
            closeOnSelect: false,
            width: '80%'
        });
        $('#image-upload').on('click', function() {
            $('#image-input').click();
        });
        $('#image-input').on('change', function(e) {
            if(e.target.files && e.target.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(".form-image-preview img").attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
    </script>
    <script src="{{ url('/js/utilities/form-validation.js') }}"></script>
@stop
