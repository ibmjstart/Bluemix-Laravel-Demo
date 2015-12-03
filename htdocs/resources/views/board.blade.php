@extends('layout.index')
@include('layout.modal-login')
@section('grid-layout')
    <div class="container" style="width:100%;margin-top:30px;padding-left:0 !important; padding-right:0 !important;">
        <div class="left-side col-md-12" style="min-height:200px;">
            <div class="cover-profile"></div>
            <div class="dark-cover"></div>
            <div class='cover-content-board'>
                <h1 id="user-span" data-user="11">Coffe Hà Nội</h1>
                <div class="cover-caption">Thịt nướng yum yum</div>
            </div>
        </div>
        <div class="right-side col-md-12"style="height:100px;">
            <ul class="user-info" id="user-profile-list" style="margin-top: 40px;">
                <li id="post-list" class="user-profile-info">
                    <span>11</span> ghim
                </li>
                <li id="follower-list" class="user-profile-info">
                    <span>12</span> Người theo dõi
                </li>
                <li>
                    <button id="btn-edit" class="btn follow_btn">
                        <em></em>
                        <span>Chỉnh sửa bảng</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="wf-container" style="margin: 40 auto;width: 90%;">
            
    </div>    
@stop



