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
            <div class="stories position-absolute top-0 end-0 ps-5 border-start">
                <a href="<?php echo e(route('profile-page')); ?>" style="margin-left: 85%;"><img class="profile-image" src="<?php echo e(Auth::user()->profile_image); ?>"></a>
                <form class="position-absolute top-50 start-50 translate-middle" style="display:flex; flex-direction:column; align-items: center;" method="POST" action="<?php echo e(route('audio_books.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="fs-1 ps-3" for="prompt">Enter story characters:</label>
                        <textarea class="form-control" id="prompt" name="prompt" rows="2" maxlength="50" style="resize: none;" placeholder="e.g. dog and bunny" value="Story of" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-warning">Generate Story</button>
                </form>
            </div>
            <div class="stories-main position-absolute top-0 start-0 ps-5 overflow-y-auto">
                <?php $__currentLoopData = $audio_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="stories-story pt-3 border-bottom">
                    <h2><?php echo e($story->title); ?> <p class="fs-5">created by: <?php echo e($story->created_by); ?></p></h2>
                    <a class="position-absolute end-0 mt-5 me-5 translate-middle-y" href="<?php echo e(route('audio_books.show', ['story' => $story->id])); ?>"><img src="img\icons8-play-button-circled-50.png"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="navigation position-absolute bottom-0 start-50 translate-middle-x">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo e(route('audiobooks-page')); ?>">Listen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('textbooks-page')); ?>">Read</a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php else: ?>
    <div>First login!</div>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\Users\Korisnik\OneDrive\Dokumenti\projekti\HappyEars (Laravel)\resources\views/audio_books/index.blade.php ENDPATH**/ ?>