@extends('layouts_admin.app')
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-thumb-up"></i> {{ __('messages.like') }}</div>
                                    <h2>{{number_format($sum_likes)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-eye"></i> {{ __('messages.view') }}</div>
                                    <h2>{{number_format($sum_views)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-check-box"></i> {{ __('messages.a-product') }}</div>
                                    <h2>{{number_format($count_product)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-shopping-cart"></i> {{ __('messages.total-bill') }}</div>
                                    <h2>{{number_format($count_bill)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg5">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-shopping-cart-full"></i> {{ __('messages.bill-are-pending') }}</div>
                                    <h2>{{number_format($count_bill_are_pending)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg6">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-check"></i> {{ __('messages.bill-complete') }}</div>
                                    <h2>{{number_format($count_bill_complete)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg7">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-close"></i> {{ __('messages.bill-cancel') }}</div>
                                    <h2>{{number_format($count_bill_cancel)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg7">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-money"></i> {{ __('messages.a-price') }}</div>
                                    <h2>{{number_format($sum_price)}} <sup>{{ __('messages.a-vnđ') }}</sup></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 mt-5">
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="header-title">Social ads Campain</h4>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-ml-4 col-lg-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Timeline</h4>
                        <div class="timeline-area">
                            <div class="timeline-task">
                                <div class="icon bg1">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="tm-title">
                                    <h4>Rashed sent you an email</h4>
                                    <span class="time"><i class="ti-time"></i>09:35</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                                </p>
                            </div>
                            <div class="timeline-task">
                                <div class="icon bg2">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <div class="tm-title">
                                    <h4>Rashed sent you an email</h4>
                                    <span class="time"><i class="ti-time"></i>09:35</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                                </p>
                            </div>
                            <div class="timeline-task">
                                <div class="icon bg2">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <div class="tm-title">
                                    <h4>Rashed sent you an email</h4>
                                    <span class="time"><i class="ti-time"></i>09:35</span>
                                </div>
                            </div>
                            <div class="timeline-task">
                                <div class="icon bg3">
                                    <i class="fa fa-bomb"></i>
                                </div>
                                <div class="tm-title">
                                    <h4>Rashed sent you an email</h4>
                                    <span class="time"><i class="ti-time"></i>09:35</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                                </p>
                            </div>
                            <div class="timeline-task">
                                <div class="icon bg3">
                                    <i class="ti-signal"></i>
                                </div>
                                <div class="tm-title">
                                    <h4>Rashed sent you an email</h4>
                                    <span class="time"><i class="ti-time"></i>09:35</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo $date ?>,
                    datasets: [{
                        label: 'price',
                        data: <?php echo $price ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
