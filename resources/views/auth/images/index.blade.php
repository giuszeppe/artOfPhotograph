@extends('layouts.appAuth')

@section('content')

   @foreach ($categories as $category)
   <h1> {{$category->name}} </h1>
       @foreach ($category->raccolte as $raccolta)
   <h1> {{$raccolta->titolo}} </h1>
           @foreach ($raccolta->images as $image)
               <img src="{{'/images/' . $image->image_path}}" />
           @endforeach
       @endforeach
   @endforeach 
@endsection