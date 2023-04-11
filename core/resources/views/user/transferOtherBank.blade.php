@extends('user')

@section('title')
    @lang('Transfer')
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/user/css/select2.min.css')}}">

@endsection
@section('content')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    @include('user.breadcrumb')

    <section id="paymentMethod">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <div class="heading-title padding-bottom-70">
                        <h2>
                            @lang('Transfer to Other bank')
                        </h2>
                        <div class="sectionSeparator"></div>

                    </div>
                </div>
            </div>

            <div class="row calculate justify-content-center">
                <div class="col-md-10 col-lg-10">
                    <div class="box">

                        <form method="post" action="{{route('user.transfer.otherBank')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 text-center" id="message">

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>@lang('Amount')</label>
                                            <input type="text"  name="amount" class="myForn" placeholder="@lang('amount') {{$gnl->cur}}" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>@lang('Choose Bank To Send Amount')</label>
                                            <select name="bank_name" class="form-control js-example-basic-single"  id="bank" required>
                                                <option value="" selected="selected">@lang('Select Bank')</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{$bank->id}}">{{__($bank->name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>@lang('Branch Name')</label>
                                            <input type="text"  name="branch_name" class="myForn" placeholder="@lang('branch name')" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>@lang('Account Number')</label>
                                            <input type="text"  name="account_number" class="myForn" placeholder="@lang('account number')" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1">Details</label>
                                            <textarea class="form-control" name="details"  id="exampleFormControlTextarea1" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-row">

                                                <div class="form-group col-md-12">
                                                    <button class="btn" type="submit">@lang('Transfer Balance')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <script src="{{asset('assets/user/js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $(document).on('change','#bank',function () {
                $.ajax({
                   url:'{{route('user.bank.data')}}',
                   data:{
                       id:$(this).val()
                   },
                   success:function (res) {
                       var fixed_charge = res.fixed_charge;
                       var percent_charge = res.percent_charge;
                       var p_time = res.p_time;
                       var min_amount = res.min_amount;
                       var max_amount = res.max_amount;
                       $('#message').html('<div role="alert" class="alert alert-danger margin-bottom-30" ><strong> Transfer limit Amount '+min_amount+' {{$gnl->cur}} - '+max_amount+'  {{$gnl->cur}} .   Balance Transfer Charge '+fixed_charge+' {{$gnl->cur}} Fixed and  '+percent_charge+'% of your total amount to transfer balance. Processing time '+p_time+'.</strong></div>')
                   }
                });
            })
        });
    </script>
@stop