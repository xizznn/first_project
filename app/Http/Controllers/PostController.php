<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact("posts"));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        // $post = Post::withTrashed()->find(1);
        // $post->restore();
        $post = Post::find(1);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
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
        $post = Post::firstOrCreate(
            [
                'title' => 'some title 123',
            ],
            [
                'title' => 'some title 123',
                'content' => 'some some interesting content',
                'image' => 'someimage.jpg',
                'likes' => 50000,
                'is_published' => 1,
            ]
        );
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'updateorcreate of post',
            'content' => 'updateorcreate interesting content',
            'image' => 'updateorcreate.jpg',
            'likes' => 5200,
            'is_published' => 1,
        ];
        $post = Post::updateOrCreate(
            [
                'title' => 'some post',
            ],
            [
                'title' => 'some post',
                'content' => 'lol interesting content',
                'image' => 'updateorcreate.jpg',
                'likes' => 5200,
                'is_published' => 1,
            ]
        );
        dd('finished');
    }
};
