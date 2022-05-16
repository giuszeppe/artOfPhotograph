<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@300&display=swap" rel="stylesheet">
  <nav class="navbar {{$navOpt}}">
    <div class="navbar-header">
      <div class="basic-wrapper"> 
        <div class="navbar-brand"> <ul class="nav navbar-nav"> <li> <a href="{{route('home')}}" class=""><img class="navbar-logo" style="width:296px;height:55px;"src="{{ asset('style/images/logo_white.png')}}"></a></li> </ul> </div>
        <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
      </div>
      <!-- /.basic-wrapper -->  
    </div>
    <!-- /.navbar-header -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('about')}}">{{__("about.title")}}</a></li>
        <li><a href="{{route('gallery')}}">{{__("gallery.title")}}</a></li>
        <li><a href="{{route('services')}}">{{__('services.title_navbar')}}</a></li>
        <li><a href="{{route('contact')}}">{{__('contacts.title')}}</a></li>
        <li><a href="https://www.anfm.it/">{{"ANFM"}}</a></li>
        <li class="language-wrapper"><a href="{{route('switchLocale',['locale' => App::getLocale() == 'it' ? 'en' : 'it'])}}">{{App::getLocale() == 'it' ? 'en' : 'it'}}</a></li>
      </ul>
      <!-- /.navbar-nav --> 
    </div>
    <!-- /.navbar-collapse -->
    <div class="social-wrapper">
      <ul class="social naked">
        <li><a href="https://www.facebook.com/BarcacciaPhotography"><i class="icon-s-facebook"></i></a></li>
        <li><a href="https://www.instagram.com/barklander/"><i class="icon-s-instagram"></i></a></li>
      </ul>
      <!-- /.social --> 
    </div>
    <!-- /.social-wrapper --> 
  </nav>