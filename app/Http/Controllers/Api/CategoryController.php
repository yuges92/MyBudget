<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\updateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {

        $category = Category::create($request->validated());

        return response()->json($category, 201);
    }

    /**
     * Returns the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function show(Category $category): JsonResponse
    {
        return response()->json($category);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param updateCategoryRequest $request
     * @param Category $category
     * @return JsonResponse
     */
    public function update(updateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->validated());

        return response()->json($category, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->forceDelete();
        } catch (Exception $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        return response()->json(204);
    }
}
