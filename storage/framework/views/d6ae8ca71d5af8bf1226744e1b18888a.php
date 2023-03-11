<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>HappyEars</title>
</head>
<body>
    <?php if(Auth::check()): ?>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand position-absolute top-0 start-50 translate-middle-x" href="<?php echo e(url('/')); ?>"><img src="img\agrabic_cute_cartoon_happy_bunny_icon_for_website_4K_dfb0a085-8a01-4c43-99a3-344b48502463-removebg-preview.png" alt="HappyEars" width="60" height="60"></a>  
            </div>
        </nav>
    </header>
    <main>
        <div class="stage main position-absolute top-50 start-50 translate-middle">
            <?php if(session()->has('message')): ?>
            <div class="fs-3 position-absolute top-0 start-50 translate-middle-x alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>
            <?php endif; ?>
            <img src="<?php echo e(Auth::user()->profile_image); ?>" style="width: 7vw; padding-top: 2%">
            <p class="fs-2"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></p>
            <div class="fs-4 text-start ps-5 mt-5">
                <h2 class="fs-2 text-decoration-underline mb-4">About me</h2>
                <p>Username: <?php echo e(Auth::user()->username); ?></p>
                <p>E-mail: <?php echo e(Auth::user()->email); ?></p>
                <p>Created at: <?php echo e(date('F d, Y', strtotime(Auth::user()->created_at))); ?></p>
            </div>
            <div class="mystories fs-4 mt-5 position-absolute top-50 start-50 translate-middle overflow-y-auto">
                <h2 class="fs-2 text-decoration-underline mb-4">My stories</h2>
                <h2 class="fs-4 text-decoration-underline mb-4">Text stories</h2>
                <?php $__currentLoopData = $text_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a style="text-decoration: none; color: black;" href="<?php echo e(route('text_books.show', ['story' => $story->id])); ?>">
                        <p><?php echo e($story->title); ?>

                        <form action="<?php echo e(route('delete', ['id' => $story->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-outline-warning" style="transform: translateY(-40%);" type="submit">Delete</button>
                        </form></p></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <h2 class="fs-4 text-decoration-underline mb-4">Audio stories</h2>
                <?php $__currentLoopData = $audio_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a style="text-decoration: none; color: black;" href="<?php echo e(route('audio_books.show', ['story' => $story->id])); ?>">
                    <p><?php echo e($story->title); ?>

                    <form action="<?php echo e(route('delete', ['id' => $story->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-outline-warning" style="transform: translateY(-40%);" type="submit">Delete</button>
                    </form></p></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <img class="position-absolute top-50 end-0 translate-middle-y" width="35%" src="img\agrabic_minimalist_cartoon_happy_bunny_with_headphones_5cd72aa6-95fd-48cd-b241-38fe9a975bd9-removebg-preview.png">
            <a class="nav-item mt-1 me-5 mb-3 btn position-absolute bottom-0 start-50 translate-middle-x" href="<?php echo e(route('logout')); ?>">Logout</a>
        </div>
    </main>
    <?php else: ?>
    <div>First login!</div>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\Users\Korisnik\OneDrive\Dokumenti\projekti\HappyEars (Laravel)\resources\views/profile.blade.php ENDPATH**/ ?>