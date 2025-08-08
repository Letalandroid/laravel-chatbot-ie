<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts as PostModel;
use Illuminate\Pagination\LengthAwarePaginator;

class Posts extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(): LengthAwarePaginator
    {
        $page = PostModel::latest();
        return $page->paginate(PostModel::PAGINATE);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
