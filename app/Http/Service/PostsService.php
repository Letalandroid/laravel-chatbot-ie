<?php

namespace App\Http\Service;

use App\Models\Posts;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsService {

    public function getAll(): LengthAwarePaginator {
        $page = Posts::orderBy('id');
        return $page->paginate(Posts::PAGINATE);
    }

    public function create(array $data): Posts {
        return Posts::create($data);
    }

    public function update(array $data, int $id): bool {
        return Posts::where('id', $id)->update($data);
    }

}