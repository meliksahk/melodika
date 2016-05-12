$(window).on("blur focus", function(e) {
    var prevType = $(this).data("prevType");

    if (prevType != e.type) {   //  reduce double fire issues
        switch (e.type) {
            case "blur":
                clearInterval(intervalID);

                if(aborted && aborted.readyState != 4){
                    aborted.abort();
                    console.log('aborted1');
                }
                if(aborted2 && aborted2.readyState != 4){
                    aborted2.abort();
                    console.log('aborted2');
                }
                break;
            case "focus":
                intervalID = setInterval(myfunc, 5000);
            function myfunc() {

                aborted = $.ajax({
                    url: '{{url("/buttonsAjax")}}',
                    type:'GET',
                    success:function(data){
                        $("#result1").html(data);
                        console.log('açıldı1');
                    }

                });
                aborted2 = $.ajax({
                    url: '{{url("/switchesAjax")}}',
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
                break;
        }
    }

    $(this).data("prevType", e.type);
})
