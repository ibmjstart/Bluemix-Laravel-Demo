@section('modal-profile')
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
  <div class="modal fade modal-profile">
    <div class="modal-dialog">
      <div class="modal-content">
 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="padding-left:26px">Edit Profile</h4>
      </div>
      <div class="modal-body">
       <form class="standardForm form-horizontal" method="post">
         <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" id="profile-name" placeholder="Email">
             </div>
          </div>
          <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Avatar</label>
           <div class="col-sm-10">
             <div class="profileImageWrapper">
                <img id="profile-avatarlink" style="width:75;height: 75px" src="https://s-media-cache-ak0.pinimg.com/avatars/elconductor3_1384696909_75.jpg" class="profileImage img-circle" data-load-state="pending">
             </div>
             <input type="file" accept="image/*" id="profile-avatar"/>
           </div>
          </div>
          <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
             <div class="col-sm-10">
               <input type="text"  class="form-control" id="profile-email" placeholder="Email">
             </div>
          </div>
          <div class="form-group">
               <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="profile-username" placeholder="Email">
               </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea  class="form-control" id="profile-description" placeholder="Email"></textarea>
              </div>
           </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="profile-save"type="button" class="btn btn-primary">Save changes</button>
      </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="modal fade modal-progressbar">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                      00%
                      </div>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
  <script>
    name_val = $("#profile-name");
    username_val = $("#profile-username");
    email_val = $("#profile-email");
    description_val = $("#profile-description");
    avatar_val = $("#profile-avatarlink");
    function showProfile(user_id)
    {
        var url ="{{URL::to('/api/user/')}}"+"/"+user_id;
        $.get(url,function(data){
            name_val.val(data.name);
            username_val.val(data.username);
            description_val.val(data.description);
            email_val.val(data.email);
            avatar_val.attr("src",("{{URL::to('/api/photo/')}}"+"/"+data.avatar_link));
        },'json');
    }
    function saveProfile(user_id)
    {
        var url ="{{URL::to('/api/user/')}}"+"/"+user_id;
        var data = {
            "name":name_val.val(),
            "username": username_val.val(),
            "description": description_val.val(),
            "email": email_val.val(),
            "avatar_link": avatar_val.data("id")
        };
        $.ajax({
            type:"PUT",
            url:url,
            data:data,
            success:function(){
                $(".modal-profile").modal('hide');
                window.location.href="{{URL::to('/')}}"+"/"+data.username;
            }
        });
    }

     $("#profile-avatar").change(function(){
                changeAvatar(this);
     });
     $("#profile-save").click(function(){
         saveProfile($("#user-span").data("user"));

     });
    function changeAvatar(input)
    {
            if (input.files && input.files[0]) {
                    if(input.files[0].size > 5*1024*1024)
                    {
                        alert("Qua dung luong");
                        return;
                    }
                    console.log(input.files[0]);
                    var formData = new FormData();
                    $('.modal-progressbar').modal('show');
                    formData.append("src",input.files[0]);
                    $.ajax({
                            url :"{{url('/api/photo')}}",
                            data: formData,
                            type :'POST',
                            dataType: 'json',
                            processData: false, // Don't process the files
                            contentType: false,
                            xhr: function()
                            {
                                var xhr = new window.XMLHttpRequest();
                                //Upload progress
                                xhr.upload.addEventListener("progress", function(evt){
                                    var percentComplete = (evt.loaded / evt.total)*100;
                                    //Do something with upload progress
                                    console.log(percentComplete);
                                    $('.modal-progressbar .progress-bar').css('width', percentComplete+'%');
                                    $('.modal-progressbar .progress-bar').text(percentComplete+'%');
                                }, false);
                                return xhr;
                           }
                        }).success(function(evt){
                            // console.log(evt);
                            $('.modal-progressbar').modal('hide');
                            image_url = "{{url('api/photo/')}}"+"/"+evt;
                            $('#profile-avatarlink').attr('src', image_url+"_75");
                            $('#profile-avatarlink').attr('data-id',evt);
                        });
               }
    }
  </script>
{{-- @stop  --}}
