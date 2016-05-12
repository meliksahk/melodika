{!! csrf_field() !!}

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
                        <input type="checkbox" class="mycheck" checked name="b{{$i+1}}" id="b{{$i+1}}" /> Button {{$i+1}}
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


                }});
        }


    });



</script>



