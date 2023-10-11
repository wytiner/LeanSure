@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="row">
                <div class="col-md-7 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                                <div id="visit-sale-chart-legend"
                                    class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                            </div>
                            <canvas id="visit-sale-chart" class="mt-4"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Traffic Sources</h4>
                            <canvas id="traffic-chart"></canvas>
                            <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Claims</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Insured Name </th>
                                            <th> Subject </th>
                                            <th> Invoice Status </th>
                                            <th> Claim Status </th>
                                            <th> AXA Claim ID </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($claims as $claim)
                                            <tr>
                                                <td> {{ $claim->insured->name }} </td>
                                                <td> {{ $claim->subject }} </td>
                                                <td>
                                                    <label class="badge badge-gradient-{{ $claim->invoice_status == 'Paid' ? 'success' : ($claim->invoice_status == 'Issued / outstanding' ? 'warning' : 'info') }}">
                                                        {{ $claim->invoice_status }}
                                                    </label>
                                                </td>
                                                <td>
                                                    <label class="badge badge-gradient-{{ $claim->claim_status == 'Complete' ? 'success' : ($claim->claim_status == 'Cancelled' ? 'danger' : 'info') }}">
                                                        {{ $claim->claim_status }}
                                                    </label>
                                                </td>
                                                <td> {{ $claim->axa_claim_id }} </td>
                                                <td>
                                                    <a href="{{ route('claims.show', $claim) }}" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts_after')
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
@endsection
