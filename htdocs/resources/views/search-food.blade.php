@extends('layout.index')
@section('grid-layout')
    <div>
        <div class="ajbh-cover">
            <div class="ajbh-title">Ăn gì bây giờ nhỉ?</div>
            <div class="ajbh-subtitle">Mọi người đang tìm kiếm</div>
            <ul class="list-group container ajbh-list-hastag">
                <li class="list-group-item" style='float:left;'>BBQ</li>
                <li class="list-group-item" style='float:left;'>BingSu</li>
                <li class="list-group-item" style='float:left;'>BBQ</li>
                <li class="list-group-item" style='float:left;'>BingSu</li>
                <li class="list-group-item" style='float:left;'>BBQ</li>
            </ul>
            <ul class="list-group container ajbh-list-hastag1">
                <li class="list-group-item" style='float:left;'>BBQ</li>
                <li class="list-group-item" style='float:left;'>BingSu</li>
                <li class="list-group-item" style='float:left;'>BBQ</li>
                <li class="list-group-item" style='float:left;'>BingSu</li>
                <li class="list-group-item" style='float:left;'>BBQ</li>
                <li class="list-group-item" style='float:left;'>BBQ</li>
                <li class="list-group-item" style='float:left;'>BingSu</li>
            </ul>
        </div>
    </div>
    <div class="container" style="width:100%;">
        <div class="wf-container col-md-10" style="margin-top:40px;width:70%;background-color: #E9E9E9;">
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
            </div>
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
            </div>
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Heading</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
            </div>
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Heading</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
            </div>   
        </div> 
        <div class="col-md-2" style="margin-top:40px;width:30%;background-color: #E9E9E9;">
            <div class="ajbh-chude">Chủ đề</div>
            <ul class="list-group ajbh-list-chude">
                <li class="list-group-item chd1">BBQ</li>
                <li class="list-group-item chd2">BingSu</li>
                <li class="list-group-item chd3">BBQ</li>
                <li class="list-group-item chd4">BingSu</li>
                <li class="list-group-item chd5">BBQ</li>
                <li class="list-group-item chd6">BBQ</li>
                <li class="list-group-item chd7">BingSu</li>
            </ul>
        </div>
    </div>
@stop

