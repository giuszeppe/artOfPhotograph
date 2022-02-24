@extends('layouts.app',['includeScripts' => true])
@section('content')

    <div class="offset" > </div>
  <div class="light-wrapper">

    <div class="divide30"></div>
    <div class="cbp-panel">
        <style scoped>
            #js-filters-full-width{
                display: flex;
                justify-content: center;
                flex-direction: column
            }
            .cbp-filter-item:first-child:before{
                display:inline !important;
            }
            @media screen and (min-width:500px){
                #js-filters-full-width{
                    flex-direction: row;
                }
                .cbp-filter-item:first-child:before{
                    display:none !important;
                }
            }
        </style>
      <div id="js-filters-full-width" class="cbp-filter-container text-center">
        @foreach ($categories as $cat)
          <div data-filter=".{{$cat->name}}" class="cbp-filter-item"> {{$cat->name}} </div>
        @endforeach
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All </div>
        <div data-filter=".matrimoni" class="cbp-filter-item"> Matrimoni </div>
        <div data-filter=".battesimi" class="cbp-filter-item"> Battesimi</div>
        <div data-filter=".aziendale" class="cbp-filter-item"> Foto Aziendali </div>
      </div>
      
      <div id="js-grid-full-width" class="cbp">
          @foreach ($raccolte as $racc)
          <div class="cbp-item {{$racc->category->name}}"> <a href="{{$racc->frontendPath}}/project.html" class="cbp-caption cbp-singlePageInline">
            <div class="cbp-caption-defaultWrap"> <img src="{{$racc->images[0]->frontendPath}}" alt="" /> </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <div class="cbp-l-caption-title">{{$racc->titolo}}</div>
                </div>
              </div>
            </div>
            <!--/.cbp-caption-activeWrap --> 
          </a> 
        </div>
        <!--/.cbp-item -->
        @endforeach
        
        
        <div class="cbp-item matrimoni"> <a href="ajax/project2.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf2.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Parturient Bibendum</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item battesimi logo"> <a href="ajax/project3.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf3.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Justo Dapibus Vehicula</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item battesimi"> <a href="ajax/project4.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf4.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Dolor Fermentum</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project5.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf5.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Ipsum Ullamcorper</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf6.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Ipsum Cursus</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item aziendale logo"> <a href="ajax/project2.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf7.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Malesuada Consectetur</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project3.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf8.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Porta Cras Aenean</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item logo battesimi"> <a href="ajax/project4.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf9.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Vestibulum Bibendum</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project5.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf10.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Condimentum Ligula</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf11.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Pellentesque Bibendum</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project2.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf12.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Ullamcorper Mollis</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project3.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf13.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Ridiculus Quam</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        <div class="cbp-item logo battesimi"> <a href="ajax/project4.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf14.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Fermentum Sem Mollis</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project5.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf15.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Cras Euismod Risus</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf16.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Ullamcorper Sem</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item logo battesimi"> <a href="ajax/project2.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf17.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Justo Etiam</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project3.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf18.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Porta Parturient</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project4.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf19.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Mollis Fusce Venenatis</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project5.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf20.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Vestibulum Tristique</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project1.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf21.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Purus Justo Magna</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        <div class="cbp-item logo battesimi"> <a href="ajax/project2.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf22.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Tellus Elit Condimentum</div>
              </div>
            </div>
          </div>
          <!--/.cbp-caption-activeWrap --> 
          </a> </div>
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project3.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf23.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Tristique Ridiculus</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item -->
        
        <div class="cbp-item matrimoni"> <a href="ajax/project4.html" class="cbp-caption cbp-singlePageInline">
          <div class="cbp-caption-defaultWrap"> <img src="style/images/art/pf24.jpg" alt="" /> </div>
          <div class="cbp-caption-activeWrap">
            <div class="cbp-l-caption-alignCenter">
              <div class="cbp-l-caption-body">
                <div class="cbp-l-caption-title">Sollicitudin Ornare</div>
              </div>
            </div>
          </div>
          
          <!--/.cbp-caption-activeWrap --> 
          
          </a> </div>
        
        <!--/.cbp-item --> 
        
      </div>
      <!--/.cbp --> 
      
    </div>
    <!--/.cbp-panel --> 
    
  </div>
  <!-- /.light-wrapper -->
@endsection