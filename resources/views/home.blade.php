@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    {!! csrf_field() !!}
    <!-- page content -->
    <script>
        /*$(window).blur(function() {
            clearInterval(intervalID);

            if(aborted && aborted.readyState != 4){
                aborted.abort();
                console.log('aborted1');
            }
            if(aborted2 && aborted2.readyState != 4){
                aborted2.abort();
                console.log('aborted2');
            }
        });*/
        intervalID = setInterval(myfunc, 5000);
        function myfunc() {

            aborted = $.ajax({
                url: '{{url("buttonsAjax")}}',
                type:'GET',
                success:function(data){
                    $("#result1").html(data);
                    console.log('açıldı1');
                }

            });
            aborted2 = $.ajax({
                url: '{{url("switchesAjax")}}',
                type:'GET',
                success:function(data){

                    $("#result").html(data);
                    console.log('beni de gör be abi');

                }

            });

        }


        $('.mycheck').bootstrapSwitch({
            size: 'mini',
            onColor: 'success',
            offColor: 'default'

        });
        $(".mycheck").on('switchChange.bootstrapSwitch', function(event, state) {
            clearInterval(intervalID);

            if(aborted && aborted.readyState != 4){
                aborted.abort();
                console.log('aborted1');
            }
            if(aborted2 && aborted2.readyState != 4){
                aborted2.abort();
                console.log('aborted2');
            }

            console.log('kapandı');
            if(state == false){
                clearInterval(intervalID);
                var a= event['currentTarget']['id'];
                $.ajax({type: "GET",
                    url: "{{url('/buttonsAjax')}}",
                    data: { input: a, dat: 0 },
                    success:function(result){
                        $("#result1").html(result);

                        intervalID = setInterval(myfunc, 5000);
                        function myfunc() {

                            aborted = $.ajax({
                                url: '{{url("buttonsAjax")}}',
                                type:'GET',
                                success:function(data){
                                    $("#result1").html(data);
                                    console.log('açıldı2');
                                }

                            });
                            aborted2 = $.ajax({
                                url: '{{url("switchesAjax")}}',
                                type:'GET',
                                success:function(data){

                                    $("#result").html(data);
                                    console.log('beni de gör be abi');

                                }

                            });

                        }
                    }});
            }else{
                clearInterval(intervalID);
                var a= event['currentTarget']['id'];
                $.ajax({type: "GET",
                    url: "{{url('/buttonsAjax')}}",
                    data: { input: a, dat: 1 },
                    success:function(result){
                        $("#result1").html(result);

                        intervalID = setInterval(myfunc, 5000);
                        function myfunc() {

                            aborted = $.ajax({
                                url: '{{url("buttonsAjax")}}',
                                type:'GET',
                                success:function(data){
                                    $("#result1").html(data);
                                    console.log('açıldı3');
                                }

                            });
                            aborted2 = $.ajax({
                                url: '{{url("switchesAjax")}}',
                                type:'GET',
                                success:function(data){

                                    $("#result").html(data);
                                    console.log('beni de gör be abi');

                                }

                            });

                        }
                    }});
            }


        });

    </script>
    <div class="right_col" role="main">

        <br />
        <div class="">
            <div class="container">
                @include('flash::message')
                {{ Session::forget('flash_notification.message') }}
            </div>
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check"></i>
                        </div>
                        <div class="count">{{$ideal}}</div>

                        <h3>İdeal Durumda Çalışanlar</h3>
                        <p>Sensörlerin düzgün çalıştığını belirtir.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-hand-paper-o"></i>
                        </div>
                        <div class="count">{{$kontrol}}</div>

                        <h3>Kontrol Edilmesi Gerekenler</h3>
                        <p>İdeal sıcaklığın üzerinde çalıştığını belirtir.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-warning"></i>
                        </div>
                        <div class="count">{{$ariza}}</div>

                        <h3>Tehlikeli Durumda Çalışanlar</h3>
                        <p>Tehlikeli sıcaklık seviyesinin aşıldığını belirtir. </p>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Genel Bakış <small>Sensörler ve Röleler</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Tüm Sensörler</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div id="mainb" style="height:350px;"></div>
                                        <div id="echart_bar_horizontal" style="height:450px; width: 100%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12" id="result1">
                                <div  class="x_panel">
                                    <div class="x_title">
                                        <h2>Kontrol</h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        @for ($i=0;$i<6;$i++)
                                        <div class="col-md-6 col-sm-12 col-xs-12" >
                                            @if($buttons['b'.($i+1)] == 1)
                                            <label>
                                                <input type="checkbox" class="mycheck" checked name="b{{$i+1}}" id="b{{$i+1}}"  /> Button {{$i+1}}
                                            </label>
                                            @else
                                                <label>
                                                    <input type="checkbox" class="mycheck" name="b{{$i+1}}" id="b{{$i+1}}"  /> Button {{$i+1}}
                                                </label>
                                            @endif
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12" id="result">
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


   <script>
       $(document).ready(function() {

           $('.mycheck').bootstrapSwitch({
               size: 'mini',
               onColor: 'success',
               offColor: 'default'

           });
           var myChart9 = echarts.init(document.getElementById('mainb'), theme);
           myChart9.setOption({
               title: {
                   text: 'Sensör - Sıcaklık',
                   subtext: 'Her bir sensörün sıcaklık değerleri'
               },
               //theme : theme,
               tooltip: {
                   trigger: 'axis'
               },
               legend: {
                   data: ['sıcaklık']
               },
               toolbox: {
                   show: false
               },
               calculable: false,
               xAxis: [{
                   type: 'category',
                   data: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T8', 'T10', 'T11', 'T12', 'T13', 'T15','T16']
               }],
               yAxis: [{
                   type: 'value'
               }],
               series: [{
                   name: 'sıcaklık',
                   type: 'bar',

                   data: [{{$temp['t1']}}, {{$temp['t2']}}, {{$temp['t3']}}, {{$temp['t4']}}, {{$temp['t5']}},{{$temp['t6']}}, {{$temp['t8']}}, {{$temp['t10']}}, {{$temp['t11']}}, {{$temp['t12']}},{{$temp['t13']}}, {{$temp['t15']}},{{$temp['t16']}}],
                   markPoint: {
                       data: [{
                           type: 'max'

                       }, {
                           type: 'min'

                       }]
                   }

               }]
           });
           var myChart = echarts.init(document.getElementById('echart_bar_horizontal'), theme);
           myChart.setOption({
               title: {
                   text: 'Sensör - Sıcaklık',
                   subtext: 'Her bir sensörün sıcaklık değerleri'
               },
               //theme : theme,
               tooltip: {
                   trigger: 'axis'
               },

               toolbox: {
                   show: false
               },
               calculable: false,
               xAxis: [{
                   type: 'value'
               }],
               yAxis: [{

                   type: 'category',
                   data: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T8', 'T10', 'T11', 'T12', 'T13', 'T15','T16']
               }],
               series: [{
                   name: 'sıcaklık',
                   type: 'bar',

                   data: [{{$temp['t1']}}, {{$temp['t2']}}, {{$temp['t3']}}, {{$temp['t4']}}, {{$temp['t5']}},{{$temp['t6']}}, {{$temp['t8']}}, {{$temp['t10']}}, {{$temp['t11']}}, {{$temp['t12']}},{{$temp['t13']}}, {{$temp['t15']}},{{$temp['t16']}}],
                   markPoint: {
                       data: [{
                           type: 'max'

                       }, {
                           type: 'min'

                       }]
                   }

               }]
           });
       });
   </script>




    <!-- /page content -->
@endsection