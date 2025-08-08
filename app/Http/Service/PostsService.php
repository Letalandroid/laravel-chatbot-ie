<?php

namespace App\Http\Service;

use App\Models\Posts;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsService {

    public function getAll(): LengthAwarePaginator {
        $page = Posts::latest();
        return $page->paginate(Posts::PAGINATE);
    }

}