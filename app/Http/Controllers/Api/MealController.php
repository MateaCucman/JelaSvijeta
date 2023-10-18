<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;
use App\Http\Requests\MealRequest;
use App\Filters\MealFilter;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreMealRequest $request)
    {
        $filter = new MealFilter;
        $filter = $filter->filter($request);
        $meals = $filter->paginate($request->per_page);
        return new MealCollection($meals->appends($request->query()));
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
    public function store(StoreMealRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        return new MealResource($meal);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMealRequest $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
