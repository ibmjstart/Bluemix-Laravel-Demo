@section('sub-menu')
  <div class="kc_fab_wrapper" data-toggle="tooltip" title="Sub-menu"></div>
  <script src="{{URL::asset('js/kc.fab.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var links = [
          {
              "bgcolor":"red",
              "icon":"+"
          },
          {
              "url":"{{url('/an-gi-bay-gio')}}",
              "bgcolor":"red",
              "color":"#fffff",
              "icon":"<i class='fa fa-cutlery'></i>"
          },
          {
              "url":"{{url('/an-gi-bay-gio')}}",
              "bgcolor":"black",
              "color":"white",
              "icon":"<i class='fa fa-music'></i>"
          },
          {
              "url":"{{url('/an-gi-bay-gio')}}",
              "bgcolor":"black",
              "color":"white",
              "icon":"<i class='fa fa-caret-up'></i>"
          }
      ]
      $('.kc_fab_wrapper').kc_fab(links);
    })
  </script>
{{-- @stop  --}}
