<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $employees = Employee::all();
    //     return new EmployeeCollection($employees);
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(EmployeeRequest $request)
    // {
    //     $employee = Employee::create($request->validated());
    //     return new EmployeeResource($employee);
    // }


    // /**
    //  * Display the specified resource.
    //  */
    // public function show($id)
    // {
    //     $employee = Employee::findOrFail($id);
    //     return new EmployeeResource($employee);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(EmployeeRequest $request, $id)
    // {
    //     $employee = Employee::findOrFail($id);
    //     $employee->update($request->validated());
    //     return new EmployeeResource($employee);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)
    // {
    //     $employee = Employee::findOrFail($id);
    //     $employee->delete();
    //     return response()->json(['message' => 'Employee deleted']);
    // }
    public function index()
    {
        $employees = Employee::all();
        // return response()->json($employees);
        return new EmployeeCollection($employees);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            'image' => 'required',
            'file' => 'required',
            'state_id' => 'required',
            'local_government_id' => 'required',
            'marital_status_id' => 'required',
            'address' => 'required',
        ]);

        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->address = $request->input('address');
        $employee->email = $request->input('email');
        $employee->phone_number = $request->input('phone_number');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->image = $request->input('image');
        $employee->file = $request->input('file');
        $employee->state_id = $request->input('state_id');
        $employee->local_government_id = $request->input('local_government_id');
        $employee->marital_status_id = $request->input('marital_status_id');

        $employee->save();
        return response()->json($employee);
        // return new EmployeeResource($employee);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        // return response()->json($employee);
        return new EmployeeResource($employee);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'date_of_birth' => 'required',
            // 'image' => 'required',
            // 'file' => 'required',
            'state_id' => 'required',
            'local_government_id' => 'required',
            'marital_status_id' => 'required',
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->address = $request->input('address');
        $employee->email = $request->input('email');
        $employee->phone_number = $request->input('phone_number');
        $employee->date_of_birth = $request->input('date_of_birth');
        $employee->image = $request->input('image');
        $employee->file = $request->input('file');
        $employee->state_id = $request->input('state_id');
        $employee->local_government_id = $request->input('local_government_id');
        $employee->marital_status_id = $request->input('marital_status_id');


        $employee->save();
        return response()->json($employee);
        // return new EmployeeResource($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json(['message' => 'Employee deleted']);
        // return new EmployeeResource(['message' => 'Employee deleted successfully', $employee]);
    }

}