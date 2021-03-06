@extends('adminlte::page')
@section('title', 'Couponcode aanmaken')
@section('plugins.Select2', true)
@section('content_header')
    <h1><a class="h6" href="{{url()->previous()}}"><i class="fas fa-arrow-left"></i></a> Couponcode Bewerken</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-3">
                <div class="card-body p-0">
                    <form id="formCouponcodeEdit" class="form-couponcode-edit needs-validation" method="POST" action="" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Code</label>
                                <input type="text" class="form-control" placeholder="Couponcode" value="{{$couponcode->code}}" name="code" required>
                                <div class="invalid-feedback">
                                    Vul a.u.b. een geldige code in.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Type</label>
                                <select class="type-select" name="type" id="typeSelect" required>
                                    <option value="delivery" {{$couponcode->sort == 'delivery' ? 'selected' : ''}}>Bezorgen</option>
                                    <option value="takeaway" {{$couponcode->sort == 'takeaway' ? 'selected' : ''}}>Afhalen</option>
                                    <option value="both" {{$couponcode->sort == 'both' ? 'selected' : ''}}>Beide</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label>Korting</label>
                                <input type="text" class="form-control" placeholder="10" value="{{number_format($couponcode->amount, 2, ',', ' ')}}" name="amount" required>
                            </div>
                            <div class="form-group col-2">
                                <label>Soort korting</label>
                                <select class="sort-select" name="sort" id="sortSelect" required>
                                    <option value="percentage" {{$couponcode->sort == 'percentage' ? 'selected' : ''}}>Percentage</option>
                                    <option value="amount" {{$couponcode->sort == 'amount' ? 'selected' : ''}}>Bedrag</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <label>Minimaal bedrag</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-euro-sign"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="00,00" name="min_amount_spent" value="{{number_format($couponcode->min_amount_spent, 2, ',', ' ')}}" required>
                                <div class="invalid-feedback">
                                    Vul a.u.b. een geldig bedrag in.
                                </div>
                            </div>
                       </div>
                        <div class="col-2 float-right">
                            <button type="submit" form="formCouponcodeEdit" class="form-couponcode-edit-submit btn btn-lg btn-success mb-2">Bewerken</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('/css/adminPages.css')}}">
@stop
@section('js')
    <script>
    $(document).ready(function() {
        $(".type-select").select2({
            tags: true,
            width: '80%'
        });
        $(".sort-select").select2({
            tags: true,
            width: '80%'
        });
    });
    </script>
    <script src="{{ url('/js/utilities/form-validation.js') }}"></script>
@stop
