@section('modal')
  <div class="modal fade modal-upload" tabindex="-1">
    <div class="modal-dialog" style="width:70%;">
      <div class="modal-content">
          <div class="col-md-7 left-upload-modal">
            <div class="wf-box object-fit_contain image-fit" id = "img_preview" style="margin-top:55px;">
              <img src="{{URL::asset('img/5.jpg')}}" id="blah">
              <div class="content">
                <textarea placeholder='Viết chú thích' id='board_description' class="description"></textarea>
                <i class="fa fa-map-marker fa-2x locate-map"></i>
                <div class="locate-text" style="display:none;"></div>
                <input id="pac-input" class="controls" type="text" placeholder="Search Box" style="display:none;">
                <div id="map" style="display:none;"></div>
              </div>
            </div>
          </div>
          <div id="board-choose-div" class="col-md-5 right-upload-modal">
            <div class="row" style="margin-top:20px;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="row" style="margin-top:20px;">
              <ul class="list-group ajbh-list-hastag2">
                  <li class="list-group-item" style='float:left;'>BBQ</li>
                  <li class="list-group-item" style='float:left;'>BingSu</li>
                  <li class="list-group-item" style='float:left;'>BBQ</li>
                </ul>
            </div>
            <div class="row" style="margin-top:20px;">
              <div class="col-md-10">Chọn một bảng</div>
              <div class="col-md-2">
              </div>
            </div>
            <input type="text" class="form-control" placeholder="Search" style="margin-top:30px;">
            <div id="board-list" class="board-list-scrollable">
              <div class="row board_choose" style="margin-top:30px;border-radius:6px;">
                <img id="board_cover_link" src="{{URL::asset('img/5.jpg')}}" width="50" height="50">
                <span id ="title" style='margin-left:10px;' data-id="">Album 1</span>
                <button class="btn pinit_btn hidden">
                  <em></em>
                  <span>Pin it</span>
                </button>
                <!-- <div style="cursor:pointer;" class="pinit" data-option='1'>Pin it</div> -->
              </div>
<!--               <div class="row board_choose" style="margin-top:30px;border-radius:6px;">
                <img src="vendors/img/5.jpg" width="50" height="50">
                <span style='margin-left:10px;'>Album 1</span>
              </div> -->
            </div>
            <div class="row board_create" id="create_div" style="margin-top:10px;border-radius:6px;cursor:pointer">
                <img src="{{URL::to('img/red-plus.png')}}" width="50" height="50">
                <span style='margin-left:10px;'>Tạo thêm 1 bảng</span>
            </div>
          </div>
          
          <div id="board-create-div" class="col-md-5 right-upload-modal hidden">
             <form id="board-create-form">
             <div  class="row" style="margin-top:10px;">
              <h1>
                <div class="col-md-10">Tạo bảng</div>
                <div class="col-md-2"></div>
              </h1>
              </div>
              <div class="row board-edit-name">
                <label for="Tên">Tên</label>
                <br>
                <input id="board_title" name="title" class="board-name-input" placeholder="Nhập tên bảng"/>
              </div>
              <div class="row board-edit-name">
                <button id = "btnCreate" class="btn btn-default">Create</button>
                <button id="btnCancel" class="btn btn-default">Cancel</button>
              </div>
            </form>
          </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    $('#btnCreate').click(function(event){
       createBoard();
       changeClass(1);
       event.preventDefault();
    });
    $('#btnCancel').click(function(event){
       changeClass(1);
       event.preventDefault();
    });
    
    $('#create_div').click(function(){
        changeClass(2);
    });
    $('#board-list').on("mouseenter","div.board_choose",function(){
        $(this).find('button.pinit_btn').removeClass('hidden');
    });
    $('#board-list').on("mouseleave","div.board_choose",function(){
        $(this).find('button.pinit_btn').addClass('hidden');
    });
    $('#board-list').on("click","button.pinit_btn",function(){
        console.log($(this).parent());
        var url ="{{URL::to('api/post')}}";
        var data ={
          'description':$('#board_description').val(),
          'board_id':$(this).parent().find('span:first').data('id'),
          'photo_link':getId($('#img_preview').find('img').attr("src"))
        };
        $.post(url,data,function(data){
          console.log(data);
          $('.modal-upload').modal('hide'); 
          location.reload(true);
        },'json');
    });
    function getId(url) 
    {
      tmp = url.split("/");
      return tmp[tmp.length-1];
    }
    function changeClass(divNumber)
    {
      if(divNumber==1) 
        {
          $("#board-choose-div").removeClass("hidden");
          $("#board-create-div").addClass("hidden");
          // $("#board-choose-form").fadeIn();
          // $("#board-create-div").fadeOut();
        }
        else
        {
        // {
          $("#board-choose-div").addClass("hidden");
          $("#board-create-div").removeClass("hidden");
        // $("#board-choose-form").fadeIn();
        //   $("#board-create-div").fadeOut();
        }
    }
    function createBoard()
    {
      $url = "{{URL::to('api/board')}}";
      $method = "POST";
      $.post($url,$('#board-create-form').serialize(),function(data)
        { 
          $('#board-list div:first').clone().appendTo("#board-list");
          $('#board-list div:last span:first').text(data.title);
          $('#board-list div:last').removeClass('hidden');
          $('#board-list div:last span:first').attr("data-id",data.board_id);
        },'json');
    }
    function initAutocomplete() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      // Create the search box and link it to the UI element.
      var input = document.getElementById('pac-input');
      var searchBox = new google.maps.places.SearchBox(input);
      // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      // Bias the SearchBox results towards current map's viewport.
      map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
      });

      var markers = [];
          
      searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
          marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
          var icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          // Create a marker for each place.
          markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
          }));

          if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
          } else {
              bounds.extend(place.geometry.location);
          }

          console.log('ID: ' + place.place_id + ' <br> ' + 'LatLng' + place.geometry.location);
          console.log(place.geometry.location);

          $('.locate-map').show();
          $('.locate-map').html('tại- '+place.name);
          $('.locate-map').show();
          $('#pac-input').hide();
          $('#map').hide();
        });
        map.fitBounds(bounds);
      });
    }
    function listBoardUser()
    {
       url = "{{URL::to('api/board')}}";
       $.get(url,function(data){
          for(var i = 0;i<data.length;i++)
          {
              $('#board-list div:first').clone().appendTo("#board-list");
              $('#board-list div:last').removeClass('hidden');
              $('#board-list div:last span:first').text(data[i].title);
              $('#board-list div:last span:first').attr("data-id",data[i].board_id);
          }
       });  
       $('#board-list div:first').addClass('hidden'); 
    }
    $('.board_choose').hover(
      function(){
      
        $(this).find("button:first").addClass('pinit_btn').removeClass('hidden');
      
      }, function(){
        $(this).find("button:first").removeClass('pinit_btn').addClass('hidden');
    });
    $(".modal-upload").on('show.bs.modal',function(e){
        console.log("modal upload before view");
    });
    $(".modal-upload").on('shown.bs.modal',function(e){
            console.log("modal upload view");
    });
    listBoardUser();
  </script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFo1vaTwz6NILG9inO-5HOEQ14yYWSf9U&signed&libraries=places"
  async defer></script> 
{{-- @stop  --}}
