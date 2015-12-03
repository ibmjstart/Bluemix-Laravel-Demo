@section('modal')
<div class="btn-mess" data-toggle="tooltip" title="Tùng">
  <p class="text">T</p>
</div>
<div class="box-mess">
  <div class="bm-header">
    <a href="" >Tùng</a>
    <div class="bm-close"></div>
  </div>
  <div class="bm-container"></div>
  <div class="bm-footer">
    <textarea placeholder="Thêm tin nhắn"></textarea>
  </div>  
</div>

<script type="text/javascript">
  $('.box-mess').hide();

  $('.btn-mess').on('click', function(){
    if($(this).hasClass('opened')){
      $(this).removeClass('opened');
      $('.box-mess').hide();
    }else{
      $(this).addClass('opened');
      $('.box-mess').show();
    }
  });

  $('.bm-close').on('click', function(){
    $('.btn-mess').removeClass('opened');
    $('.box-mess').hide();
  });
</script>
{{-- @stop  --}}
