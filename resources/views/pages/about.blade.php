@extends('layouts.app',['navOpt' => "solid dark"])
@section('content')
    <style>
        .main-wrapper{
            background-color: #f1f1f1;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 80px 0px;
        }
        h1{
            text-transform: uppercase;
            margin-bottom:0;
        }
        h6{
            font-weight: 300;
        }
        .text-div{
            padding:20px 30px;
            background-color: white;
            max-width: 500px;
            margin-right: 200px;
        }

        @media screen and (max-width: 992px) {
            .text-div{
                max-width:400px;
                margin-right:150px;
            }
        }
        @media screen and (max-width: 768px) {
            .text-div{
                max-width:300px;
                margin-right:100px;
            }
        }
        @media screen and (max-width: 610px) {
            .text-div{
                max-width:400px;
                margin-right:0px;
                margin-bottom:40px
            }
            .main-wrapper{
                flex-direction: column;
            }
        }

    </style>
    <div class="offset"></div>
    <div class="main-wrapper">
        <div class="text-div">
            <p>
                <h1>Andrea Barcaccia</h1>
                <h6>{{ __("about.role") }}</h6>
            </p>
            <div>
               <p>{{__('about.bio')}}</p> 
            </div>
        </div>
        <div>
            <img src="{{'storage/media/about_pic.jpg' ?? 'storage/default.png'}}" alt="" style="width:292px;height: 400px;">
        </div>
    </div>
@endsection