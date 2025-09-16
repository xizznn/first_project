<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts', compact('posts'));
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

    public function delete() {
        // $post = Post::withTrashed()->find(1);
        // $post->restore();
        $post = Post::find(1);
        $post->delete();
        dd('deleted');
    }

    public function firstOrCreate()
    {

        $anotherPost = [
                'title' => 'some title of post',
                'content' => 'some some interesting content',
                'image' => 'someimage.jpg',
                'likes' => 50000,
                'is_published' => 1,
        ];
        $post = Post::firstOrCreate([
                'title' => 'some title 123',
                ],
        [
                'title' => 'some title 123',
                'content' => 'some some interesting content',
                'image' => 'someimage.jpg',
                'likes' => 50000,
                'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate(){
        $anotherPost = [
                'title' => 'updateorcreate of post',
                'content' => 'updateorcreate interesting content',
                'image' => 'updateorcreate.jpg',
                'likes' => 5200,
                'is_published' => 1,
        ];
        $post = Post::updateOrCreate([
                'title' => 'some post',
        ],
        [
                'title' => 'some post',
                'content' => 'lol interesting content',
                'image' => 'updateorcreate.jpg',
                'likes' => 5200,
                'is_published' => 1,
        ]);
        dd('finished');
    }

};
