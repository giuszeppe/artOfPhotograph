@extends('layouts.app',['navOpt' => "solid dark"])
@section('content')
    <link rel="stylesheet" href="/style/css/services.css">
    <div class="offset"></div>
    <div class="">
        <img class="services image" src="{{asset('style/images/Fabio-Tiziana.jpg')}}">
        <div class="title-wrapper">
            <h3>{{__('services.title_page')}}</h3>
            <p>{{__('services.description')}}</p>
        </div>
    </div>
    {{--
        <div class="light-wrapper">
            <div class="container service-section inner">
                <div class="service-text service-right">
                    <h3 class="section-title text-left">{{__('services.book.title')}}</h3>
                    <p>{{__('services.book.description')}}</p>
                    <a href="#" class="btn">{{__('about.more')}}</a>
                </div>
                <img  class="service-image" src="/style/images/battesimo.jpg" alt="">
            </div>
        </div>
    --}}
        <div class="dark-wrapper">
            <div class="container service-section inner reverse">
                <img class="service-image" src="/style/images/battesimo.jpg" alt="">
                <div class="service-text service-left">
                    <h3 class="section-title text-left">{{__('services.film.title')}}</h3>
                    <p>{{__('services.film.description')}}</p>
                    <a href="{{route('film')}}" class="btn">{{__('about.more')}}</a>
                </div>
            </div>
        </div>
    
@endsection
