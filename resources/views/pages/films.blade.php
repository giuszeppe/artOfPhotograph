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
                <li class="list-item @if($loop->first) active @endif" data-src="storage/{{$film->video_path}}">{{$film->title}} </li>
              @endforeach
          </ul>

      </div>
        <div class="video-container">
          <video onclick="play(event)" src="{{$films[0]->video_path}}" id="video"></video>
          <div class="controls">
              <button onclick="play(event)"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
              <button onclick="rewind(event)"><i class="fa fa-fast-backward"></i></button>
              <div class="timeline">
                  <div class="bar">
                      <div class="watch-bar"></div>
                  </div>
              </div>
              <button onclick="forward(event)"><i class="fa fa-fast-forward"></i></button>
              <button onclick="fullScreen(event)"><i class="fa fa-expand"></i></button>
              <button onclick="download(event)"><i class="fa fa-cloud-download"></i></button>
          </div>
      </div>
  </div>
</div>

<script src="/js/video.js"></script>
@endsection

