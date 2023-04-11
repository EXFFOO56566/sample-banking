@extends('admin')
@section('dashboard', 'active')
@section('title', 'Dashboard')

@section('title')
{{'Dashboard '}}
@endsection

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')



  <main class="app-content">
    <div class="app-title">
      <div>
        <h1>Admin Dashboard</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card" style="margin-bottom: 20px!important;">
          <div class="card-header">
            <i class="icon fa fa-users"></i> Users Statistics
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-3">
 <a href="{{route('admin.allUser')}}" style="text-decoration: none">
                  <div class="widget-small primary"><i class="icon fa fa-user-circle-o fa-3x"></i>
                    <div class="info">
                      <h4>Total  Users</h4>
                      <p><b>{{$totalUser}}</b></p>
                    </div>
                  </div>
</a>
              </div>

              <div class="col-md-3">
 <a href="{{route('admin.banned.user')}}" style="text-decoration: none">
                  <div class="widget-small danger"><i class="icon fa fa-user-times fa-3x"></i>
                    <div class="info">
                      <h4>Total banned Users</h4>
                      <p><b>{{$bannedUser}}</b></p>
                    </div>
                  </div>
</a>
              </div>


              <div class="col-md-3">
                   <a href="{{route('admin.email.unverified')}}" style="text-decoration: none">
                <div class="widget-small info"><i class="icon fa fa-envelope fa-3x"></i>
                    <div class="info">
                      <h4>Total Email Unverified User</h4>
                      <p><b>{{$emailUnverified}}</b></p>
                    </div>
                  </div>
                  </a>
              </div>

              <div class="col-md-3">
 <a href="{{route('admin.mobile.unverified')}}" style="text-decoration: none">
                  <div class="widget-small primary"><i class="icon fa fa-phone fa-3x"></i>
                    <div class="info">
                      <h4>Total Phone Unverified User</h4>
                      <p><b>{{$mobileUnverified}}</b></p>
                    </div>
                  </div>
