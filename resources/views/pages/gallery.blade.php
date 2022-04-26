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
        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> {{ __("gallery.all") }} </div>
      </div>
      
      <div id="js-grid-full-width" class="cbp">
          @foreach ($raccolte as $racc)
          <div class="cbp-item {{$racc->category->name}}"> <a href="{{$racc->images[0]->frontendPath ?? 'default.png'}}" class="cbp-caption cbp-lightbox" data-cbp-lightbox="{{$racc->titolo}}" data-title="{{$racc->titolo}}">
            <div class="cbp-caption-defaultWrap divImmagini"> 
              <img src="{{$racc->images[0]->frontendPath ?? 'storage/default.png'}}" alt="" style="width:100%"/> 
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <div class="cbp-l-caption-title">{{$racc->titolo}}</div>
                </div>
              </div>
            </div>
            @foreach ($racc->images as $image)
            <a class="cbp-lightbox" data-title="{{$racc->titolo}}" href="{{$image->frontendPath}}" data-cbp-lightbox="{{$racc->titolo}}">
            </a>
                
            @endforeach
          </a>
        </div>
        <!--/.cbp-item -->
        @endforeach
        
        
              </div>
      <!--/.cbp --> 
      
    </div>
    <!--/.cbp-panel --> 
    
  </div>
  <!-- /.light-wrapper -->
@endsection