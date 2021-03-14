<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // DB::insert('INSERT INTO posts (title, content, created_at, updated_at) VALUES (?, ?, ?, ?)', ['title 1', 'this is content 1', now(), now()]);

        // DB::update('UPDATE posts SET  created_at = ?, updated_at = ? WHERE created_at IS NULL OR updated_at IS NULL', [now(), now()]);

        // DB::delete('DELETE FROM posts WHERE id = :id', [3]);


        DB::beginTransaction();

        try {
            DB::update('UPDATE posts SET content = ?', ['this is content four']);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }

        $posts = DB::select("SELECT * FROM posts WHERE id < 3");
        return $posts;
    }
}
