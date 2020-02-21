<?php
namespace App\Services;

use App\Mail\PostCreate;
use App\Mail\PostUpdate;
use App\Post;
use \Cache;
use \Mail;

class PostService
{

    public function make($data,$user)
    {

//        $data['author_id'] = \Auth::user()->id;
        $data['author_id'] = $user->id;
        $post = Post::create($data);

        Cache::forever('post.' . $post->id, $post);

        Mail::to('th.ucsy@gmail.com')->send(
            new PostCreate($post)
        );

        return $post;
    }

    public function update($data, $post)
    {
        $post->update($data);

        Cache::forever('post.' . $post->id, $post);

        \Mail::to('th.ucsy@gmail.com')->send(
            new PostUpdate($post)
        );

        return $post;
    }

}
