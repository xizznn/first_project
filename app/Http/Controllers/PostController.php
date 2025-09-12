<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dd('end');
    }

    public function create() {
        $postsArr = [
            [
                'title' => 'title of post',
                'content' => 'some interesting content',
                'image' => 'imagepj.jpg',
                'likes' => 20,
                'is_published' => 1,
            ],

            [
                'title' => 'another title of post',
                'content' => 'another some interesting content',
                'image' => 'another_imagepj.jpg',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }

    public function update() {
        $post = Post::find(5);
        $post->update([
                'title' => 'new update',
                'content' => 'new update',
        ]);
        dd('updated');
    }
};
