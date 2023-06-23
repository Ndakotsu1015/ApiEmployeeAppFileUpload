<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalGovernmentRequest;
use App\Http\Requests\LocalGovernmentUpdateRequest;
use App\Http\Resources\LocalGovernmentCollection;
use App\Http\Resources\LocalGovernmentResource;
use App\Models\LocalGovernment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LocalGovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localgovernments = LocalGovernment::all();

        // return new LocalGovernmentCollection($localgovernments);
        return response()->json(['data' => $localgovernments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocalGovernmentRequest $request): LocalGovernmentResource
    {
        $localgovernment = LocalGovernment::create($request->validated());

        return new LocalGovernmentResource($localgovernment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $localgovernment = LocalGovernment::find($request->id);
        return response()->json($localgovernment, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocalGovernmentUpdateRequest $request, LocalGovernment $localgovernment): LocalGovernmentResource
    {
        $localgovernment->update($request->validated());

        return new LocalGovernmentResource($localgovernment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocalGovernmentRequest $request, LocalGovernment $localgovernment): Response
    {
        $localgovernment->delete();

        return response()->noContent();
    }

}