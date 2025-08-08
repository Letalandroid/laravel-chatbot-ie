<?php

namespace App\Http\Service;

use App\Http\Requests\RequestsPosts;
use App\Models\Posts;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsService {

    public function getAll(): LengthAwarePaginator {
        $page = Posts::latest();
        return $page->paginate(Posts::PAGINATE);
    }

    public function create(array $data): Posts {
        return Posts::create($data);
    }

}