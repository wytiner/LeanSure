<?php

namespace App\Http\Controllers;

use App\Models\Claim\Address;
use App\Models\Claim\Claim;
use App\Models\Claim\Handler;
use App\Models\Claim\Insured;
use App\Models\Claim\LossAdjuster;
use App\Models\County;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claims = Claim::with(['insured', 'handler'])->get();

        return view('claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties = County::all();

        return view('claims.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insured = Insured::create([
            'name' => $request->insured_name,
            'contact' => $request->insured_contact,
        ]);

        $handler = Handler::create([
            'name' => $request->handler_name,
        ]);

        $lossAdjuster = null;
        if ($request->loss_adjuster_name) {
            $lossAdjuster = LossAdjuster::create([
                'name' => $request->loss_adjuster_name,
                'phone' => $request->loss_adjuster_phone,
                'email' => $request->loss_adjuster_email,
            ]);
        }

        $address = Address::create([
            'insured_id' => $insured->id,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'town' => $request->town,
            'county_id' => $request->county_id,
            'eircode' => $request->eircode,
        ]);

        $claim = Claim::create([
            'insured_id' => $insured->id,
            'handler_id' => $handler->id,
            'excess' => $request->excess,
            'loss_adjuster_id' => $lossAdjuster->id ?? null,
            'loss_date' => $request->loss_date,
            'incept_date' => $request->incept_date,
            'subject' => $request->subject,
            'axa_claim_id' => $request->axa_claim_id,
            'summary' => $request->summary,
            'other_info' => $request->other_info,
        ]);

        return redirect()->route('claims.show', $claim);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $claim = Claim::findOrFail($id);

        return view('claims.show', compact('claim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request)
    {
        $claim = Claim::find($request->claim_id);
        $claim->insured;
        $claim->handler;
        $claim->lossAdjuster;
        return response()->json($claim);
    }

    public function updateStatus(Request $request, Claim $claim)
    {
        $claim->claim_status = $request->input('status');
        $claim->save();
        return response()->json(['success' => true]);
    }

    public function updateInvoiceStatus(Request $request, Claim $claim)
    {
        $claim->invoice_status = $request->input('invoice_status');
        $claim->save();
        return response()->json(['success' => true]);
    }

    public function showChart()
    {
        $claimsData = Claim::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->get()
            ->pluck('count', 'month');

        return response()->json($claimsData);
    }
}
