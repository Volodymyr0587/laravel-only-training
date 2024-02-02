<?php
use App\Models\Post;

it('has a title attribute', function () {
    $post = new Post([
        'title' => 'Post with title',
        'body' => 'post body'
    ]);
    expect($post->title)->toBe('Post with title');
    expect($post->body)->toBe('post body');
});
