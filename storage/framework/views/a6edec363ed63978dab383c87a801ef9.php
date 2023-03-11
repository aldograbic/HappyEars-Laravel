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
            <div class="hello position-absolute top-0 start-50 translate-middle-x mt-5">
                <h1><span style="font-size: x-large;">Hello</span> <br> <span style="color: #FED24D;"><?php echo e(Auth::user()->first_name); ?></span></h1>
                <a href="<?php echo e(route('profile-page')); ?>"><img src="<?php echo e(Auth::user()->profile_image); ?>" style="width: 7vw;"></a>
            </div>
            <div class="whatilike position-absolute top-0 end-0 border-start mt-5">
                <h2 class="text-decoration-underline">What you love</h2>
            </div>
            <div class="whatsnew position-absolute top-0 start-0 border-end mt-5">
                <h2 class="text-decoration-underline">What's new</h2>
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
    <div class="container">
        <?php if(session()->has('message')): ?>
        <div class="alert alert-success position-absolute top-0 start-50 translate-middle mt-4" style="width: 50vw">
        <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>
        <div class="stage position-absolute top-50 start-50 translate-middle" id="stage1">
            <img src="img\agrabic_minimalist_cartoon_happy_bunny_with_headphones_5cd72aa6-95fd-48cd-b241-38fe9a975bd9-removebg-preview.png" width="300px" style="top: 30px; left: 70%; position: absolute">
            <h1>Hello!</h1>
            <p>My name is <span style="color: #FED24D">EARBERT</span>!</p>
            <button class="btn" id="next-stage">Next</button>
        </div>
        <div class="stage position-absolute top-50 start-50 translate-middle" id="stage2" style="display: none;">
            <img src="img\rabbit-or-hare-footprint-trail-bunny-foot-prints-on-snow-rabbit-paw-steps-hare-steps-track-vector-illustration-isolated-on-white-background-in-2J5NNJK-removebg-preview.png" width="500px" style="bottom: 55%; left: 30%; position: absolute;">
            <p>I will <span style="color: #FED24D">jump</span> with you through this!</p>
			<button class="btn" id="prev-stage">Previous</button>
            <button class="btn" id="next-stage2">Next</button>
        </div>
        <div class="stage position-absolute top-50 start-50 translate-middle" id="stage3" style="display: none;">
            <img src="img\agrabic_minimalist_cartoon_happy_bunny_with_headphones_b087ebac-2d49-4aff-9349-4d1b1be247f9-removebg-preview.png" width="300px" style="top: 30px; left: 70%; position: absolute">
            <p>Do you have an <span style="color: #FED24D">account</span>?</p>
            <a href="<?php echo e(route('registration-page')); ?>" class="btn">NO</button>
            <a href="<?php echo e(route('login-page')); ?>" class="btn">YES</button>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#stage1').show();

			$('#next-stage').click(function() {
				$('#stage1').hide();
				$('#stage2').show();
			});

			$('#prev-stage').click(function() {
				$('#stage2').hide();
				$('#stage1').show();
			});

            $('#next-stage2').click(function() {
				$('#stage2').hide();
				$('#stage3').show();
            });
		});
	</script>
    
</body>
</html><?php /**PATH C:\Users\Korisnik\OneDrive\Dokumenti\projekti\HappyEars (Laravel)\resources\views/index.blade.php ENDPATH**/ ?>