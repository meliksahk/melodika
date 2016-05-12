{!! csrf_field() !!}
<div class="x_panel">
    <div class="x_title">
        <h2>Röleler</h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">

        @for ($i=0;$i<8;$i++)
            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-6">
                <div class="x_panel">
                    <div class="x_content">

                        <b class="text-center">R{{$i+1}}</b>


                        @if($switches['r'.($i+1)] == 1)
                            <img class="img img-rounded" src="{{asset('/images/aldea/aktif-77x124.png')}}">
                        @else
                            <img class="img img-rounded" src="{{asset('/images/aldea/pasif-77x124.png')}}">

                        @endif

                    </div>
                </div>
            </div>
        @endfor

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 panic_button">
                <a href="{{url('turnOff')}}"><img class="img img-rounded center-block" style="width:170px; height: 170px;" src="{{asset('/images/aldea/emergency.png')}}"></a>
            </div>

    </div>
</div>