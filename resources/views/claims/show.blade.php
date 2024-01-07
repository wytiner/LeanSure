@extends('layouts.main')

@section('title') Claim {{ $claim->handler->name }}
@endsection

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
                <div class="container">
                    <!-- Navegação do Wizard -->
                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                    aria-controls="details" aria-selected="true">Details</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="peril-tab" data-toggle="tab" href="#peril" role="tab">Peril</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="measurements-tab" data-toggle="tab" href="#measurements"
                                    role="tab">Measurements</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="invoice-tab" data-toggle="tab" href="#invoice"
                                    role="tab">Invoice</a>
                            </li>
                        </ul>

                        <!-- Conteúdo do Wizard -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details">
                                <div class="col-12 form-group row mt-4">
                                    <div class="col-4 row">
                                        <div class="col-12">
                                            <label for="handler_name">Handler Name</label>
                                            <p id="handler_name">{{ $claim->handler->name }}</p>
                                        </div>

                                        <div class="col-12">
                                            <label for="handler_contact">Handler Phone</label>
                                            <p id="handler_contact">{{ $claim->handler->phone }}</p>
                                        </div>

                                        <div class="col-12">
                                            <label for="handler_email">Handler Email</label>
                                            <p id="handler_email">{{ $claim->handler->email }}</p>
                                        </div>

                                        <div class="col-12">
                                            <label for="claim_status">Claim Status</label>
                                            <p id="claim_status"><span
                                                    class="badge badge-gradient-{{ $claim->claim_status == 'Complete' ? 'success' : ($claim->claim_status == 'Cancelled' ? 'danger' : 'info') }}">{{ $claim->claim_status }}</span>
                                            </p>
                                        </div>

                                    </div>
                                    <div class="col-8 row">
                                        <div class="col-12">
                                            <label for="address">Address</label>
                                            <p id="address">{{ $claim->insured->addresses->first()->address_line1 }}</p>
                                        </div>
                                        <div class="col-12">
                                            <label for="summary">Summary</label>
                                            <p id="summary">{{ $claim->summary }}</p>
                                        </div>
                                        <div class="col-12">
                                            <label for="subject">Reference: {{ $claim->scopeOfWork->reference }}</label>
                                            <p id="subject">Subject: {{ $claim->scopeOfWork->description }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <hr>
                                        {{-- loss adjuster section  --}}
                                        <div class="col-12 mb-5">
                                            <label for="loss_adjuster">Loss Adjuster</label>
                                        </div>
                                        <div class="col-4">
                                            <label for="loss_date">Loss Date</label>
                                            <p id="loss_date">{{ now()->parse($claim->loss_date)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label for="incept_date">Incept Date</label>
                                            <p id="incept_date">{{ now()->parse($claim->incept_date)->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="col-4">
                                            <label for="excess">Excess</label>
                                            <p id="excess">£{{ $claim->excess }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">Name</label>
                                            <p id="">{{ $claim->lossAdjuster->name }}</p>
                                        </div>

                                        <div class="col-4">
                                            <label for="">Phone</label>
                                            <p id="">{{ $claim->lossAdjuster->phone }}</p>

                                        </div>

                                        <div class="col-4">
                                            <label for="">Email</label>
                                            <p id="">{{ $claim->lossAdjuster->email }}</p>

                                        </div>

                                        <div class="col-12">
                                            {{-- initial contact form  --}}
                                            <hr>
                                            <label for="other_info">Other Information</label>
                                            <textarea class="form-control" name="other_info" id="other_info" rows="4"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="peril" role="tabpanel" aria-labelledby="peril">
                                <!-- Conteúdo da Tab 2 -->
                                <div class="col-12 form-group row">
                                    <div class="col-12">
                                        <label for="subject">Subject</label>
                                        <p id="subject">{{ $claim->scopeOfWork->description }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <hr>
                                    <div class="col-12">
                                        <label for="">Peril</label>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Name</label>
                                                <p id="">{{ $claim->scopeOfWork->reference }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Description</label>
                                                <p id="">{{ $claim->scopeOfWork->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="measurements" role="tabpanel"
                                aria-labelledby="measurements">
                                <!-- Conteúdo da Tab 3 -->
                                <div class="col-12 form-group row">
                                    <div class="col-12">
                                        <label for="subject">Subject</label>
                                        <p id="subject">{{ $claim->scopeOfWork->description }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <hr>
                                    <div class="col-12">
                                        <label for="">Peril</label>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Name</label>
                                                <p id="">{{ $claim->scopeOfWork->reference }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Description</label>
                                                <p id="">{{ $claim->scopeOfWork->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="invoice" role="tabpanel" aria-labelledby="invoice">
                                <!-- Conteúdo da Tab 4 -->
                                <div class="row">
                                    <div class="col-12 row">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="invoice_status">Invoice Status</label>
                                                <p id="invoice_status"><span
                                                        class="badge badge-gradient-{{ $claim->invoice_status == 'Paid' ? 'success' : ($claim->invoice_status == 'Issued / outstanding' ? 'warning' : 'info') }}">{{ $claim->invoice_status }}</span>
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <label for="">Amount</label>
                                                <p id="">£{{ $claim->invoice_amount ?? 500 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="">Notes</label>
                                        <p id="">{{ $claim->invoice_notes }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('click', function(e) {
                e.preventDefault();
                var tab_target = $(this).attr('href');
                $('.nav-tabs a[href="' + tab_target + '"]').tab('show');
            });
        });
    </script>
@endsection
