<?php view ('_partials.head', ['title' => 'Home']); ?>

<h2>Posts</h2>
<p>We currently have <?= count($posts) ?> post<?= count($posts) == 1 ? '' : 's' ?>.</p>

<div style="margin-top: 4rem;">
    <?php foreach($posts as  $post): ?>
        <div style="margin: 4rem 0;">
            <h3><?= $post['title'] ?></h3>
            <p><?= $post['content'] ?></p>
            <p>Posted By: <em class="author"><?= $post['author_name'] ?? 'Anonymous' ?></em></p>
        </div>
    <?php endforeach; ?>
</div>

<hr>

<?php if (isSignedIn()): ?>
    <h2>Create New Post</h2>
    <form action="/posts" method="POST">

        <div style="margin-bottom: .5rem;">
            <label style="display: block" for="title">Title</label>
            <input id="title" name="title" type="text" placeholder="Give your post a catchy title." style="min-width: 33.33%;">
        </div>

        <div style="margin-bottom: .5rem;">
            <label style="display: block" for="content">Content</label>
            <textarea id="content" name="content" rows="10" style="min-width: 33.33%;" placeholder="Write your masterpiece here..."></textarea>
        </div>

        <div style="margin-bottom: .5rem;">
            <button type="submit">Publish</button>
        </div> 
    </form>
<?php else: ?>
    <p>Please <a href="/login">login</a> to create a new post</p>
<?php endif; ?>

<?php view('_partials.footer'); ?>
