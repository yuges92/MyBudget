<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DebtStoreRequest;
use App\Http\Requests\DebtUpdateRequest;
use App\Models\Debt;
use Illuminate\Http\JsonResponse;

class DebtsController extends Controller
{

    public function index()
    {
        return response()->json(Debt::all());
    }


    public function store(DebtStoreRequest $request)
    {
        $debt= Debt::create($request->validated());

        return response()->json($debt, 201);

    }


    public function show(Debt $debt)
    {

        return response()->json($debt);
    }


    public function update(DebtUpdateRequest $request, Debt $debt)
    {
        $debt->update($request->validated());
        return response()->json($debt, 201);
    }


    public function destroy(Debt $debt): JsonResponse
    {
        try {
            $debt->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        return response()->json(204);
    }
}
