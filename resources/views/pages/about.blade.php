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
                <h6>Fotografo professionista</h6>
            </p>
            <div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur assumenda repellendus aut molestiae itaque eaque explicabo perferendis, deserunt praesentium reiciendis velit maxime a placeat nemo labore? Quidem quae mollitia voluptate?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dicta deserunt! Provident molestias voluptatibus beatae maiores voluptas laudantium recusandae odio aliquid consequuntur! Consectetur aperiam numquam neque similique! Doloremque, culpa architecto?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et voluptates illum voluptatum exercitationem ratione! Optio, minus assumenda repudiandae corporis eaque quae accusamus modi magnam, sapiente perferendis mollitia animi, rem non.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam incidunt facilis cum commodi itaque distinctio tenetur esse. Quidem dolore unde ab? Fugit nobis delectus odit voluptatibus harum modi vero quisquam.</p>
            </div>
        </div>
        <div>
            <img src="{{$about[0]->frontendPath ?? 'storage/default.png'}}" alt="">
        </div>
    </div>
@endsection