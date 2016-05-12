@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    {!! csrf_field() !!}
    <!-- page content -->
    <div class="right_col" role="main">

        <br />
        <div class="">

            <div class="row">
                <div class="x_panel ">
                    <div class="x_title">
                        <h2>Sensör sıcaklıkları</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                            @for($i=1;$i<17;$i++)
                                @if($i != 14 && $i != 7 && $i != 9)
                                    <div class="col-lg-15 col-md-15 col-sm-4 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_content">
                                                <div id="echart_guage{{$i}}" style="height:370px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor

                    </div>

                </div>
            </div>

        </div>
    </div>
<script>
    $(document).ready(function () {
    <? for($i=1;$i<17;$i++) {
    if($i != 14 && $i != 7 && $i != 9) {?>
        var i;
        for(i=1;i<17;i++){
            if(i == "<? echo $i?>")
            {
                var myChart = echarts.init(document.getElementById('echart_guage'+i), theme);
                myChart.setOption({
                    tooltip: {
                        formatter: "{a} <br/>{b} : {c} ºC"
                    },
                    toolbox: {
                        show: true,
                        feature: {
                            restore: {
                                show: true
                            },
                            saveAsImage: {
                                show: true
                            }
                        }
                    },
                    series: [{
                        name: 'Sıcaklık',
                        type: 'gauge',
                        center: ['50%', '50%'],
                        radius: [0, '75%'],
                        startAngle: 120,
                        endAngle: -120,
                        min: 0,
                        max: 250,
                        precision: 0,
                        splitNumber: 10,
                        axisLine: {
                            show: true,
                            lineStyle: {
                                color: [
                                    [0.5, '#26b97c'],
                                    [0.7, '#ff4500'],
                                    [1, '#E70505']
                                ],
                                width: 20
                            }
                        },
                        axisTick: {
                            show: true,
                            splitNumber: 5,
                            length: 5,
                            lineStyle: {
                                color: '#eee',
                                width: 2,
                                type: 'dashed'
                            }
                        },
                        axisLabel: {
                            show: true,
                            formatter: function (v) {
                                switch (v + '') {
                                    case '0':
                                        return 'ideal';

                                    case '150':
                                        return 'yüksek';
                                    case '250':
                                        return 'riskli';
                                    default:
                                        return '';
                                }
                            },
                            textStyle: {
                                color: 'auto'
                            }
                        },
                        splitLine: {
                            show: true,
                            length: 20,
                            lineStyle: {
                                color: '#eee',
                                width: 3,
                                type: 'solid'
                            }
                        },
                        legendHoverLink: true,
                        pointer: {
                            length: '90%',
                            width: 6,
                            color: 'auto'
                        },
                        title: {
                            show: true,
                            offsetCenter: ['-80%', -20],
                            textStyle: {
                                color: 'auto',
                                fontSize: 15
                            }
                        },
                        detail: {
                            show: true,
                            backgroundColor: 'rgba(0,0,0,0)',
                            borderWidth: 0,
                            borderColor: '#ccc',
                            width: 80,
                            height: 30,
                            offsetCenter: ['-80%', -10],
                            formatter: '{value} ºC',
                            textStyle: {
                                color: 'auto',
                                fontSize: 20
                            }
                        },

                        data: [{

                            value: "{{$temp['t'.$i]}}",
                            name: 'T'+i

                        }]

                    }]
                });
            }
        }
        <?
        }
        }
        ?>
    });
</script>
    <!-- /page content -->
@endsection