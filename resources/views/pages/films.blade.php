@extends('layouts.app')

@section('content')
<style>

.film-container{
  min-height: 100vh;
  display: flex;
  align-items: center;
  padding:0 10%;
  background:#f2f5f7;
}

.film-container .side-bar{
  width:400px;
}

.film-container .side-bar.active{
  display: none;
}

.film-container .side-bar .list{
  display: flex;
  flex-flow: column;
  align-items: flex-start;
}

.film-container .side-bar .list li{
  padding:10px 0;
  font-size: 20px;
  cursor: pointer;
  position: relative;
  list-style: none;
}

.film-container .side-bar .list li::before{
  content: '';
  position: absolute;
  top:50%;
  transform: translateY(-50%);
  left:-5px;
  width: 0%;
  height: 3px;
  background-color: #000;
  transition: width .2s linear .2s;
}

.film-container .side-bar .list li.active,
.film-container .side-bar .list li:hover{
  font-size: 30px;
  color : #70aed2;
}

/* .film-container .side-bar .list li.active::before, */
/* .film-container .side-bar .list li:hover::before{ */
/*   right: -5px; */
/*   width: 105%; */
/* } */

.film-container .video-container{
  flex:1;
}

.film-container .video-container video{
  height:700px;
  width: 100%;
  object-fit: cover;
}

#menu-btn{
  position: fixed;
  top:20px; left:30px;
  font-size: 40px;
  cursor: pointer;
  z-index: 1000;
}

@media (max-width:1200px){
  .film-container{
    position: relative;
  }

  .film-container .side-bar{
    position: absolute;
    top:0; left:-110%;
    height: 100%;
    background-color: #fff;
    z-index: 10;
    padding:30px;
  }

  .film-container .side-bar .list{
    height: 100%;
    justify-content: center;
  }

  .film-container .side-bar.active{
    box-shadow: 0 0 0 100vw rgba(0,0,0,.8);
    display: initial;
    left:0;
  }
}

@media (max-width:450px){

  .film-container{
    padding:20px;
  }

  .film-container .side-bar{
    width: 300px;
  }

  .film-container .side-bar .list li{
    font-size: 15px;
  }

  .film-container .side-bar .list li.active{
    font-size: 20px;

</style>

<div class="offset"></div>
<div id="menu-btn" class="fas fa-bars"></div>

<div class="film-container">

    <div class="side-bar">

        <ul class="list">
            @foreach($films as $film)
              <li data-src="storage/{{$film->video_path}}">{{$film->title}}</li>
            @endforeach
        </ul>

    </div>

    <div class="video-container">
        <video src="images/vid-1.mp4" muted autoplay controls></video>
    </div>

</div>

<script>

let sideBar = document.querySelector('.film-container .side-bar');

document.querySelector('#menu-btn').onclick = () =>{
    sideBar.classList.toggle('active');
};

let video = document.querySelector('.film-container .video-container video');
let videoLinks = document.querySelectorAll('.film-container .side-bar .list li');

videoLinks.forEach(link =>{
    link.onclick = () =>{
        let src = link.getAttribute('data-src');
        video.src = src;
        sideBar.classList.remove('active');
        videoLinks.forEach(remove =>{remove.classList.remove('active')});
        link.classList.add('active');
    }
})

</script>
@endsection

