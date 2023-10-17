<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    public $post;
    public $comments;
    /**
     * Create a new component instance.
     */
    public function __construct($post, $comments)
    {
        $this->post = $post;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'blade'
<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <div class="blog-post mb-3">
                    <h2 class="blog-post-title">
                        <?php echo $post->title; ?>
</h2>
<p class="blog-post-meta">
    بقلم <?php echo $post->author; ?>
    <?php echo carbon\carbon::parse($post->created_at)->diffForHumans(); ?>
</p>
<p>
    <?php echo $post->body; ?>
</p>
<h1>Comments</h1>
<?php foreach($comments as $comment) : ?>
<h4>
    <?php echo $comment->name; ?>
</h4>
<p>
    <?php echo $comment->body; ?>
</p>
<?php endforeach ?>

</div>

blade;
    }
}
