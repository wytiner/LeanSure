@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    Claims List
                                </div>
                                <div class="col-md-8">
                                    <!-- Campo de seleção Select2 para filtrar por segurado -->
                                    <select class="js-example-basic-single w-100" name="insured_filter" id="insured_filter">
                                        @foreach ($claims as $claim)
                                            <option value="{{ $claim->id }}"> {{ $claim->insured->name }} | Axa Claim ID:
                                                {{ $claim->axa_claim_id }}

                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- ID atribuído à tabela -->
                            <table class="table table-striped" id="claims_table">
                                <thead>
                                    <tr>
                                        <th>Insured Name</th>
                                        <th>Handler Name</th>
                                        <th>Subject</th>
                                        <th>AXA Claim ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($claims as $claim)
                                        <tr>
                                            <td>{{ $claim->insured->name }}</td>
                                            <td>{{ $claim->handler->name }}</td>
                                            <td>{{ $claim->subject }}</td>
                                            <td>{{ $claim->axa_claim_id }}</td>
                                            <td>
                                                <a href="{{ route('claims.show', $claim) }}"
                                                    class="btn btn-primary">View</a>
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
@endsection


@section('scripts_after')
    <!-- Inicialização do Select2 -->
    <script>
        $(document).ready(function() {
            $('#insured_filter').select2();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#insured_filter').select2().on('select2:select', function(e) {
                var claim_id = e.params.data.id;
                $.post('{{ route('claims.filter') }}', {
                    claim_id: claim_id
                }, function(data) {
                    console.log(data);
                    var tbody = $('#claims_table tbody');
                    tbody.empty();
                    var row = $('<tr>');
                    row.append('<td>' + data.insured.name + '</td>');
                    row.append('<td>' + data.handler.name + '</td>');
                    row.append('<td>' + data.subject + '</td>');
                    row.append('<td>' + data.axa_claim_id + '</td>');
                    row.append('<td><a href="{{ url('claims') }}/' + data.id +
                        '" class="btn btn-primary">View</a></td>');
                    tbody.append(row);
                });
            });
        });
    </script>
@endsection
