<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): Collection
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request): Product
    {
        return Product::create($request->validated());
    }
}
