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
        <section id="app" class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="contact-form-wrap">
                            <div class="widget-title mb-50">
                                <h5 class="title">Cập nhật thông tin</h5>
                            </div>
                            <div class="contact-form">
                                <form method="post" >
                                    @csrf
                                    <div class="col-md-12">
                                        <label for="">Họ và tên</label>
                                        <input v-model="user.ho_va_ten" type="text"  placeholder="Nhập vào họ và tên">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Email</label>
                                        <input v-model="user.email" type="email"  placeholder="Nhập vào email">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Số điện thoại</label>
                                        <input v-model="user.so_dien_thoai" type="tel"  placeholder="Nhập vào số điện thoại">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Địa chỉ</label>
                                        <input v-model="user.dia_chi" type="text"  placeholder="Nhập vào địa chỉ">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Ngày sinh</label>
                                        <input v-model="user.ngay_sinh" type="date"  placeholder="Nhập vào ngày sinh">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Giới tính</label>
                                        <select v-model="user.gioi_tinh" style="background-color: #1f1e24; color: #bcbcbc; border: 1px solid #1f1e24; padding: 14px 25px; margin-bottom: 30px; width: 100%;">
                                            <option value="1">Giới Tính Nam</option>
                                            <option value="0">Giới Tính Nữ</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button" v-on:click="updateInfor()" class="btn">Cập nhật</button>
                                        </div>
                                    </div>
                                </form>
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
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64102cc231ebfa0fe7f27148/1grfitn6h';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<script>
    new Vue({
        el  :   '#app',
        data:    {
            user : {},
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                axios
                    .get('/client/thong-tin/data')
                    .then((res) => {
                        this.user = res.data.data;
                    });
            },
            updateInfor(){
                axios
                    .post('/client/thong-tin', this.user)
                    .then((res) => {
                        if(res.data.status){
                            toastr.success('Cập nhật thông tin thành công!');
                        }
                    })
                    .catch((res) => {
                        var danh_sach_loi = res.response.data.errors;
                        $.each(danh_sach_loi, function(key, value){
                            toastr.error(value[0]);
                        });
                    });
            },
        },
    });
</script>
    <!--End of Tawk.to Script-->
</body>

</html>