</a>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card" style="margin-bottom: 20px!important;">
          <div class="card-header">
            <i class="icon fa fa-money"></i> Users Finance Statistics
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-6">
                    <a href="{{route('admin.deposits')}}" style="text-decoration: none">
                  <div class="widget-small info"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                      <h4>All Users Deposit Wallet Balance</h4>
                      <p><b>{{$totalDepAmount}} {{$gnl->cur}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-6">
                    <a href="{{route('admin.allUser')}}" style="text-decoration: none">
                  <div class="widget-small bg-success"><i class="icon fa fa-credit-card fa-3x"></i>
                    <div class="info">
                      <h4>All Users Interest Wallet Balance</h4>
                      <p><b>{{$totalUserBal}} {{$gnl->cur}}</b></p>
                    </div>
                  </div>
                 </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card" style="margin-bottom: 20px!important;">
          <div class="card-header">
            <i class="icon fa fa-credit-card-alt"></i> Deposit Statistics
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4">
 <a href="{{route('admin.deposits')}}" style="text-decoration: none">
                  <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Deposits</h4>
                      <p><b>{{$totalNumDep}} </b></p>
                    </div>
                  </div>
</a>
              </div>
              <div class="col-md-4">
 <a href="{{route('admin.deposits')}}" style="text-decoration: none">
                <div class="widget-small bg-dark"><i class="icon fa fa-globe fa-3x"></i>
                  <div class="info">
                    <h4>Total Deposits Amount</h4>
                    <p><b>{{$dep}} {{$gnl->cur}}</b></p>
                  </div>
                </div>
</a>
              </div>

              <div class="col-md-4">
 <a href="{{route('admin.deposits')}}" style="text-decoration: none">
                <div class="widget-small bg-success"><i class="icon fa fa-dollar fa-3x"></i>
                  <div class="info">
                    <h4>Total Deposits Charge</h4>
                    <p><b>{{$depCharge}} {{$gnl->cur}}</b></p>
                  </div>
                </div>
</a>
              </div>


            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <i class="icon fa fa fa-exchange"></i> Other Bank Transaction Statistics
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4">

                  <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Transaction </h4>
                      <p><b>{{$trOtBankTotal}} </b></p>
                    </div>
                  </div>

              </div>


              <div class="col-md-4">
                <a href="{{route('admin.transaction.approved')}}" style="text-decoration: none">
                  <div class="widget-small bg-success"><i class="icon fa fa-check fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Approved Transaction </h4>
                      <p><b>{{$trOtBankApprove}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-4">
                <a href="{{route('admin.transaction.rejected')}}" style="text-decoration: none">
                  <div class="widget-small bg-danger"><i class="icon fa fa-times fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Rejected Transaction </h4>
                      <p><b>{{$trOtBankReject}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

            </div>

            <br>


            <div class="row">
              <div class="col-md-4">
                <a href="{{route('admin.transaction.request')}}" style="text-decoration: none">
                  <div class="widget-small bg-info"><i class="icon fa fa-spinner fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Pending Transaction </h4>
                      <p><b>{{$trOtBankPending}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-4">
                <a href="{{route('admin.transaction.approved')}}" style="text-decoration: none">
                  <div class="widget-small bg-dark"><i class="icon fa fa-building fa-3x"></i>
                    <div class="info">
                      <h4>Total Transaction  Amount</h4>
                      <p><b>{{$trOtBankTotalAmount}} {{$gnl->cur}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-4">
                <a href="{{route('admin.transaction.approved')}}" style="text-decoration: none">
                  <div class="widget-small bg-success"><i class="icon fa fa-dollar fa-3x"></i>
                    <div class="info">
                      <h4>Total Transaction Charge</h4>
                      <p><b>{{$trOtBankTotalCharge}} {{$gnl->cur}}</b></p>
                    </div>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <i class="icon fa fa-undo"></i> Withdraw Statistics
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4">

                  <div class="widget-small primary"><i class="icon fa fa-money fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Withdraws</h4>
                      <p><b>{{$witTotal}} </b></p>
                    </div>
                  </div>

              </div>


              <div class="col-md-4">
                <a href="{{route('admin.withdraw.log')}}" style="text-decoration: none">
                  <div class="widget-small bg-success"><i class="icon fa fa-check fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Approved Withdraws</h4>
                      <p><b>{{$witApprove}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-4">
 <a href="{{route('admin.rejected.withdraw')}}" style="text-decoration: none">
                  <div class="widget-small bg-danger"><i class="icon fa fa-times fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Rejected Withdraws</h4>
                      <p><b>{{$witReject}}</b></p>
                    </div>
                  </div>
</a>
              </div>

            </div>

            <br>


            <div class="row">
              <div class="col-md-4">
                <a href="{{route('admin.withdraw.request')}}" style="text-decoration: none">
                  <div class="widget-small bg-info"><i class="icon fa fa-spinner fa-3x"></i>
                    <div class="info">
                      <h4>Total Number Of Pending Withdraws</h4>
                      <p><b>{{$witPending}}</b></p>
                    </div>
                  </div>
                </a>
              </div>

              <div class="col-md-4">
  <a href="{{route('admin.withdraw.log')}}" style="text-decoration: none">
                  <div class="widget-small bg-dark"><i class="icon fa fa-building fa-3x"></i>
                    <div class="info">
                      <h4>Total Withdraw Amount</h4>
                      <p><b>{{$witTotalAmount}} {{$gnl->cur}}</b></p>
                    </div>
                  </div>
</a>
              </div>

              <div class="col-md-4">
 <a href="{{route('admin.withdraw.log')}}" style="text-decoration: none">
                  <div class="widget-small bg-success"><i class="icon fa fa-dollar fa-3x"></i>
                    <div class="info">
                      <h4>Total Withdraw Charge</h4>
                      <p><b>{{$witTotalCharge}} {{$gnl->cur}}</b></p>
                    </div>
                  </div>
</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>






  </main>
@endsection
@section('script')

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    


@stop
