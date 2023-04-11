
@extends('user')
@section('style')

	<style>
		.credit-card-box .form-control.error {
			border-color: red;
			outline: 0;
			box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
		}
		.credit-card-box label.error {
			font-weight: bold;
			color: red;
			padding: 2px 8px;
			margin-top: 2px;
		}
	</style>
	@stop

@section('title')
	@lang('Stripe Payment')
@stop

@section('content')
	@include('user.breadcrumb')






	<section id="paymentMethod">
		<div class="container">

			<div class="row">
				<div class="col-md-6 mx-auto">
					<div class="card-wrapper"></div>
					<hr>
				</div>
			</div>

			<div class="row calculate justify-content-center">
				<div class="col-md-10 col-lg-10">
					<div class="box card card-body">


						<form class="contact-form" role="form" id="payment-form" method="POST" action="{{ route('ipn.stripe')}}" >
							@csrf
							<input type="hidden" value="{{ $track }}" name="track">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="name">@lang('CARD NAME')</label>
										<div class="input-group-append">
											<input type="text" class="form-control input-lg"
												   name="name"
												   placeholder="Card Name"
												   autocomplete="off" autofocus
											/>
											<span class="input-group-text"><i class="fa fa-font"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="cardNumber">@lang('CARD NUMBER')</label>
										<div class="input-group-append">
											<input
													type="tel" class="form-control input-lg"
													name="cardNumber"
													placeholder="Valid Card Number"
													autocomplete="off"
													required autofocus
											/>
											<span class="input-group-text"><i class="fa fa-credit-card"></i></span>
										</div>
									</div>
								</div>
							</div>
							<br>

							<div class="row">
								<div class="col-xs-7 col-md-7">
									<div class="form-group">
										<label for="cardExpiry">@lang('EXPIRATION DATE')</label>
										<input
												type="tel"
												class="form-control input-lg"
												name="cardExpiry"
												placeholder="MM / YYYY"
												autocomplete="off"
												required
										/>
									</div>
								</div>
								<div class="col-xs-5 col-md-5 float-right">
									<div class="form-group">
										<label for="cardCVC">@lang('CVC CODE')</label>
										<input
												type="tel"
												class="form-control input-lg"
												name="cardCVC"
												placeholder="CVC"
												autocomplete="off"
												required
										/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button class="submit-btn btn btn-block viweBtn" style="width:100%;" type="submit"> @lang('PAY NOW') </button>
								</div>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
	</section>




@endsection

@section('script')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/card/2.4.0/card.min.js"></script>
<script>
	(function ($) {
		$(document).ready(function () {
			var card = new Card({
				form: '#payment-form',
				container: '.card-wrapper',
				formSelectors: {
					numberInput: 'input[name="cardNumber"]',
					expiryInput: 'input[name="cardExpiry"]',
					cvcInput: 'input[name="cardCVC"]',
					nameInput: 'input[name="name"]'
				}
			});
		});
	})(jQuery);
</script>
@endsection


