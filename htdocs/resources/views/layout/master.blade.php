<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="{{URL::asset('img/logo.png')}}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/style.css')}}">
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

            <link rel="stylesheet" type="text/css" href="css/nguyencss/nomalize.css">
            <link rel="stylesheet" type="text/css" href="css/nguyencss/ionicons.min.css">
            <link rel="stylesheet" type="text/css" href="css/nguyencss/grid.css">
            <link rel="stylesheet" type="text/css" href="css/nguyencss/style.css">
    
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFo1vaTwz6NILG9inO-5HOEQ14yYWSf9U&signed_in=true"
  async defer></script>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <script src="{{URL::asset('js/responsive_waterfall.js')}}"></script>
    <title>Fresh Food</title>
    <script>
            window.fbAsyncInit = function() {
                FB.init({
                  appId      : '1473244306316838',
                  xfbml      : true,
                  version    : 'v2.5'
                });
              };
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
</head>
    
<body>
    {{-- Thanh menu --}}
    {{--<nav class="navbar navbar-inverse navbar-fixed-top" style='background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);--}}
    {{--box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);'>--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="navbar-header"> --}}
                {{--<a class="navbar-brand logo" href="/" style="margin-left:80px;">--}}
                    {{--<img src="{{URL::asset('img/logo.png')}}" height="50" width="50">--}}
                {{--</a>--}}
                {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="margin-top:25px;">--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span> --}}
                {{--</button>--}}
            {{--</div>--}}
        {{----}}
            {{--<div class="collapse navbar-collapse container" id="myNavbar">--}}
                {{--<form class="nav navbar-nav navbar-left" style="margin-top:22px;">--}}
                    {{--<input type="search" placeholder="Search">--}}
                {{--</form> --}}
                {{----}}
                {{--<ul class="nav navbar-nav navbar-right" style="margin-top:15px; margin-left:65px;">--}}
                    {{--<li><a href="#" class="loginfb">Đăng nhập bằng fb</a></li>--}}
                    {{----}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}
       {{----}}
    {{--<section style="background-color:#E9E9E9;">--}}
        {{--<div class="wf-container">--}}
            {{--@foreach(App\Models\Post::GetPopularPost(App\Models\LikeEvent::GetMostPost(),0) as $key => $value)--}}
                {{--<div class="wf-box">--}}
                    {{--<img src="vendors/img/{{$value->photo_link}}" class="box-img" data-option='{{$value->post_id}}'>--}}
                    {{--<div class="content">--}}
                        {{--<h3>Nhuận</h3>--}}
                        {{--<p>{{$value->description}}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach    --}}
        {{--</div>    --}}
    {{--</section>--}}
       <header>
                <nav>
                    <ul class="main-nav">
                        <li><img src="css/nguyencss/img/logo.png" alt="logo by NGUYENDEPTRAI" class="logo"></li>
                        <li><a href="#">Main Page</a></li>
                        <li><a href="mypage.html">My Page</a></li>
                        <li><a href="#">About Us</a></li>
                        <input placeholder="Search..." style=" margin-left:10px;"><i class="ion-search" style="color:white; font-size:120%;margin-left:5px; "></i>
                    </ul>
                </nav>
                <div class="hero-text-box">
                <h1>Discover Food!<br> Discover The World!</h1>
                 <button class="btn btn-full" id="showup">Join us</button>

                 <a class="btn btn-ghost" href="#">Show me more</a>
                 <center><div class="bar"><span class="bar-fill stripes" style="width:0%;"></span></div></center>
                </div>

            </header>

            <section class="section-features">

                <div class="row">

                    <h2><a href="#" target="_self"></a><i class="ion-heart " style="color:rgba(255, 0, 0, 0.74);"></i> Get Interesting Food <i class="ion-heart " style="color:rgba(255, 0, 0, 0.74);"></i></h2>
                </div>

                <div class="row">

                    <div class="col span_1_of_3 box"><i class="ion-coffee icon-big"></i>
                        <h3>Just Taste</h3>
                    <p>Những món ăn ngon nhất, rẻ nhất và hấp dẫn nhất </p>
                    </div>

                    <div class="col span_1_of_3 box">
                        <i class="ion-android-walk icon-big"></i>
                        <h3> Easy Find A Way To</h3>
                    <p> Tìm đường đến 1 cách vô cùng dễ dàng</p>
                    </div>

                    <div class="col span_1_of_3 box">
                        <i class="ion-android-camera icon-big"></i>
                        <h3>Take Photos For It</h3>
                    <p>Hãy chụp những bức ảnh đẹp nhất để chia sẻ cùng bạn bè mình nhé!</p>
                    </div>
                </div>


            </section>

            <section class="grid-meal">
                 <div class="grid-col1 grid">
                     <a href="1.html" target="_blank"><img src="css/nguyencss/img/1.jpg"></a>
                     <a href="1.html" target="_blank"><img src="css/nguyencss/img/2.jpg"></a>
                     <a href="1.html" target="_blank"><img src="css/nguyencss/img/3.jpg"></a>
                     <a href="1.html" target="_blank"><img src="css/nguyencss/img/4.jpg"></a>
                    </div>
                <div class="grid-col2 grid">
                     <a href="1.html" target="_blank"><img src="css/nguyencss/img/10.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/11.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/12.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/13.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/14.jpg"></a>

                    </div>
                <div class="grid-col3">

                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/5.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/6.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/7.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/8.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/9.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/15.jpg"></a>
                    </div>
                <div class="grid-col4">
                       <a href="1.html" target="_blank"><img src="css/nguyencss/img/11.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/16.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/17.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/18.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/19.jpg"></a>
                    <a href="1.html" target="_blank"><img src="css/nguyencss/img/20.jpg"></a>
                    </div>

            </section>

            <footer>
    @include('layout.modal-view')
    @include('layout.modal-login')
<script>
    $(document).ready(function(){
        var chek = false;

        $('#showup').on('click', function(){
        console.log("e");
            $(".modal-login").modal('show');
        });

        $(document).on('click', '.box-img', function(){
           // initMap(21.0277644, 105.8341597999995);
           google.maps.event.addDomListener(window, "load", initMap(21.0277644, 105.8341597999995));
            // post_id = $(this).data('option');
            // $.ajax({
            //     type: "POST",
            //     url: "{{url('/detail-image')}}",
            //     cache: false,
            //     data: {post_id : post_id},
            //     success: function(data){
                
            //     }
            // });
            $(".modal-view").modal('show'); 
        });

        $("#upload-img").click(function(){
            $("#modal").toggle(1000); 
            $(".bar").toggle(2000);
            $(".bar-fill").css("width","100%");
        });

        {{--$(window).scroll(function() {--}}
            {{--if($(window).scrollTop() + $(window).height() > $(document).height() - 50) {--}}
                {{--if(!chek){                   --}}
                    {{--chek = true;--}}
                    {{--$.ajax({--}}
                        {{--type: "POST",--}}
                        {{--url: "{{url('/load-more')}}",--}}
                        {{--cache: false,--}}
                        {{--data: {},--}}
                        {{--success: function(data){--}}
                            {{--for (i = 0; i < data.length; i++) {--}}
                                {{--if(i % 4 == 0){--}}
                                    {{--$('.wf-container .wf-column:first-child()').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");--}}
                                {{--}else if(i % 4 == 1){--}}
                                    {{--$('.wf-container .wf-column:nth-child(2)').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");--}}
                                {{--}else if(i % 4 == 2){--}}
                                    {{--$('.wf-container .wf-column:nth-child(3)').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");--}}
                                {{--}else if(i % 4 == 3){--}}
                                    {{--$('.wf-container .wf-column:last-child()').append("<div class='wf-box'><img src='vendors/img/"+data[i]['photo_link']+"' class='box-img'><div class='content'><h3>"+data[i]['title']+"</h3><p>"+data[i]['description']+"</p></div></div>");--}}
                                {{--}--}}
                            {{--}--}}
                            {{--chek = false--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}
    }); 
    
</script>
