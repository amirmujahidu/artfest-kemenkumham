@extends('layout.master')
@section('active2')
active
@endsection
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
    <h2>Pertandingan</h2>
  </div>
</div>
<section class="main-container col2-left-layout bounceInUp animated"> 
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-9 col-sm-push-3 product-grid">
        <div class="pro-coloumn">
          <article class="col-main">
            <div class="toolbar">
              <form method="get" id="newsletter-validate-detail1">
                <div id="container_form_news">
                  <div id="container_form_news2">
                    <input type="text" name="q" id="template-jobform-website" value="{{$q}}" class="input-text required-entry validate-email" placeholder="Masukkan Keyword">
                    <button type="submit" title="Search" class="button" value="apply"><span>Search</span></button>
                  </div>
                  <!--container_form_news2--> 
                </div>
                <!--container_form_news-->
              </form>
              
            </div>
           
              @foreach($tags as $tag)
               <div class="category-products">
              <h3>{{$tag['tag']}}</h3>
              @foreach($pertandingan as $prt)
              @if($prt->tag == $tag->id)
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
          <div class="blog_inner">
            <div class="blog-img"> <a href="{{URL::route('pertandingan-detail',$prt['id'])}}"> <iframe width="275" height="200" src="{{$prt['link_embed']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
              <div class="mask"> <a class="info" href="{{URL::route('pertandingan-detail',$prt['id'])}}">Tonton</a> </div>
            </div>
            <!--blog-img-->
      <div class="blog-info" style="padding: 10px;">
            <h5><a href="{{URL::route('pertandingan-detail',$prt['id'])}}">{{$prt['title']}}</a></h5>
            </div>
      </div>
          <!--blog_inner-->
        </div>
        @endif
        @endforeach
         </div>
              @endforeach
              
           
        </article>
        </div>
      </div>
      <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated"> 
        <div class="block block-layered-nav box-rad">
          <div class="block-title box-rad2" style="background-color: #fdbf12"> Schedule </div>
          <div class="block-content">
            @foreach($schedule as $sch)
            <p class="block-subtitle" style="margin: 0">{{date('d F Y', strtotime($sch->schedule))}}</p>
            <table style="margin-bottom: 15px">
                @foreach($pertandingans as $prt)
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
          <!--box-content box-category--> 
        </div>
      </aside> 

    </div>
    <!--row--> 
  </div>
  <!--container--> 
</section>
@endsection