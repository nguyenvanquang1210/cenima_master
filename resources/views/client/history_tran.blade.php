<!doctype html>
<html class="no-js" lang="">

<head>
    @include('client.share.css')
</head>

<body>
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->
    @include('client.share.header')
    <main>
        <section id="app" class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg"
            style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="contact-form-wrap">
                            <div class="widget-title mb-50">
                                <h5 class="title">Lịch sử thanh toán</h5>
                            </div>
                            <div class="contact-form">
                                <table class="table table-bordered text-white" id="listTransaction">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Mã hóa đơn</th>
                                            <th scope="col">Tên Phim </th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Date created</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value, key) in table">
                                            <tr>
                                                <th scope="row">@{{ key + 1 }}</th>
                                                <td>@{{ value.ma_hoa_don }}</td>
                                                <td>@{{ value.ten_phim }}</td>
                                                <td>@{{ formatMoney( value.amount )}}</td>
                                                <td>@{{ formatDate(value.created_at) }}</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="widget-title mb-50">
                            <h5 class="title">Thông Tin Về Chúng Tôi</h5>
                        </div>
                        <div class="contact-info-wrap">
                            <p><span>WuangWang Cinema :</span> Tận hưởng từng khoảnh khắc của bạn</p>
                            <div class="contact-info-list">
                                <ul>
                                    <li>
                                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                        <p><span>Address :</span> 94 Hoàng Diệu, Hải Châu, Đà Nẵng</p>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                        <p><span>Phone :</span> 0386195648</p>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="fas fa-envelope"></i></div>
                                        <p><span>Email :</span> quangvan12102001@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- main-area-end -->
    @include('client.share.footer')
    <!-- JS here -->
    @include('client.share.js')
    @yield('js')
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/64102cc231ebfa0fe7f27148/1grfitn6h';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <script>
        new Vue({
            el: '#app',
            data: {
                table: {},
            },
            created() {
                this.getData();
            },
            methods: {
                getData() {
                    axios
                        .get('/client/lich-su-thanh-toan/data')
                        .then((res) => {
                            this.table = res.data.data;
                        });
                },
                formatDate(date) {
                    const [dateValues, timeValues] = date.split(' ');
                    const newDate = new Date(dateValues);
                    return newDate.toDateString();
                },
                formatMoney(value) {
                    return new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(value)
                },
            },
        });
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
