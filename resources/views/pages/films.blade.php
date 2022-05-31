@extends('layouts.app', ['navOpt' => "solid"])

@section('content')
<link rel="stylesheet" href="/css/video.css">

<div class="offset"></div>


<div class="main-container">

  <h1> Trailers </h1>
  <div class="film-container">

      <div class="side-bar">

          <ul class="list">
              @foreach($films as $film)
                <li class="list-item @if($loop->first) active @endif" data-src="{{$film->video_path}}">{{pathinfo($film->title,PATHINFO_FILENAME)}} </li>
              @endforeach
          </ul>

      </div>
        <div class="video-container">
          <div id="player"></div>
      </div>
  </div>
</div>

<script src="/js/video.js"></script>
@endsection

