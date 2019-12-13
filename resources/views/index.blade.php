@extends('layout.master')
@section('content')
<div class="content">
  <div class="row">
  <div class="col-md-12" style="height:100%; padding-top: 30px;">
    <!-- <div class="col-md-3 col-xs-12"> 
        <div class="block block-layered-nav box-rad">
          <div class="block-title box-rad2" style="background-color: #fdbf12"> Schedule </div>
          <div class="block-content">
            @foreach($schedule as $sch)
            <p class="block-subtitle" style="margin: 0">{{date('d F Y', strtotime($sch->schedule))}}</p>
            <table style="margin-bottom: 15px">
                @foreach($pertandingan as $prt)
                @if($prt->schedule == $sch->schedule)
                <tr>     
                  <td>
                    @if($prt['link_embed']==null)
                    {{$prt['title']}}&nbsp
                    @else
                    <a href="{{URL::route('pertandingan-detail',$prt['id'])}}">{{$prt['title']}}</a>&nbsp
                    @endif
                    @if($prt['is_live']==1)
                      <span class="tag">LIVE</span>
                    @endif
                  </td>
                  
                  
                </tr>
                @endif
                @endforeach
            </table>
            @endforeach
          </div>
        </div> 
  </div> -->
  <!-- <div class="col-md-12 col-xs-12">
    <div class="block block-layered-nav box-rad">
          <div class="block-title box-rad2" style="background-color: #fdbf12">LIVE NOW</div>
          <div class="block-content">
            @foreach($headline as $head)
            <iframe width="100%" height="400" src="{{$head['link_embed']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h3><a href="#">{{$head['title']}}</a></h3>
            @if($head['id']==2)
            <p style="font-style: italic;">Source: BeritSatu</p>
            @endif
            
            @endforeach
          </div>
          
        </div> 
     
  </div>
  <div class="">
    
  </div> -->
</div>
</div>
<!--   
<section class="add-section">
        <div class="container">
          <div class="row">
            <div class="home-box">
              <div class="box-img"><img src="{{asset('images/sepeda.jpg')}}" alt="">
                <div class="mask">
                  <div class="banner-info"><span class="small-text">Sepeda Santai</span></div>
                </div>
              </div>
            </div>
            <div class="home-box">
              <div class="box-img"><img src="{{asset('images/golf.jpg')}}" alt="">
                <div class="mask">
                  <div class="banner-info"><span class="small-text">Golf</span></div>
                </div>
              </div>
            </div>
            <div class="home-box">
              <div class="box-img"><img src="{{asset('images/tennis.jpg')}}" alt="">
                
                  <div class="banner-info"><span class="small-text">Tennis</span></div>
               
              </div>
            </div>
            <div class="home-box">
              <div class="box-img"><img src="{{asset('images/jalan.jpg')}}" alt="">
                
                  <div class="banner-info"><span class="small-text">Jalan Sehat</span></div>
                
              </div>
            </div>         
          </div>
        </div>
      </section>  -->
  <!-- Home Lastest Blog Block -->
  <div class="latest-blog wow bounceInUp animated animated container">
    <!--exclude For version 6 -->
      <div class="new_title">
        <h2>Video Lain</h2>
      </div>
      <!--blog-title-->
      <!--For version 1,2,3,4,5,6,8 -->
      @foreach($matches as $match)
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
          <div class="blog_inner">
            <div class="blog-img">
            	<a href="{{URL::route('pertandingan-detail',$match['id'])}}">
            		<iframe width="390" height="200" src="{{$match['link_embed']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            	</a>
            	 
            	<div class="mask">
            		<a class="info" href="{{URL::route('pertandingan-detail',$match['id'])}}">Tonton</a>
            	</div>
            </div>
            
            <!--blog-img-->
      <div class="blog-info">
        @if($match->is_live == 1)
        <div class="post-date">      
          <time class="entry-date" datetime="2015-05-11T11:07:27+00:00">live</time>
        </div>
        @endif
            <h3><a href="{{URL::route('pertandingan-detail',$match['id'])}}">{{$match['title']}}</a></h3>
            <div>
            	0 Votes
        	</div>
      </div>
      </div>
          <!--blog_inner-->
        </div>
        @endforeach
    <!--container-->
  </div>

  </div>
@endsection
