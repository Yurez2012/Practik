@extends('layouts.admin')

@section('content')


        <!-- Styles -->
        <style>
            #chartdiv {
                background: black;
                width	: 100%;
                height	: 500px;
            }

        </style>

        <!-- Resources -->


        <!-- Chart code -->
        <script>
            var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "theme": "black",
                "marginRight": 40,
                "marginLeft": 40,
                "autoMarginOffset": 20,
                "mouseWheelZoomEnabled":true,
                "dataDateFormat": "YYYY-MM-DD",
                "valueAxes": [{
                    "id": "v1",
                    "axisAlpha": 0,
                    "position": "left",
                    "ignoreAxisWidth":true
                }],
                "balloon": {
                    "borderThickness": 1,
                },
                "graphs": [{
                    "id": "g1",
                    "balloon":{
                        "drop":true,
                        "adjustBorderColor":false,
                        "color":"black"
                    },
                    "bullet": "round",
                    "bulletBorderAlpha": 1,
                    "bulletColor": "silver",
                    "bulletSize": 5,
                    "hideBulletsCount": 50,
                    "lineThickness": 2,
                    "title": "red line",
                    "useLineColorForBulletBorder": true,
                    "valueField": "value",
                    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
                }],
                "chartScrollbar": {
                    "graph": "g1",
                    "oppositeAxis":false,
                    "offset":30,
                    "scrollbarHeight": 80,
                    "selectedBackgroundAlpha": 0.1,
                    "selectedBackgroundColor": "#fff",
                    "selectedGraphLineAlpha": 1,
                    "autoGridCount":true,
                    "color":"black"
                },
                "chartCursor": {
                    "pan": true,
                    "valueLineEnabled": true,
                    "valueLineBalloonEnabled": true,
                    "cursorAlpha":1,
                    "cursorColor":"#258cbb",
                    "limitToGraph":"g1",
                    "valueLineAlpha":0.2,
                    "valueZoomable":true
                },
                "valueScrollbar":{
                    "oppositeAxis":false,
                    "offset":50,
                    "scrollbarHeight":10
                },
                "categoryField": "date",
                "categoryAxis": {
                    "parseDates": true,
                    "dashLength": 1,
                    "minorGridEnabled": true
                },
                "export": {
                    "enabled": true
                },
                "dataProvider": [{
                    "date": "2017-02-01",
                    "value": 0
                },
                    @foreach($user as $us)
                    {
                    "date": "{!! $us->date !!}",
                    "value": "{!! $us->count !!}"
                },
                    @endforeach
                ]
            });

            chart.addListener("rendered", zoomChart);

            zoomChart();

            function zoomChart() {
                chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
            }
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>


@stop