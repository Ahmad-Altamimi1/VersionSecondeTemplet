@extends('layouts.dashboard')

@section('content')
    <?php
    include 'js/arabicdate.php';
    $datenow = strtotime('-3:00');
    $d = date('Y-m-d', $datenow);
    $dnav = ArabicDate();
    
    $datedata = [];
    $datedata[0] = date('Y-m-d', strtotime($d . ' + 1 days'));
    $datedata[1] = $d;
    for ($index = 2; $index < 12; $index++) {
        $datedata[$index] = date('Y-m-d', strtotime($d . ' - ' . $index . ' days'));
    }
    $visitorsdays = [];
    for ($index = 0; $index < 12; $index++) {
        $visitorsdays[$index] = $datedata[11 - $index];
    }
    
    $js_array = json_encode($visitorsdays);
    
    $markdata = [];
    $index = 0;
    ?>
    @foreach ($visitorsdays as $visitorsday)
        <?php
        $mark = 0;
        ?>
        @foreach ($visitors as $visitor)
            {{-- @if ($visitor->visited_at == $visitorsday . ' 00:00:00')
                <?php $mark++; ?>
            @endif --}}

            @if (substr($visitor->visited_at, 0, 10) == $visitorsday)
                <?php $mark++; ?>
            @endif
        @endforeach
        <?php
        $markdata[$index] = $mark;
        $index++;
        ?>
    @endforeach
    <?php
    $markdata[11] = null;
    $js_array2 = json_encode($markdata);
    
    // dd($visitors);
    
    ?>

    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        <?php echo 'var javascript_array = ' . $js_array . ";\n";
        echo 'var javascript_array2 = ' . $js_array2 . ";\n"; ?>

        var optionsArea = {
            chart: {
                height: 395,
                type: "area",
                background: "#fff",
                stacked: true,
                offsetY: 10,
                zoom: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false,
                    },
                },
            },
            stroke: {
                curve: "straight",
            },
            colors: ["#00acf0", "#ffbf36"],
            series: [{
                name: "الزيارات",
                data: javascript_array2,
            }, ],
            fill: {
                type: "gradient",
                gradient: {
                    inverseColors: false,
                    shade: "light",
                    type: "vertical",
                    opacityFrom: 0.9,
                    opacityTo: 0.4,
                    stops: [0, 100, 100, 100],
                },
            },
            markers: {
                size: 0,
                style: "hollow",
                strokeWidth: 8,
                strokeColor: "#fff",
                strokeOpacity: 0.25,
            },
            labels: javascript_array,
            xaxis: {
                type: "datetime",
                tooltip: {
                    enabled: false,
                },
            },
            legend: {
                offsetY: 0,
                position: "top",
                horizontalAlign: "right",
            },
        };
    </script>



    <section class="hk-sec-wrapper text-right">
        <div dir="rtl" class="hk-row">
            <div class="col-lg-12">
                <div class="card card-refresh">
                    <div class="refresh-container">
                        <div class="loader-pendulums"></div>
                    </div>
                    <div class="card-header card-header-action">
                        <div>
                            <h6 class="mb-10">الزيارات للأيام السابقة ( عدد مرات الدخول لأي مقال : {{ $REED }})</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="area_adwords"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
