@extends('layouts.templates')

@section('content')
    
       <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">
        <div class="row">
          <div class="col-sm-16 col-md-10 col-lg-8"> 
            
            <!-- carousel start -->
            <div id="sync1" class="owl-carousel">
                @if(!empty($data))
              @foreach($datas as $data)
                <div class="box item"> <a href="#">
                <div class="carousel-caption">{{$data->name}}</div>
                <img class="img-responsive" src="{{asset('images/slide/'.$data->image)}}" width="1600" height="972" alt=""/>
                <div class="overlay"></div>
                <div class="overlay-info">
                  <div class="cat">
                    <p class="cat-data"><span class="ion-model-s"></span>Top</p>
                  </div>
                  <div class="info">
                    <p><span class="ion-android-data"></span>{{\Carbon\Carbon::parse($data->created_at)->format('d F, Y')}}<span class="ion-chatbubbles"></span>1</p>
                  </div>
                </div>
                </a>
              </div>
              @endforeach
              @endif
      
            </div>
            <div class="row">
              <div id="sync2" class="owl-carousel">
                      @if(!empty($data))
                  @foreach($datas as $data)
                <div class="item"><img class=" img-responsive" src="{{asset('images/slide/'.$data->image)}}"  width="1600" height="972" alt=""/></div>
                @endforeach
                @endif
              
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-8 hidden-sm hidden-xs">
            <div class="row">
              <div class="col-lg-6 hidden-md"><a href="#">
                <div class="box">
                  <div class=" carousel-caption">Extreme biking:
                    dangerous, dirty
                    and Fun</div>
                  <img class="match-height" src="images/banner-static/bs-1.jpg" width="236" height="480"  alt="" />
                  <div class="overlay"></div>
                  <div class="overlay-info">
                    <div class="cat">
                      <p class="cat-data"><span class="ion-model-s"></span>Lifestyle</p>
                    </div>
                    <div class="info">
                      <p><span class="ion-android-data"></span>Dec 16 2014<span class="ion-chatbubbles"></span>351</p>
                    </div>
                  </div>
                </div>
                </a> </div>
              <div class="col-md-16 col-lg-10">
                <div class="row">
                  <div class="col-sm-16 right-img-top "> <a href="#">
                    <div class="box">
                      <div class="carousel-caption">Best snack ever: mini mac and
                        cheese cupcakes</div>
                      <img class="img-responsive" src="images/ekepics/test2.jpg" width="440" height="292" alt=""/>
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <p class="cat-data"><span class="ion-model-s"></span>Lifestyle</p>
                        </div>
                        <div class="info">
                          <p><span class="ion-android-data"></span>Dec 16 2014<span class="ion-chatbubbles"></span>351</p>
                        </div>
                      </div>
                    </div>
                    </a> </div>
                  <div class="col-sm-16 right-img-btm "> <a href="#">
                    <div class="box">
                      <div class="carousel-caption">Rolls Royce chicane phantom
                        coupé will terrify continental</div>
                      <img class="img-responsive" src="images/ekepics/test3.jpg" width="440" height="292" alt=""/>
                      <div class="overlay"></div>
                      <div class="overlay-info">
                        <div class="cat">
                          <p class="cat-data"><span class="ion-model-s"></span>Lifestyle</p>
                        </div>
                        <div class="info">
                          <p><span class="ion-android-data"></span>Dec 16 2014<span class="ion-chatbubbles"></span>351</p>
                        </div>
                      </div>
                    </div>
                    </a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- banner outer end --> 
@endsection
