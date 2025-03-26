<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * GET /admin/services
     */
    public function store(Request $request)
    {
    // Validate incoming data
    $validator = Validator::make($request->all(), [
        'title'        => 'required|string|max:255',
        'slug'         => 'required|unique:services,slug',
        // Add more fields as needed
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    // Create a new service
    $model = new Service();
    $model->title = $request->title;
    $model->slug = $request->slug;
    $model->short_description = $request->short_description;
    $model->content = $request->content;
    $model->status = $request->status;
    $model->save();

    return response()->json([
        'status'  => true,
        'message' => 'Service created successfully',
        'data'    => $model // Return the newly created model
    ], 201);
    }


/**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}