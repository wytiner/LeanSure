@extends('layouts.main')

@section('content')
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
                                    class="mdi mdi-rotate-left">Back</i></a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('claims.create') }}" class="btn-sm btn-primary w-100"><i
                                    class="mdi mdi-plus">New</i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <!-- ID atribuído à tabela -->
                <table class="table table-striped" id="claims_table">
                    <thead>
                        <tr>
                            <th>AXA Claim ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Claim Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($claims as $claim)
                            <tr>
                                <td>{{ $claim->axa_claim_id }}</td>
                                <td>{{ $claim->insured->name }}</td>
                                <td>
                                    <label
                                        class="badge badge-gradient-{{ $claim->invoice_status == 'Paid' ? 'success' : ($claim->invoice_status == 'Issued / outstanding' ? 'warning' : 'info') }}">
                                        {{ $claim->invoice_status }}
                                    </label>
                                </td>
                                <td>
                                    <label
                                        class="badge badge-gradient-{{ $claim->claim_status == 'Complete' ? 'success' : ($claim->claim_status == 'Cancelled' ? 'danger' : 'info') }}">
                                        {{ $claim->claim_status }}
                                    </label>
                                </td>
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
@endsection


@section('scripts_after')
    <script>
        $(document).ready(function() {
            $('#claims_table').DataTable();
        });
    </script>
@endsection
