@section('modal')
  <div class="modal fade modal-view" tabindex="-1">
    <div class="modal-dialog" style="width:75%;">
      <div class="modal-content">
          <div class="col-md-1">
            <div class="left-arrow">
              <i class="fa fa-chevron-left fa-2x"></i>
            </div>
          </div>
          <div class="col-md-7 center-right-side" id="main-post-id" style="border-radius:6px;margin-right:15px;">
            <div class="mv-title keep-open">
              <div class="mv-title-pinit" id="post_pin_btn">
                <span>Đánh dấu</span>
              </div>
              <div id="post_like_btn" class="mv-title-like">
                <em></em>
                <span>Thích</span>
              </div>
              <div id="post_share_btn" class="mv-title-share">
                <em></em>
                <span>Chia sẻ</span>
              </div> 
              <div id="post_send_btn" class="mv-title-send" id="dropdownMenu3" data-toggle="dropdown">
                <em></em>
                <span>Gửi</span>
              </div> 
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3" style="margin-top:26px;">
                <li class="mv-square"></li>
                <li role="presentation">
                  <textarea class="mv-mess" placeholder="Thêm tin nhắn..."></textarea>
                </li>
                <li role="presentation">
                  <ul class="mv-listfr">
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                    <li>
                      <img src="{{URL::asset("img/logo.png")}}" width="35" height="35" class="logo-profile">
                      <p>đsadá</p>
                    </li>
                  </ul>
                </li>
            </ul>
            </div>
            <div class="fluid-container mv-img">
              <div class="wf-box">
                <img id="main-photo-post" src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div>
            </div>
            <div class="fluid-container mv-img-footer">
              <p></p>
                <p>
                  Upload bởi <span id="owner-post"></span>
                </p>
                </div>
              </div>  
          <div class="col-md-3 center-left-side">

            <div class="fluid-container cls-title">
              <img src="{{URL::asset('img/5.jpg')}}" height="38" width="38" class="logo-profile">
              <div class="cls-user">
                <p class="cls-board">hh</p>
                <p class="cls-name">HoTung</p>
              </div>
            </div>
            <div class="row fluid-container cls-album">
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}" class="box-img"/>
              </div> 
            </div>
          </div>
          <div class="col-md-3 mv-map">
            <div id="map-detail"></div>
          </div>
          <div class="col-md-1 col-right-arrow">
            <div class="right-arrow">
              <i class="fa fa-chevron-right fa-2x"></i>
            </div>
          </div>
          <div class="col-md-7 col-md-offset-1 mv-cmt">
            <div class="mv-cmt-owner">
              <img id="main-owner-avatarlink" src="img/5.jpg" class="logo-profile cmt-avatar">
              <div class="cmt-chat cmt-name">
                <a id="main-owner-name">Tung</a>
              </div>
              <div class="cmt-chat" id="main-post-description"></div>
            </div>
            <div class="mv-cmt-itembox">
              <img src="img/5.jpg" class="logo-profile cmt-avatar-owner">
              <div class="cmt-chat-owner">
                <a>Tung</a>
                <textarea class="cmt-boxchat" placeholder="Thêm bình luận"></textarea>
                <button id="main-comment-btn" class="btn-info"><span>Comment</span></button>
              </div>
            </div>
          </div>
          <div class="col-md-10 col-md-offset-1 mv-related-post">
          <p>Related Posts</p>
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}">
                <div class="content">
                  <h3>Title</h3>
                  <p>Content Here</p>
                  <p>Content Here</p>    
                  <p>Content Here</p>
                </div>
              </div>
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
              </div>
              <div class="wf-box">
                <img src="{{URL::asset('img/5.jpg')}}">
                <div class="content">
                    <h3>Heading</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
              </div>   
          </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script>
    $('.dropdown-menu li, .dropdown-menu textarea').click(function(e) {
      e.stopPropagation();
    });
    function initMap(lat, lng) {
      var myLatLng = new google.maps.LatLng(lat, lng);
      var options = {
          zoom: 18,
          center: myLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var mapdetail = new google.maps.Map(document.getElementById('map-detail'), options);           

      
      var name = "Place.name";
      var marker = new google.maps.Marker({
          position: {lat: lat, lng: lng},
          map: mapdetail,
          title: name,
          draggable: true
      });
    }
    $("#post_like_btn").click(function(){
        likePost($("#main-post-id").data("id"));
    });
    $("#main-comment-btn").click(function(){
        var post_id = $("#main-post-id").data("id");
        var comment = $(".mv-cmt-itembox textarea").val();
        commentPost(post_id,comment);
    });
    function likePost(post_id){
        var url ="{{URL::to('/api/post')}}"+'/'+post_id+'/'+"like";
        $.ajax({
            url: url,
            type:"GET",
            success:function(data){
                span_text = $("#post_like_btn").find('span:first');
                if(span_text.text()=="Thích"){
                    span_text.text("Đã thích");
                }
                else {
                    span_text.text("Thích")
                }
         }});
    }
    function commentPost(post_id,comment){
        var url ="{{URL::to('/api/post')}}"+'/'+post_id+'/'+"comment";
        $.ajax({
            url: url,
            type:"POST",
            data:{comment:comment},
            success:function(data){
                if(data.result){
                    var post_id = $("#main-post-id").data("id");
                    var comment = $(".mv-cmt-itembox textarea").val();
                    var commentor = $(".mv-cmt-itembox a").text();
                    var avatar_link = $(".mv-cmt-itembox img").attr("src");
                    var commentBox = createCommentBox(commentor,avatar_link,comment);
                    commentBox.insertBefore($(".mv-cmt-itembox")).fadeIn(1000);
                    $(".mv-cmt-itembox textarea").val("");
                }
         }});
    }
    function createCommentBox(commentor,avatar_link,comment){
        var result = $("<div>",{class:"mv-cmt-item",style:"display:none"}).append(
            $("<img>",{class:"logo-profile cmt-avatar"}),
            $("<div>",{class:"cmt-chat cmt-name"}).append(
                $("<a>")
            ),
            $("<div>",{class:"cmt-chat"})
        );
        result.find("img").attr("src",avatar_link);
        result.find(".cmt-chat a:first").text(commentor);
        result.find(".cmt-chat:eq(1)").text(comment);
        return result;
    }
    function getPostById(modal,id){
        var url ="{{URL::to('/api/post')}}"+'/'+id;
        $.ajax({
            url: url,
            type:"GET",
            success:function(data){
                console.log(data);
                modal.find("#owner-post").text(data.owner);
                modal.find("#main-owner-name").text(data.owner);
                modal.find("#main-owner-avatarlink").attr("src","{{URL::to('api/photo')}}"+"/"+data.avatar_link);
                $("#main-owner-name").text(data.owner);
                modal.find("#main-post-id").data("id",data.post_id);
                modal.find("#main-photo-post").attr("src","{{URL::to('api/photo')}}"+"/"+data.photo_link);
                modal.find("#main-post-description").text(data.description);
                $(".mv-cmt-itembox img").attr("src",$("#user-avatar-link-profile").attr("src"));
                $(".mv-cmt-itembox .cmt-chat-owner a").text($("#user-id-info").text().trim());
                if(data.liked==true)
                     modal.find("#post_like_btn").find('span:first').text("Đã thích");
                if(data.comments.length>0)
                {
                    console.log("into");
                     for(var i = 0;i<data.comments.length;i++){
                        var comment_box = createCommentBox(data.comments[i].name,"{{URL::to('api/photo')}}"+"/"+data.comments[i].avatar_link,data.comments[i].text);
                        comment_box.insertBefore($(".mv-cmt-itembox")).fadeIn(1000);
                     }
                }
                modal.modal('show');
            }
        });
    }
    $("#post_pin_btn").click(function(){
        $('.modal-upload').css("position","fixed").css("z-index",1050);
            var image_url = $("#main-photo-post").attr("src");

        $('.modal-upload').find('#blah').attr('src', image_url);
//        $('.modal-upload').find('#blah').attr('data-id',evt);
        $('.modal-upload').modal('show');
    });
      $(".modal-view").on('show.bs.modal',function(e){
            console.log("modal view before view");
        });
        $(".modal-view").on('shown.bs.modal',function(e){
                console.log("modal view viewed");
        });
  </script>
{{-- @stop  --}}
