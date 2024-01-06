@extends('layouts.main')


@section('content')
    <style>
        .clickable-row:hover {
            cursor: pointer;
        }
    </style>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h1>Claims</h1>
                    </div>
                    <div class="col-4 row d-flex justify-content-end">
                        {{-- new claim buttom  --}}
                        <div class="col-6">
                            <a href="{{ route('home') }}" class="btn-sm btn-primary w-100"><i
                                    class="mdi mdi-rotate-left">Back</i></a>f
                        </div>
                        <div class="col-6">
                            <a href="{{ route('claims.create') }}" class="btn-sm btn-primary w-100"><i
                                    class="mdi mdi-plus">New
                                </i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body col-12">
                <!-- ID atribuído à tabela -->
                <table class="table table-striped" id="claims_table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-left">AXA Claim ID</th>
                            <th>Name</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Status/Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($claims as $claim)
                            <tr class="clickable-row" data-href="{{ route('claims.show', $claim) }}">
                                <td>{{ $claim->id }}</td>
                                <td class="text-left">{{ $claim->axa_claim_id }}</td>
                                <td>{{ $claim->insured->name }}</td>
                                <td class="text-center">{{ $claim->insured->contact }}</td>
                                <td class="text-center">{{ $claim->scopeOfWork->reference }}</td>
                                <td class="text-center">
                                    <label
                                        class="badge badge-gradient-{{ $claim->claim_status == 'Complete' ? 'success' : ($claim->claim_status == 'Cancelled' ? 'danger' : 'info') }}">
                                        {{ $claim->claim_status }}
                                    </label>
                                    <label
                                        class="badge badge-gradient-{{ $claim->invoice_status == 'Paid' ? 'success' : ($claim->invoice_status == 'Issued / outstanding' ? 'warning' : 'info') }}">
                                        {{ $claim->invoice_status }}
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection


@section('scripts_after')
    <script>
        $(document).ready(function() {
            $('#claims_table').DataTable({
                "pageLength": 25,
                "lengthMenu": [10, 25, 50, 75, 100],
                "lengthChange": false,
                "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }],
                "order": [
                    [0, "desc"]
                ]

            });

            $('.clickable-row').click(function() {
                window.location = $(this).data('href');
            });
        });
    </script>
@endsection
