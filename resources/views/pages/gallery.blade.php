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
        <div data-filter=".Matrimonio" class="cbp-filter-item-active cbp-filter-item"> Matrimonio </div>
      </div>
      
      <div id="js-grid-full-width" class="cbp">
        {{--
          <div class="cbp-item Matrimonio"> <a href="{{ 'storage/media/antonio/_ARC9763.jpg' ?? 'default.png'}}" class="cbp-caption cbp-lightbox" data-cbp-lightbox="antonio" data-title="antonio">
            <div class="cbp-caption-defaultWrap divImmagini"> 
              <img src="{{'storage/media/antonio/_ARC9763.jpg' ?? 'storage/default.png'}}" alt="" style="width:100%"/> 
            </div>
            <div class="cbp-caption-activeWrap">
              <div class="cbp-l-caption-alignCenter">
                <div class="cbp-l-caption-body">
                  <div class="cbp-l-caption-title">antonio</div>
                </div>
              </div>
            </div>
            <a class="cbp-lightbox" data-title="antonio" href="storage/media/antonio/DSCF9207.jpg" data-cbp-lightbox="antonio">
              <a class="cbp-lightbox" data-title="antonio" href="storage/media/antonio/DSCF9209.jpg" data-cbp-lightbox="antonio">
                <a class="cbp-lightbox" data-title="antonio" href="storage/media/antonio/DSCF9210.jpg" data-cbp-lightbox="antonio">
                </div>
                <div class="cbp-item Matrimonio"> <a href="{{ 'storage/media/laura/DSCF9207.jpg' ?? 'default.png'}}" class="cbp-caption cbp-lightbox" data-cbp-lightbox="laura" data-title="laura">
                  <div class="cbp-caption-defaultWrap divImmagini"> 
                    <img src="{{'storage/media/laura/DSCF9207.jpg' ?? 'storage/default.png'}}" alt="" style="width:100%"/> 
                  </div>
                  <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                      <div class="cbp-l-caption-body">
                        <div class="cbp-l-caption-title">laura</div>
                      </div>
                    </div>
                  </div>
                  <a class="cbp-lightbox" data-title="laura" href="storage/media/laura/DSCF9207.jpg" data-cbp-lightbox="laura">
                    <a class="cbp-lightbox" data-title="laura" href="storage/media/laura/DSCF9209.jpg" data-cbp-lightbox="laura">
                      <a class="cbp-lightbox" data-title="laura" href="storage/media/laura/DSCF9210.jpg" data-cbp-lightbox="laura">
                      </div>
                      
                    </a>
                    --}}
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