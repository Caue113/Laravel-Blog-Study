<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloggest - Your Blog</title>


    <link rel="stylesheet" href="/css/footer.css">
</head>
<body>
    {{-- Header  --}}
    <header>
        <h1><i>'logo'</i>Bloggest</h1>
        <div></div>
        {{-- Navigation across site. Substitute with partial or component --}}
        <nav></nav>
    </header>
    
    
    {{-- Slot to insert other views inside  --}}
    @yield('content')

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