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
    @if(Auth::check())
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand position-absolute top-0 start-50 translate-middle-x" href="{{ url('/') }}"><img src="img\agrabic_cute_cartoon_happy_bunny_icon_for_website_4K_dfb0a085-8a01-4c43-99a3-344b48502463-removebg-preview.png" alt="HappyEars" width="60" height="60"></a>  
            </div>
        </nav>
    </header>
    <main>
        <div class="stage main position-absolute top-50 start-50 translate-middle">
            @if (session()->has('message'))
            <div class="fs-3 position-absolute top-0 start-50 translate-middle-x alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <img src="{{ Auth::user()->profile_image }}" style="width: 7vw; padding-top: 2%">
            <p class="fs-2">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
            <div class="fs-4 text-start ps-5 mt-5">
                <h2 class="fs-2 text-decoration-underline mb-4">About me</h2>
                <p>Username: {{ Auth::user()->username }}</p>
                <p>E-mail: {{ Auth::user()->email }}</p>
                <p>Created at: {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</p>
            </div>
            <div class="mystories fs-4 mt-5 position-absolute top-50 start-50 translate-middle overflow-y-auto">
                <h2 class="fs-2 text-decoration-underline mb-4">My stories</h2>
                <h2 class="fs-4 text-decoration-underline mb-4">Text stories</h2>
                @foreach ($text_books as $story)
                    <a style="text-decoration: none; color: black;" href="{{ route('text_books.show', ['story' => $story->id]) }}">
                        <p>{{ $story->title }}
                        <form action="{{ route('delete', ['id' => $story->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-warning" style="transform: translateY(-40%);" type="submit">Delete</button>
                        </form></p></a>
                @endforeach
                <h2 class="fs-4 text-decoration-underline mb-4">Audio stories</h2>
                @foreach ($audio_books as $story)
                <a style="text-decoration: none; color: black;" href="{{ route('audio_books.show', ['story' => $story->id]) }}">
                    <p>{{ $story->title }}
                    <form action="{{ route('delete', ['id' => $story->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-warning" style="transform: translateY(-40%);" type="submit">Delete</button>
                    </form></p></a>
            @endforeach
            </div>
            <img class="position-absolute top-50 end-0 translate-middle-y" width="35%" src="img\agrabic_minimalist_cartoon_happy_bunny_with_headphones_5cd72aa6-95fd-48cd-b241-38fe9a975bd9-removebg-preview.png">
            <a class="nav-item mt-1 me-5 mb-3 btn position-absolute bottom-0 start-50 translate-middle-x" href="{{ route('logout') }}">Logout</a>
        </div>
    </main>
    @else
    <div>First login!</div>
    @endif
</body>
</html>