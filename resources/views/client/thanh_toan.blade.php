@extends('client.master')
@section('content')
<section class="movie-details-area" data-background="/assets_client/img/bg/movie_details_bg.jpg">
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="episode-watch-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="season">Tên Phim: {{ $phim->ten_phim }} - Lịch Chiếu: {{ Carbon\Carbon::parse($phim->thoi_gian_bat_dau)->format('H:i d/m/Y')  }}</span>
                                    <span class="video-count">{{ $tongVe }} Vé đã đặt</span>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul>
                                        @foreach ($dsGheBan as $key => $value)
                                        <li><a href="" class="popup-video"><i class="fa-solid fa-couch"></i>Ghế {{ $value->ten_ghe }}</a> <span class="duration"><i class="fa-solid fa-money-bill"></i> 15 đ</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="season">Tổng Tiền Thanh Toán</span>
                                    <span class="video-count">{{ number_format($tongVe * 15, 0, '.', ',') }}  vnđ</span>
                                </button>
                                {{-- <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="season">Thanh Toán Ngân Hàng VCB</span>
                                    <span class="video-count">Bạn cần thanh toán {{ number_format($tongVe * 15, 0, '.', ',') }} vnđ<br>Qua số tài khoản 9345884657. <br>Nội dung là {{ $maGiaoDich }}</span>
                                </button> --}}
                                <button class="btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="season">Thời Gian Có Thể Thanh Toán</span>
                                    <span class="video-count">
                                        <a href="" class="btn" style="background-color: #e4d804; color: black">@{{ time }} s</a>
                                    </span>
                                </button>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="paypal-donate-button-container"></div>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <span class="video-count">
                                            <a class="btn" style="background-color: #e4d804; color: black" id="done" v-on:click="done()" hidden>DONE</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
    <script>
        new Vue({
            el  :   '#app',
            data:    {
                time : 200,
            },
            created() {
                setInterval(() => {
                    if(this.time <= 1) {
                        toastr.error("Đã hết thời gian thanh toán");
                        window.location.replace("/");
                    }
                    this.time--;
                }, 1000);
            },
            methods: {
                done() {
                    axios
                        .get('/client/done')
                        .then((res) => {
                            toastr.success("Đã đặt vé thành công!");
                            window.location = '/';
                        });
                },
            },
        });
    </script>
    <script>
        PayPal.Donation.Button({
            env: 'sandbox',
            hosted_button_id: 'FSD6HQPBKTRZE',
            // business: 'YOUR_EMAIL_OR_PAYERID',
            image: {
                src: 'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                title: 'PayPal - The safer, easier way to pay online!',
                alt: 'Donate with PayPal button'
            },
            onComplete: function (params) {
                toastr.success("Đã thanh toán thành công!");
            },
        }).render('#paypal-donate-button-container');

        $('#paypal-donate-button-container').click(function(){
            let p = document.getElementById('done');
            p.removeAttribute("hidden");
        });
    </script>


@endsection
