@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-10">
                        <a href="{{ route('claims.index') }}" class="btn-sm btn-primary"><i
                                class="mdi mdi-rotate-left">Back</i></a>
                    </div>
                    <div class="col-2">
                        <h4 class="card-title">Claim Details</h4>
                    </div>
                </div>
                <p class="card-description"> AXA ID: {{ $claim->axa_claim_id }} </p>

                <!-- Invoice Status -->
                <div class="form-group row">

                    <div class="col-4">
                        <label for="claim_status">Claim Status</label>
                        <p id="claim_status"><span
                                class="badge badge-gradient-{{ $claim->claim_status == 'Complete' ? 'success' : ($claim->claim_status == 'Cancelled' ? 'danger' : 'info') }}">{{ $claim->claim_status }}</span>
                        </p>
                    </div>

                    <div class="col-4">
                        <label for="attached_files">Attached Files</label>
                        <p id="attached_files"><span
                                class="badge badge-gradient-{{ $claim->files ? 'info' : 'danger' }}">{{ $claim->files ? $claim->files->count() : 0 }}</span>
                        </p>
                    </div>

                    <div class="col-4">
                        <label for="invoice_status">Invoice Status</label>
                        <p id="invoice_status"><span
                                class="badge badge-gradient-{{ $claim->invoice_status == 'Paid' ? 'success' : ($claim->invoice_status == 'Issued / outstanding' ? 'warning' : 'info') }}">{{ $claim->invoice_status }}</span>
                        </p>
                    </div>
                </div>

                <hr>

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

                <div class="form-group row">
                    {{-- summary --}}
                    <div class="col-6">
                        <label for="summary">Summary</label>
                        <p id="summary">{{ $claim->summary }}</p>
                    </div>

                    {{-- subject --}}
                    <div class="col-6">
                        <label for="subject">Subject</label>
                        <p id="subject">{{ $claim->scopeOfWork->description }}</p>
                    </div>

                </div>

                {{-- date row  --}}
                <div class="form-group row">
                    <div class="col-6">
                        <label for="loss_date">Loss Date</label>
                        <p id="loss_date">{{ now()->parse($claim->loss_date)->format('d/m/Y') }}</p>
                    </div>

                    <div class="col-6">
                        <label for="incept_date">Incept Date</label>
                        <p id="incept_date">{{ now()->parse($claim->incept_date)->format('d/m/Y') }}</p>
                    </div>

                </div>



                <hr>
                <!-- Handler Information -->
                <div class="form-group row">
                    <div class="col-4">
                        <label for="handler_name">Handler Name</label>
                        <p id="handler_name">{{ $claim->handler->name }}</p>
                    </div>

                    <div class="col-4">
                        <label for="handler_contact">Handler Phone</label>
                        <p id="handler_contact">{{ $claim->handler->phone }}</p>
                    </div>

                    <div class="col-4">
                        <label for="handler_email">Handler Email</label>
                        <p id="handler_email">{{ $claim->handler->email }}</p>
                    </div>

                </div>

                <hr>
                {{-- excess and other info --}}
                <div class="form-group row">
                    <div class="col-2">
                        <label for="excess">Excess</label>
                        <p id="excess">£{{ $claim->excess }}</p>
                    </div>

                    <div class="col-10">
                        <label for="other_info">Other Information</label>
                        <p id="other_info">{{ $claim->other_info }}</p>
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
