<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloggest - Your Blog</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href={{ asset('/css/banner.css') }}>
    <link rel="stylesheet" href={{ asset('/css/main.css') }}>
    <style>
        body{
            padding: 0px;
            margin: 0rem 1rem;
        }
    </style>

</head>
<body>
    {{-- Header  --}}
    <header class="header">
        <div class="header--middle">
            <a href="/">
                <div class="brand">
                    <img src="/images/aperture-1280.png" class="brand__logo" width="64px">
                    <h1 class="brand__name">Bloggest</h1>
                </div>
            </a>
            
            {{-- Navigation across site. Substitute with partial or component --}}
            <nav class="main-nav">
                <ul class="main-nav__list">
                    <a href="" class="main-nav__item"><li>News</li></a>
                    <a href="/posts" class="main-nav__item"><li>Blogs</li></a>
                    <a href="" class="main-nav__item"><li>Account</li></a>
                    <a href="/register" class="main-nav__item"><li>Register</li></a>
                </ul>
            </nav>
        </div>
    </header>
    
    <main class="main">
        {{-- Slot to insert other views inside  --}}
        @yield('content')
    </main>
    

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer__nav">
            <div class="guide">
                <h3 class="guide__title">Assistance</h3>
                <ul>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">QnA</a></li>
                </ul>
            </div>
            <div class="guide">
                <h3 class="guide__title">Account</h3>
                <ul>
                    <li><a href="#">Create content</a></li>
                    <li><a href="#">Sponsors</a></li>
                    <li><a href="#">Avaliate Us</a></li>
                </ul>
            </div>
        </div>

        <div class="footer__credits">
            <p class="footer__creator">Made by Luis Felipe</p>
        </div>
    </footer>
</body>
</html>