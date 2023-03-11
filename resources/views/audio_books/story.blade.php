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
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>HappyEars</title>
</head>
<body>
    @if(Auth::check())
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand position-absolute top-0 start-50 translate-middle-x" href="{{ url('/') }}"><img src="{{ asset('img\agrabic_cute_cartoon_happy_bunny_icon_for_website_4K_dfb0a085-8a01-4c43-99a3-344b48502463-removebg-preview.png') }}" alt="HappyEars" width="60" height="60"></a>  
            </div>
        </nav>
    </header>
    <main>
        <div class="stage main position-absolute top-50 start-50 translate-middle">
            <a href="{{ route('audiobooks-page') }}" class="arrow position-absolute top-0 start-0 pe-3 ps-3 mt-4" style="text-decoration: none" id="backButton">Back</a>
            <p class="text-decoration-underline mt-3" style="color: #FED24D">{{ $story->title }}</p>
            <div class="position-absolute top-50 start-50 translate-middle">
                <img class="img-fluid" style="width: 50vw;" src="{{ asset('img\bunny-holding-player.png') }}">
                <audio controls class="position-absolute top-50 start-50 translate-middle mt-5">
                    <source src="{{ Storage::url($story->audio) }}" type="audio/mpeg">
                    Your browser does not support the audio tag.
                </audio>
            </div> 
        </div>
    </main>
    @else
    <div>First login!</div>
    @endif
</body>
</html>