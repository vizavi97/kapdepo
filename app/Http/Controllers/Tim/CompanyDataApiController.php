<?php

namespace App\Http\Controllers\TIm;

use App\Company;
use App\CompanyDataApi;
use Error;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyDataApiController extends Controller
{
    //

    public function create(Request $request, Response $response)
    {
        $cd = new CompanyDataApi();
        try {
            $cd->company_id = $request->companyID;
            $cd->year = $request->year;
            $cd->quarter = $request->quarter;
            $cd->unallocatedProfits = $request->unallocatedProfits;
            $cd->commitments = $request->commitments;
            $cd->longLine = $request->longLine;
            $cd->shortLine = $request->shortLine;
            $cd->proceeds = $request->proceeds;
            $cd->profit = $request->profit;
            $cd->stock = $request->stock;
            $cd->moneyResources = $request->moneyResources;
            $cd->activesOnStart = $request->activesOnStart;
            $cd->activesOnEnd = $request->activesOnEnd;
            $cd->capitalOnStart = $request->capitalOnStart;
            $cd->capitalOnEnd = $request->capitalOnEnd;
            $cd->faceValue = $request->faceValue;
            $cd->preference = $request->preference;
            $cd->dividends = $request->dividends;
            $cd->ebit = $request->ebit;
            $cd->liquidityIndicator = $request->liquidityIndicator;

            $cd->save();

            return response()->json($request);
        } catch (Error $e) {
            return response()->json($e);
        }

    }

    public function list()
    {
        $companies = CompanyDataApi::all();
        foreach ($companies as $company) {
            $company_name = Company::where("id", $company->company_id)->first();
            $company->company_name = $company_name->title;
        }
        return response()->json($companies);
    }

    public function delete(Request $request)
    {
        if (isset($request->id)) {
            CompanyDataApi::where('id', $request->id)->first()->delete();
            return response()->json($request);
        }
        return response()->status(200);
    }

    public function update(Request $request)
    {
        $cd = CompanyDataApi::where('id', $request->id)->first();
        try {
            $cd->company_id = $request->companyID;
            $cd->year = $request->year;
            $cd->quarter = $request->quarter;
            $cd->unallocatedProfits = $request->unallocatedProfits;
            $cd->commitments = $request->commitments;
            $cd->longLine = $request->longLine;
            $cd->shortLine = $request->shortLine;
            $cd->proceeds = $request->proceeds;
            $cd->profit = $request->profit;
            $cd->stock = $request->stock;
            $cd->moneyResources = $request->moneyResources;
            $cd->activesOnStart = $request->activesOnStart;
            $cd->activesOnEnd = $request->activesOnEnd;
            $cd->capitalOnStart = $request->capitalOnStart;
            $cd->capitalOnEnd = $request->capitalOnEnd;
            $cd->faceValue = $request->faceValue;
            $cd->preference = $request->preference;
            $cd->dividends = $request->dividends;
            $cd->ebit = $request->ebit;
            $cd->liquidityIndicator = $request->liquidityIndicator;
            $cd->save();

            return response()->json($request);
        } catch (Error $e) {
            return response()->json($e);
        }

    }

}
