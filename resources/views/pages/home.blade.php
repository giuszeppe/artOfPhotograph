@extends('layouts.app',['navOpt' => 'solid dark'])

@section('content')
  <div class="tp-fullscreen-container revolution">
    <div class="tp-fullscreen">
      <ul>
        @foreach ($images as $image)
        <li data-transition="fade"> <img src="{{'storage/' . $image->imageable->name . '/' . $image->image_path}}"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
            
        @endforeach
         <!-- <h1 class="tp-caption large sfr" data-x="30" data-y="263" data-speed="900" data-start="800" data-easing="Sine.easeOut">hello! this is lydia</h1>
          <div class="tp-caption medium sfr" data-x="30" data-y="348" data-speed="900" data-start="1500" data-easing="Sine.easeOut">most completed photography & <br />
            magazine template with various options</div> -->
        </li>
        <li data-transition="fade"> <img src="style/images/Fabio-Tiziana.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <!--<div class="tp-caption large text-center sfl" data-x="center" data-y="283" data-speed="900" data-start="800" data-easing="Sine.easeOut">built for creatives to showcase</div>
          <div class="tp-caption large text-center sfr" data-x="center" data-y="363" data-speed="900" data-start="1500" data-easing="Sine.easeOut">their portfolio beautifully</div> -->
        </li>
        <li data-transition="fade"> <img src="style/images/sposaScale.jpg"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
          <!--<div class="tp-caption large text-center sfb" data-x="center" data-y="293" data-speed="900" data-start="800" data-easing="Sine.easeOut">free updates & premium support</div>
          <div class="tp-caption medium text-center sfb" data-x="center" data-y="387" data-speed="900" data-start="1500" data-easing="Sine.easeOut">you will have access to all updates and free support</div>->>
        </li>
      </ul>
      <div class="tp-bannertimer tp-bottom"></div>
    </div>
    <!-- /.tp-fullscreen-container --> 
  </div>
  <!-- /.revolution -->
  @include('partials.specialities')
  @include('partials.about', ['about' => $about ?? ''])
    
@endsection