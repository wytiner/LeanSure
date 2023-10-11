@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-10">
                        <h4 class="card-title">Claim Details</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('claims.index') }}" class="btn-sm btn-primary"><i
                                class="mdi mdi-rotate-left">Back</i></a>
                    </div>
                </div>
                <p class="card-description"> AXA ID: {{ $claim->axa_claim_id }} </p>

                <!-- Insured Information -->
                <div class="form-group row">
                    <div class="col-6">
                        <label for="insured_name">Insured Name</label>
                        <p id="insured_name">{{ $claim->insured->name }}</p>
                    </div>

                    <div class="col-6">
                        <label for="insured_contact">Insured Contact</label>
                        <p id="insured_contact">{{ $claim->insured->contact }}</p>
                    </div>
                </div>

                <!-- Handler Information -->
                <div class="form-group row">
                    <div class="col-6">
                        <label for="handler_name">Handler Name</label>
                        <p id="handler_name">{{ $claim->handler->name }}</p>
                    </div>
                </div>

                <!-- ... e assim por diante para outras informações ... -->

            </div>
        </div>
    </div>
@endsection
