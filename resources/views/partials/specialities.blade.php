
  <div class="light-wrapper">
    <div class="container inner">
      <div class="thin">
        <h3 class="section-title text-center">{{__('services.title')}}</h3>
        <p class="text-center">{{__('services.page_description')}}</p>
      </div>
      <!-- /.thin -->
      <div class="divide10"></div>
      <div class="row">
        <div class="col-sm-4">
          <div class="caption-overlay">
            <figure><a href="{{route('gallery',['filt' => 'matrimoni'])}}"><img src="style/images/mirkoELoredana.jpg" alt="" /> </a></figure>
            <div class="caption bottom-right">
              <div class="title">
                <h3 class="main-title layer">{{__("services.weddings")}}</h3>
              </div>
              <!--/.title --> 
            </div>
            <!--/.caption --> 
          </div>
        </div>
        <!-- /column -->
        <div class="col-sm-4">
          <div class="caption-overlay">
            <figure><a href="{{route('gallery',['filt' => "battesimi"])}}"><img src="style/images/battesimo.jpg" alt="" /> </a></figure>
            <div class="caption bottom-right">
              <div class="title">
                <h3 class="main-title layer"> {{__("services.baptismo")}}</h3>
              </div>
              <!--/.title --> 
            </div>
            <!--/.caption --> 
          </div>
        </div>
        <!-- /column -->
        <div class="col-sm-4">
          <div class="caption-overlay">
            <figure><a href="{{route('gallery',["filt" => "*"])}}"><img src="style/images/battesimo.jpg" alt="" /> </a></figure>
            <div class="caption bottom-right">
              <div class="title">
                <h3 class="main-title layer">{{ __("services.other") }}</h3>
              </div>
              <!--/.title --> 
            </div>
            <!--/.caption --> 
          </div>
        </div>
        <!-- /column --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.light-wrapper -->
  