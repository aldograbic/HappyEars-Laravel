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
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <title>HappyEars</title>
</head>
<body>
    <?php if(Auth::check()): ?>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand position-absolute top-0 start-50 translate-middle-x" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('img\agrabic_cute_cartoon_happy_bunny_icon_for_website_4K_dfb0a085-8a01-4c43-99a3-344b48502463-removebg-preview.png')); ?>" alt="HappyEars" width="60" height="60"></a>  
            </div>
        </nav>
    </header>
    <main>
        <div class="stage main position-absolute top-50 start-50 translate-middle">
            <p class="text-decoration-underline mt-3" style="color: #FED24D"><?php echo e($story->title); ?></p>
            <div class="position-absolute top-50 start-50 translate-middle"><p id="currentSentence"></p></div>
            <div>
                <button class="arrow position-absolute top-50 start-0 translate-middle-y" id="previousButton" onclick="previousSentence()" disabled>Previous</button>
                <button class="arrow position-absolute top-50 end-0 translate-middle-y" id="nextButton" onclick="nextSentence()">Next</button>
                <a href="<?php echo e(route('textbooks-page')); ?>" class="arrow" style="text-decoration: none" id="backButton">Back</a>
            </div>
        </div>
    </main>
    <?php else: ?>
    <div>First login!</div>
    <?php endif; ?>

    <?php
        $sentences = preg_split("/(?<=[.?!])\s+(?=[a-z])/i", $story->text, -1, PREG_SPLIT_NO_EMPTY);
    ?>

<script>
    var sentences = <?php echo json_encode($sentences, 15, 512) ?>;
    var currentSentenceIndex = 0;
    var currentSentenceElement = document.getElementById("currentSentence");
    var previousButton = document.getElementById("previousButton");
    var backButton = document.getElementById("backButton");

    function showCurrentSentence() {
        if (currentSentenceElement) {
            currentSentenceElement.innerHTML = sentences[currentSentenceIndex];
        }
        if (previousButton && nextButton && backButton) {
            previousButton.disabled = (currentSentenceIndex === 0);
            nextButton.disabled = (currentSentenceIndex === sentences.length - 1);
            backButton.style.display = (currentSentenceIndex === sentences.length - 1) ? "block" : "none";
        }
    }

    showCurrentSentence();

    function previousSentence() {
        if (currentSentenceIndex > 0) {
            currentSentenceIndex--;
            showCurrentSentence();
        }
    }

    function nextSentence() {
        if (currentSentenceIndex < sentences.length - 1) {
            currentSentenceIndex++;
            showCurrentSentence();
        }
    }
</script>

</body>
</html><?php /**PATH C:\Users\Korisnik\OneDrive\Dokumenti\projekti\HappyEars (Laravel)\resources\views/text_books/story.blade.php ENDPATH**/ ?>