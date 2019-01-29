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

                    
					<form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{ route('paypalPost') }}">
					  	@csrf
					  	<h2 class="w3-text-blue">Payment Form Paypal</h2>
					  	<p>      
					  		<label class="w3-text-blue"><b>Enter Amount</b></label>
					  		<input class="w3-input w3-border" name="amount" type="text">
					  	</p>      
					  		<button class="w3-btn w3-blue" type="submit">Pay with PayPal</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
