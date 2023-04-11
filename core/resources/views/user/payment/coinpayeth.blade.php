

@extends('user')
@section('title')
	@lang('Deposit Preview')
@stop
@section('breadcrumb-title')
	@lang('Deposit Preview')
@stop
@section('content')
	@include('user.breadcrumb')


	<section class="atop">
		<div class="container">

			<div class="container-fluid">

			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="card">
						<div class="card-body text-center">
							<h6> @lang('PLEASE SEND EXACTLY') <span style="color: green"> {{ $bcoin }}</span> @lang('ETH')</h6>
							<h5>@lang('TO') <span style="color: green"> {{ $wallet}}</span></h5>
							<img src="{{$qrurl}}" title='' style='width:300px;' />
							<h4 style="font-weight:bold;">@lang('SCAN TO SEND')</h4>
						</div>

					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

@endsection