<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();

        return new StateCollection($states);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StateRequest $request): StateResource
    {
        $state = State::create($request->validated());

        return new StateResource($state);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, State $state): StateResource
    {
        return new StateResource($state);
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
    public function update(StateUpdateRequest $request, State $state): StateResource
    {
        $state->update($request->validated());

        return new StateResource($state);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StateRequest $request, State $state): Response
    {
        $state->delete();

        // return response()->noContent();
        return response()->noContent();
    }
}