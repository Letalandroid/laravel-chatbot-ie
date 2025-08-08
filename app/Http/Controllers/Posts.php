<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestsPosts;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Service\PostsService;

class Posts extends Controller
{

    public function __construct( private PostsService $postsService ) {}

    /**
     * Display the specified resource.
     */
    public function show(): LengthAwarePaginator
    {
        return $this->postsService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsPosts $request)
    {
       return $this->postsService->create( $request->validated() );
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
