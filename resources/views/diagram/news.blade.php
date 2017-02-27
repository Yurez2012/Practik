@extends('layouts.admin')

@section('content')



    <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'News'
            },
            xAxis: {
                title: {
                    text: 'News',
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Show news',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' show'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -750,
                y: 40,
                floating: true,
                borderWidth: 1,
                backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [
             @foreach($news as $item)
                {
                    name: '{!! $item->id !!}',
                    data: [{!! $item->show !!}]
                },
             @endforeach
            ]
        });
    </script>
    <div class="row">
        <div class="col-md-12 text-center">
            {!! $news->render() !!}
        </div>
    </div>

@stop