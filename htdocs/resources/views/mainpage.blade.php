@extends('layout.index')
@section('grid-layout')
	<div class="wf-container">
        <div class="wf-box">
            <div class="content" style="background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);border-top-left-radius: 6px;border-top-right-radius: 6px;'">
                <div class='invitefr' style="background-color:#fff;">
                    <span>Mời bạn bè vào foodiee</span>
                    <i class="fa fa-chevron-right" style='float:right;cursor:pointer;'></i>
                </div>
                <p>Content Here</p>
                <p>Content Here</p>    
                <p>Content Here</p>
            </div>

            <div class="content" style="margin-top:10px;background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);border-top-left-radius: 6px;border-top-right-radius: 6px;'">
                <div class='findfr' style="cursor:pointer;background-color:#fff;">
                    <span>Tìm bạn bè</span>
                    <i class="fa fa-chevron-right" style='float:right;cursor:pointer;'></i>
                </div>
                <p>Content Here</p>
                <p>Content Here</p>    
                <p>Content Here</p>
            </div>
        </div>
        @foreach($posts as $post)
            <div class="wf-box" data-id="{{$post["post_id"]}}">
                <img src="{{URL::to('api/photo').'/'.$post["photo_link"]}}" class="box-img" data-id="{{$post["post_id"]}}"/>
                <div class="content">
                    <h3 class="box-img-des">{{$post["description"]}}</h3>
                    <div class="box-img-card">
                        <img src="{{URL::asset("img/logo.png")}}" width="30" height="30" class="logo-profile">
                        <div>
                            <p class="card-owner">{{$post["owner"]}}</p>
                            <h4 class="card-title">{{$post['board_title']}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop