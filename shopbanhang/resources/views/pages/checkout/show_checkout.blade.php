@extends('layout')
@section('content')

<link href="{{asset('public/backend/css/validation.css')}}" rel="stylesheet"></link>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/trang-chu')}}">Home</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->


        <div class="register-req">
            <p>Vui lòng điền đày đủ thông tin</p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Thông tin chuyển hàng</p>
                        <div class="form-one">
                        <form action="{{URL::to('/save-checkout-customer')}}" method="POST" id="form-1" class="form">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <input id="shipping_email" name="shipping_email" type="text" placeholder="Email" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <input id="shipping_name" name="shipping_name" type="text" placeholder="Họ & Tên:" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <input id="shipping_address" name="shipping_address" type="text" placeholder="Địa chỉ" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <div class="form-group">
                                    <input id="shipping_phone" name="shipping_phone" type="text" placeholder="Số điện thoại" class="form-control">
                                    <span class="form-message"></span>
                                </div>

                                <!-- <input type="text" name="shipping_email" placeholder="Email*">
                                <input type="text" name="shipping_name" placeholder="Họ và tên">
                                <input type="text" name="shipping_address" placeholder="Địa chỉ">
                                <input type="text" name="shipping_phone" placeholder="Phone*"> -->
                                <p>Ghi chú</p>
                                <textarea name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn cho nhà vận chuyển" rows="16"></textarea>
                                <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="review-payment">
            <h2>Hình thức thanh toán</h2>
        </div> -->


        <!-- <div class="payment-options">
            <span>
                <label><input name="payment_option" value="atm" type="checkbox"> Thanh toán ATM </label>
            </span>
            <span>
                <label><input name="payment_option" value="cash" type="checkbox"> Nhận tiền mặt </label>
            </span>
             <span>
                <label><input type="checkbox"> Paypal</label>
            </span> 
        </div> -->
    </div>
</section>
<!--/#cart_items-->

<!-- Scripts -->

<script src="{{asset('resources/js/validation.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mong muốn của chúng ta
        // Validator({
        //     form: '#form-1',
        //     formGroupSelector: '.form-group',
        //     errorSelector: '.form-message',
        //     rules: [

        //         Validator.isEmail('#email_account'),
        //         Validator.minLength('#password_account', 6),

        //     ],
        //     onSubmit: function(data) {
        //         // Call API
        //         console.log(data);
        //     }
        // });


        Validator({
        	form: '#form-1',
        	formGroupSelector: '.form-group',
        	errorSelector: '.form-message',
        	rules: [
        		Validator.isEmail('#shipping_email'),
        		Validator.isRequired('#shipping_name'),
        		Validator.isRequired('#shipping_address'),
        		Validator.isRequired('#shipping_phone')
        	],
        	onSubmit: function(data) {
        		// Call API
        		console.log(data);
        	}
        });
    });
</script>
@endsection