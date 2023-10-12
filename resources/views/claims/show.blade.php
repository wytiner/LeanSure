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

                <!-- Invoice Status -->
                <div class="form-group row">
                    <div class="col-6">
                        <label for="invoice_status">Invoice Status</label>
                        <p id="invoice_status"><span
                                class="badge badge-gradient-{{ $claim->invoice_status == 'Paid' ? 'success' : ($claim->invoice_status == 'Issued / outstanding' ? 'warning' : 'info') }}">{{ $claim->invoice_status }}</span>
                        </p>
                    </div>
                </div>

                <!-- Claim Status -->
                <div class="form-group row">
                    <div class="col-6">
                        <label for="claim_status">Claim Status</label>
                        <p id="claim_status"><span
                                class="badge badge-gradient-{{ $claim->claim_status == 'Complete' ? 'success' : ($claim->claim_status == 'Cancelled' ? 'danger' : 'info') }}">{{ $claim->claim_status }}</span>
                        </p>
                    </div>
                    <div class="col-6">

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts_after')
    <script type="text/javascript">
        $('#claim_status').on('click', function() {
            Swal.fire({
                title: 'Update Status',
                input: 'select',
                inputOptions: {
                    'Pending': 'Pending',
                    'Booked': 'Booked',
                    'Call-Out Done': 'Call-Out Done',
                    'Complete': 'Complete',
                    'Cancelled': 'Cancelled'
                },
                inputPlaceholder: 'Select a status',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value !== '') {
                            resolve();
                        } else {
                            resolve('You need to select a status');
                        }
                    });
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.post('{{ route('claims.updateStatus', $claim) }}', {
                        status: result.value,
                        _token: '{{ csrf_token() }}'
                    }, function(response) {
                        location.reload();
                    });
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('#invoice_status').on('click', function() {
            Swal.fire({
                title: 'Update Invoice Status',
                input: 'select',
                inputOptions: {
                    'Not issued': 'Not issued',
                    'Issued': 'Issued',
                    'Paid': 'Paid'
                },
                inputPlaceholder: 'Select a status',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value !== '') {
                            resolve();
                        } else {
                            resolve('You need to select a status');
                        }
                    });
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.post('{{ route('claims.updateInvoiceStatus', $claim) }}', {
                        invoice_status: result.value,
                        _token: '{{ csrf_token() }}'
                    }, function(response) {
                        location.reload();
                    });
                }
            });
        });
    </script>
@endsection
