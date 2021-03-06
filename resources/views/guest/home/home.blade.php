@extends('layouts.guest.layout')

@section('content')

<div class="container-fluid banner background-cover p-0" style="background-image: url({{asset('images/site/banner-home.jpg')}})">
    <div class="row position-relative">
        <div class="col-12 banner-info">
            <div class="info-name text-white">
                Brood2day
            </div>
        </div>
    </div>
</div>
<div class="container-fluid productsmenu">
    <productsmenu :menu="{{$menu->list()}}" :cart="{{$cart}}" :amounttotal="{{$cart_amount}}" />
</div>
@endsection
