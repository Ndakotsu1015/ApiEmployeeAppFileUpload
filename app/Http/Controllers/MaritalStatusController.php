<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaritalStatusRequest;
use App\Http\Resources\MaritalStatusCollection;
use App\Http\Resources\MaritalStatusResource;
use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaritalStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maritals = MaritalStatus::all();

        return new MaritalStatusCollection($maritals);
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
    public function store(MaritalStatusRequest $request): MaritalStatusResource
    {
        $marital = MaritalStatus::create($request->validated());

        return new MaritalStatusResource($marital);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $maritals = MaritalStatus::find($request->id);
        return response()->json($maritals, 200);
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
    public function update(MaritalStatusRequest $request, MaritalStatus $marital): MaritalStatusResource
    {
        $marital->update($request->validated());

        return new MaritalStatusResource($marital);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaritalStatusRequest $request, MaritalStatus $marital): Response
    {
        $marital->delete();

        return response()->noContent();
    }
}