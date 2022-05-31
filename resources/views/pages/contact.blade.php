@extends('layouts.app',['navOpt' => "solid dark"])

@section('content')
    <div class="offset"></div>
  <iframe width="100%" height="400" style="border:0" loading="lazy" frameborder="0" allowfullscreen 
src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJp_gYPI6iLhMRP1jnDYJHuDg&key=AIzaSyC8kbMkI-LFy2tAaCYPXGyqgAk_wB4klUI"></iframe>
  <div class="light-wrapper">
    <div class="container inner">
      <div class="row">
        <div class="col-sm-8">
          <h2 class="section-title">{{ __("contacts.contact") }}</h2>
          <p>Nullam quis risus eget urna mollis ornare vel eu leo. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas faucibus.</p>
          <div class="divide10"></div>
          <div class="form-container">
            <form action="#" method="post" class="vanilla vanilla-form" novalidate="novalidate">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-field">
                    <label>
                      <input type="text" name="name" placeholder="{{__('contacts.name')}}" required="required">
                    </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <label>
                      <input type="email" name="email" placeholder="{{__('contacts.your_email')}}" required="required">
                    </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <label>
                      <input type="tel" name="tel" placeholder="{{ __("contacts.phone") }}">
                    </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column -->
                <div class="col-sm-6">
                  <div class="form-field">
                    <label class="custom-select">
                      <select name="department" required="required">
                        <option value="">{{ __("services.weddings") }}</option>
                        <option value="Sales">{{ __("services.baptismo") }}</option>
                        <option value="Marketing">Film</option>
                        <option value="Support">Book</option>
                        <option value="Other">{{ __("services.other") }}</option>
                      </select>
                      <span><!-- fake select handler --></span> </label>
                  </div>
                  <!--/.form-field --> 
                </div>
                <!--/column --> 
              </div>
              <!--/.row -->
              <textarea name="message" placeholder="{{ __("contacts.write_here") }}" required="required"></textarea>
              <!--/.radio-set -->
              <input type="submit" class="btn" value="{{__('send')}}" data-error="{{ __("contacts.fix_errors") }}" data-processing="{{ __("contacts.send") }}" data-success="{{ __("contacts.thanks") }}">
              <footer class="notification-box"></footer>
            </form>
            <!--/.vanilla-form --> 
          </div>
          <!--/.form-container --> 
          
        </div>
        <!--/column -->
        
        <aside class="col-sm-4">
          <div class="sidebox widget">
            <h3 class="widget-title">{{ __("contacts.address") }}</h3>
            <p>Fusce dapibus, tellus commodo, tortor mauris condimentum utellus fermentum, porta sem malesuada magna. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur.</p>
            <address>
            <strong>Art of photography</strong><br>
            Via Tiberina 151/B Deruta (PG) 06053<br>
            <abbr title="Phone">Tel</abbr>  3924187439  <br>
            <abbr title="Email">Email:</abbr> <a href="mailto:info@andreabarcaccia.it"><span class="__cf_email__" data-cfemail="2147485352550f4d40525561444c40484d0f424e4c">info@andreabarcaccia.it</span></a>
            </address>
          </div>
          <!-- /.widget --> 
          
        </aside>
        <!--/column --> 
        
      </div>
      <!--/.row --> 
      
    </div>
    <!--/.container --> 
  </div>
  <!--/.light-wrapper -->
@endsection