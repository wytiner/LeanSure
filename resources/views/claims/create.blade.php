@extends('layouts.main')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Claim</h4>
                <p class="card-description"> Enter claim details </p>
                <form class="forms-sample" action="{{ route('claims.store') }}" method="post">
                    @csrf <!-- Token de segurança do Laravel -->
                    <!-- Insured Information -->
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="handler_name">Insured Name</label>
                            <input type="text" class="form-control" name="insured_name" id="insured_name"
                                placeholder="Name">
                        </div>

                        <div class="col-6">
                            <label for="handler_name">Insured Contact</label>
                            <input type="text" class="form-control" name="insured_contact" id="insured_contact"
                                placeholder="Contact">

                        </div>
                    </div>
                    <!-- ... -->

                    <!-- Loss and Inception Dates -->
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="loss_date">Loss Date</label>
                            <input type="date" class="form-control" name="loss_date" id="loss_date"
                                placeholder="Loss Date">
                        </div>
                        <div class="col-6">
                            <label for="incept_date">Incept Date</label>
                            <input type="date" class="form-control" name="incept_date" id="incept_date"
                                placeholder="Incept Date">
                        </div>
                    </div>
                    <!-- ... -->

                    <div class="form-group row">
                        <div class="col-7">
                            <label for="scope_id">Scope</label>
                            <select class="form-control form-control-lg" name="scope_id" id="scope_id" >
                                @foreach ($scopeOfWorks as $scope)
                                    <option value="{{ $scope->id }}"> {{ $scope->reference }} |
                                        {{ $scope->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            <!-- Claim Information -->
                            <label for="axa_claim_id">AXA Claim ID</label>
                            <input type="text" class="form-control" name="axa_claim_id" id="axa_claim_id"
                                placeholder="AXA Claim ID">
                            <!-- ... -->
                        </div>
                    </div>

                    <!-- Handler Information -->
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="handler_name">Handler Name</label>
                            <input type="text" class="form-control" name="handler_name" id="handler_name">
                        </div>
                        <div class="col-6">
                            <label for="handler_name">Excess</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gradient-primary text-white">£</span>
                                    </div>
                                    <input type="number" id="excess" name="excess" class="form-control"
                                        aria-label="Amount (to the nearest Euro)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ... -->

                    {{-- summary and other info  --}}
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <textarea class="form-control" name="summary" id="summary" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="other_info">Other Information</label>
                        <textarea class="form-control" name="other_info" id="other_info" rows="4"></textarea>
                    </div>


                    <!-- Address Information -->
                    <div class="form-group">
                        <label for="address_line1">Address Line 1</label>
                        <input type="text" class="form-control" name="address_line1" id="address_line1"
                            placeholder="Address Line 1">
                    </div>
                    <div class="form-group">
                        <label for="address_line2">Address Line 2</label>
                        <input type="text" class="form-control" name="address_line2" id="address_line2"
                            placeholder="Address Line 2">
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="town">Town</label>
                            <input type="text" class="form-control" name="town" id="town" placeholder="Town">
                        </div>
                        <div class="col-4">
                            <label for="eircode">Eircode</label>
                            <input type="text" class="form-control" name="eircode" id="eircode"
                                placeholder="Eircode">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="county_id">County</label>
                        <select class="form-control form-control-lg" name="county_id" id="county_id">
                            @foreach ($counties as $county)
                                <option value="{{ $county->id }}">{{ $county->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- ... -->
                    <hr class="form-group">
                    <div class="form-group">
                        <label for="loss_adjuster_name">Loss Adjuster Name</label>
                        <input type="text" class="form-control" name="loss_adjuster_name" id="loss_adjuster_name"
                            placeholder="Loss Adjuster Name">
                    </div>
                    <div class="form-group row">

                        <div class="col-6">
                            <label for="loss_adjuster_phone">Loss Adjuster Phone</label>
                            <input type="text" class="form-control" name="loss_adjuster_phone"
                                id="loss_adjuster_phone" placeholder="Loss Adjuster Phone">
                        </div>
                        <div class="col-6">
                            <label for="loss_adjuster_email">Loss Adjuster Email</label>
                            <input type="text" class="form-control" name="loss_adjuster_email"
                                id="loss_adjuster_email" placeholder="Loss Adjuster Email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <a href="{{ route('claims.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts_after')
    <!-- Inicialização do Select2 -->
    <script>
        $(document).ready(function() {
        });
    </script>
@endsection
