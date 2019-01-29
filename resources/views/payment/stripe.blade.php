@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('stripePost')}}" method="post">
                        @csrf
                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="{{ \Config::get('payment.stripe.public_key') }}"
                              data-description="Access for a year"
                              data-amount="100"
                              data-locale="auto"></script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
