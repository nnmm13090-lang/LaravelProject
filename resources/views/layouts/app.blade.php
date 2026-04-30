<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'The Desk'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Source+Serif+4:ital,opsz,wght@0,8..60,300;0,8..60,400;0,8..60,600;1,8..60,300&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Playfair Display"', 'Georgia', 'serif'],
                        body: ['"Source Serif 4"', 'Georgia', 'serif'],
                    },
                    colors: {
                        ivory:'#f8f5f0',
                        warm:'#e8e0d3',
                        ink:'#1a1714',
                        muted:'#8a8278',
                        rule:'#d5cec4',
                        accent:'#b5451b',
                        gold:'#c9a84c',
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Source Serif 4', Georgia, serif; }
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
    </style>
</head>

<body class="bg-ivory text-ink">

{{-- NAVBAR --}}
<nav class="bg-ink sticky top-0 z-50 border-b-[3px] border-accent">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex items-center justify-between h-16">

        <a href="{{ route('home') }}" class="font-display text-2xl text-ivory">
            The<span class="text-accent">.</span>Desk
        </a>

        <div class="hidden md:flex items-center gap-10">

            <a href="{{ route('home') }}" class="text-warm hover:text-gold uppercase text-xs font-bold">Home</a>
            <a href="{{ route('blog') }}" class="text-warm hover:text-gold uppercase text-xs font-bold">Blog</a>
            <a href="{{ route('about') }}" class="text-warm hover:text-gold uppercase text-xs font-bold">About</a>
            <a href="{{ route('contact') }}" class="text-warm hover:text-gold uppercase text-xs font-bold">Contact</a>

        </div>

        <div class="flex items-center gap-3">

            @auth

                {{-- ADMIN BUTTON --}}
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-xs font-bold uppercase bg-gold text-ink px-4 py-2 rounded hover:bg-yellow-600">
                        Dashboard
                    </a>
                @endif

                <span class="text-warm text-xs">{{ auth()->user()->name }}</span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-xs bg-accent text-white px-4 py-2 rounded">
                        Logout
                    </button>
                </form>

            @else
                <a href="{{ route('login') }}" class="text-xs bg-accent text-white px-4 py-2 rounded">Login</a>
                <a href="{{ route('register') }}" class="text-xs bg-accent text-white px-4 py-2 rounded">Register</a>
            @endauth

        </div>
    </div>
</nav>

{{-- PAGE CONTENT --}}
@yield('content')

{{-- FOOTER (RESTORED) --}}
<footer class="bg-ink text-warm pt-16 pb-8 px-6 lg:px-10 mt-16">
    <div class="max-w-7xl mx-auto">

        <div class="grid md:grid-cols-4 gap-10">

            <div>
                <h2 class="font-display text-2xl text-ivory">The<span class="text-accent">.</span>Desk</h2>
                <p class="text-sm mt-3 text-muted">
                    A personal blog about technology, business, and ideas.
                </p>
            </div>

            <div>
                <h4 class="text-xs uppercase text-muted mb-3">Links</h4>
                <a href="{{ route('home') }}" class="block text-sm hover:text-gold">Home</a>
                <a href="{{ route('blog') }}" class="block text-sm hover:text-gold">Blog</a>
                <a href="{{ route('about') }}" class="block text-sm hover:text-gold">About</a>
                <a href="{{ route('contact') }}" class="block text-sm hover:text-gold">Contact</a>
            </div>

            <div>
                <h4 class="text-xs uppercase text-muted mb-3">Topics</h4>
                <p class="text-sm text-muted">Tech</p>
                <p class="text-sm text-muted">Business</p>
                <p class="text-sm text-muted">Ideas</p>
            </div>

            <div>
                <h4 class="text-xs uppercase text-muted mb-3">More</h4>
                <p class="text-sm text-muted">Newsletter</p>
                <p class="text-sm text-muted">RSS Feed</p>
            </div>

        </div>

        <div class="border-t border-white/10 mt-10 pt-6 text-center text-xs text-muted">
            © {{ date('Y') }} The Desk. All rights reserved.
        </div>

    </div>
</footer>

</body>
</html>