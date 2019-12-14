@extends('layout.master')
@section('content')
<div class="page-heading">
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12"></div>
      </div>
    </div> 
  </div>
  <div class="page-title">
    <h2>Tonton</h2>
  </div>
</div>
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-left sidebar col-sm-3 blog-side">
        <div id="secondary" class="widget_wrapper13" role="complementary">
          <div id="recent-posts-4" class="popular-posts widget widget__sidebar wow bounceInUp animated animated" style="visibility: visible;">
            <h2 class="widget-title">Video Lainnya</h2>
            <div class="widget-content">
              <ul class="posts-list unstyled clearfix">
                @foreach($recent as $rec)
                <li>
                  <figure class="featured-thumb"><iframe width="275" height="200" src="{{$rec['link_embed']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
                  <!--featured-thumb-->
                  <div class="content-info">
                    <h4><a href="{{URL::route('pertandingan-detail',$rec['id'])}}" title="{{$rec['title']}}">{{$rec['title']}}</a></h4>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
            <!--widget-content--> 
          </div>
          
        </div>
      </div>
      <div class="col-main col-sm-9">
        <div id="main" class="blog-wrapper">
          <div id="primary" class="site-content">
            <div id="content" role="main">
              <article id="post-29" class="blog_entry clearfix wow bounceInUp animated animated" style="visibility: visible;">
                
                <div class="entry-content">
                  <div class="featured-thumb">
                    <iframe width="100%" height="400" src="{{$pertandingan['link_embed']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                  </div>
                  <header class="blog_entry-header clearfix">
                  <div class="blog_entry-header-inner">
                    <h2 class="blog_entry-title"> <a href="#" rel="bookmark">{{$pertandingan['title']}}</a> </h2>
                    <h4 style="text-align: left;">0 Votes</h4>
                    @if($isVote)
                      <button type="button" class="btn btn-default" disabled>Anda Sudah Melakukan Vote</button>
                    @else
                      <button id="vote" data-pertandingan-id="{{$pertandingan['id']}}">Vote</button>
                    @endif
                  </div>
                  <!--blog_entry-header-inner--> 
                </header>
                  
                  <div class="entry-content">
                    <p>{!!$pertandingan['description']!!}</p>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <!--#main wrapper grid_8--> 
        
      </div>
      <!--col-main col-sm-9--> 
    </div>
  </div>
  <!--main-container--> 
  
</div>
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function(){
        $("#vote").on("click", function(){
          var id_match = $(this).data('pertandingan-id')
          var id_voter = Date.now()

          get(APIurl+"api/vote?id_match="+id_match+"&id_voter="+id_voter, true, function(response){

            console.log(response)
          })

          get(APIurl+"api/setCookie?id_voter="+id_voter, true, function(response){
            
            console.log(response)
          })

          setTimeout(function(){ 
            location.reload(); 
          }, 1000);
          
        });
    });
  </script>
@endsection