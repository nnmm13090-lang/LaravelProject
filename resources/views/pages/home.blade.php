@extends('layouts.app')

@section('title', 'Home - ' . config('app.name', 'The Desk'))
<style>
    #blog{
        background-image: url(https://thumbs.dreamstime.com/b/blog-information-website-concept-workplace-background-text-view-above-127465079.jpg?w=992);
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

@section('content')

<section class="relative overflow-hidden bg-[#d6cec1] px-6 py-16 lg:px-10 lg:py-15">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.92),_transparent_30%),radial-gradient(circle_at_bottom_right,_rgba(181,69,27,0.12),_transparent_28%),linear-gradient(135deg,#f8f3eb_0%,#efe0cd_52%,#e6d1ba_100%)]"></div>
    <div class="absolute right-0 top-0 h-80 w-80 rounded-full bg-[#b5451b]/10 blur-3xl"></div>
    <div class="absolute bottom-0 left-1/4 h-72 w-72 rounded-full bg-[#2c5f8a]/10 blur-3xl"></div>

    <div class="relative mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
        <div>
            <p class="text-[0.72rem] font-bold uppercase tracking-[0.34em] text-accent2">The Desk Journal</p>
            <h1 class="mt-5 max-w-4xl font-display text-5xl font-bold leading-[0.94] tracking-tight text-ink lg:text-7xl">
                A new template for ideas, essays, and clear thinking.
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-charcoal">
                Writing about technology, business, creativity, and the quieter ways people build meaningful work.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('blog') }}"
                   class="rounded-full bg-ink px-7 py-4 text-xs font-bold uppercase tracking-[0.24em] text-ivory transition-colors hover:bg-accent">
                    Explore Writing
                </a>
                <a href="{{ route('about') }}"
                   class="rounded-full border border-ink/15 bg-white/60 px-7 py-4 text-xs font-bold uppercase tracking-[0.24em] text-ink transition-colors hover:border-accent hover:text-accent">
                    Meet The Author
                </a>
            </div>

            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                <div class="rounded-[1.75rem] border border-white/70 bg-white/70 p-5 shadow-[0_18px_45px_rgba(89,64,42,0.08)] backdrop-blur-sm">
                    <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent">Weekly</p>
                    <p class="mt-3 font-display text-2xl font-bold text-ink">Essays</p>
                </div>
                <div class="rounded-[1.75rem] border border-white/70 bg-[#1f1a17] p-5 text-ivory shadow-[0_18px_45px_rgba(31,26,23,0.14)]">
                    <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-gold">Curated</p>
                    <p class="mt-3 font-display text-2xl font-bold">Ideas</p>
                </div>
                <div class="rounded-[1.75rem] border border-white/70 bg-white/70 p-5 shadow-[0_18px_45px_rgba(89,64,42,0.08)] backdrop-blur-sm">
                    <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent2">Slow</p>
                    <p class="mt-3 font-display text-2xl font-bold text-ink">Reading</p>
                </div>
            </div>
        </div>

        <div class="relative">
            <div class="overflow-hidden rounded-[2rem] border border-white/70 bg-white/55 shadow-[0_24px_70px_rgba(89,64,42,0.12)] backdrop-blur-sm">
                <div id="blog" class="relative h-[460px]">
                    <div class="absolute inset-0 opacity-25" style="background-image: linear-gradient(rgba(255,255,255,0.6) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.6) 1px, transparent 1px); background-size: 32px 32px;"></div>

                    <div class="absolute left-6 top-6 rounded-full bg-white/70 px-4 py-2 text-[0.62rem] font-bold uppercase tracking-[0.22em] text-accent2 backdrop-blur-sm">
                        Featured Space
                    </div>

                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/75 via-black/35 to-transparent p-8">
                        <p class="text-[0.65rem] font-bold uppercase tracking-[0.28em] text-gold">Template Refresh</p>
                        <h2 class="mt-3 max-w-md font-display text-4xl font-bold leading-tight text-white">
                            A softer, cleaner front page built for thoughtful writing.
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#fbf7f0] px-6 py-16 lg:px-10">
    <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.9fr_1.1fr]">
    <div class="relative rounded-[2rem] overflow-hidden bg-[#1c1815] shadow-[0_24px_60px_rgba(31,26,23,0.12)]">
        
        <img 
            class="w-full h-full object-cover" 
            src="https://veracontent.com/wp-content/uploads/2020/10/blog-images-ultimate-guide.jpeg" 
            alt=""
        >
        <a href="{{ route('about') }}"
           class="absolute bottom-4 left-4 z-10 rounded-full border border-white/15 px-6 py-3 text-xs font-bold uppercase tracking-[0.24em] text-ivory bg-black/40 hover:border-gold hover:text-gold">
            Read About
        </a>
        
    </div>

        <div class="grid gap-5 md:grid-cols-2">
            <div class="rounded-[1.75rem] border border-rule bg-white p-6 shadow-sm">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent">Format</p>
                <h3 class="mt-3 font-display text-2xl font-bold text-ink">Long-form essays</h3>
                <p class="mt-3 text-sm leading-7 text-muted">
                    A layout that supports thoughtful reading, featured stories, and clean article previews.
                </p>
            </div>
            <div class="rounded-[1.75rem] border border-rule bg-[#f3ebdf] p-6 shadow-sm">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent2">Visual Tone</p>
                <h3 class="mt-3 font-display text-2xl font-bold text-ink">Warm and modern</h3>
                <p class="mt-3 text-sm leading-7 text-muted">
                    Soft colors, rounded shapes, and lighter surfaces instead of the older heavy editorial blocks.
                </p>
            </div>
            <div class="rounded-[1.75rem] border border-rule bg-[#eef3f7] p-6 shadow-sm">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent2">Built For</p>
                <h3 class="mt-3 font-display text-2xl font-bold text-ink">Blog growth</h3>
                <p class="mt-3 text-sm leading-7 text-muted">
                    Easy to expand later with real posts, categories, author highlights, and featured content.
                </p>
            </div>
            <div class="rounded-[1.75rem] border border-rule bg-white p-6 shadow-sm">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent">Next Step</p>
                <h3 class="mt-3 font-display text-2xl font-bold text-ink">Content-ready</h3>
                <p class="mt-3 text-sm leading-7 text-muted">
                    Placeholder sections work now, and the template can later plug into real database-backed posts.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#f4ecdf] px-6 py-16 lg:px-10" id="posts">
    <div class="mx-auto max-w-7xl">
        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[0.68rem] font-bold uppercase tracking-[0.28em] text-accent">Recent Writing</p>
                <h2 class="mt-3 font-display text-4xl font-bold tracking-tight text-ink">Fresh from the desk</h2>
            </div>
            <a href="{{ route('blog') }}"
               class="text-xs font-bold uppercase tracking-[0.24em] text-accent2 hover:text-accent">
                View All Posts
            </a>
        </div>

        @php
            $thumbs = [
                'from-[#1e3248] to-[#52789b]',
                'from-[#3c231a] to-[#b16c44]',
                'from-[#2f3d28] to-[#68845e]',
                'from-[#2b2d55] to-[#7080cb]',
                'from-[#4a2d1c] to-[#d0975d]',
                'from-[#254049] to-[#61a1ad]',
            ];
        @endphp

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse($recentPosts as $i => $post)
                    <a href="{{ route('post', $post->slug) }}"
                       class="group flex flex-col overflow-hidden rounded-2xl border border-white/60 bg-white shadow-[0_16px_45px_rgba(89,64,42,0.08)] transition-transform hover:-translate-y-1">
                        <div class="relative h-56 bg-gradient-to-br {{ $thumbs[$i % 6] }} flex items-center justify-center">
                            @if($post->cover_image)
                                <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}"
                                     class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <span class="text-5xl text-white/60">🖼️</span>
                            @endif
                            @if($post->category)
                                <span class="absolute top-4 left-4 bg-accent2/90 text-white text-xs font-bold px-3 py-1 rounded-full z-10">{{ $post->category->name }}</span>
                            @endif
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent2 mb-2">
                                {{ optional($post->published_at)->format('F j, Y') }}
                            </p>
                            <h3 class="font-display text-2xl font-bold leading-tight text-ink mb-2">{{ $post->title }}</h3>
                            <p class="text-sm leading-7 text-muted mb-4">{{ $post->excerpt }}</p>
                            <div class="flex items-center mt-auto pt-2 justify-between text-xs text-gray-500">
                                <div class="flex items-center gap-2">
                                    <span class="bg-gray-200 rounded-full w-7 h-7 flex items-center justify-center font-bold text-[0.9rem]">
                                        {{ strtoupper(Str::substr($post->author->name ?? 'AU', 0, 2)) }}
                                    </span>
                                    <span>{{ $post->author->name ?? 'Author' }}</span>
                                </div>
                                <span>{{ $post->reading_time ?? '3' }} min read</span>
                            </div>
                        </div>
                    </a>
            @empty
                    @for($i = 0; $i < 3; $i++)
                        <div class="flex flex-col overflow-hidden rounded-2xl border border-white/60 bg-white shadow-[0_16px_45px_rgba(89,64,42,0.08)]">
                            <div class="h-56 bg-gradient-to-br {{ $thumbs[$i % 6] }} flex items-center justify-center">
                                <span class="text-5xl text-white/60">🖼️</span>
                                <span class="absolute top-4 left-4 bg-accent2/90 text-white text-xs font-bold px-3 py-1 rounded-full z-10">Coming Soon</span>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent2 mb-2">Upcoming</p>
                                <h3 class="font-display text-2xl font-bold leading-tight text-ink mb-2">A new essay is on the way.</h3>
                                <p class="text-sm leading-7 text-muted mb-4">This redesigned template is ready for your real posts as soon as you connect your content.</p>
                                <div class="flex items-center mt-auto pt-2 justify-between text-xs text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <span class="bg-gray-200 rounded-full w-7 h-7 flex items-center justify-center font-bold text-[0.9rem]">AU</span>
                                        <span>Author</span>
                                    </div>
                                    <span>3 min read</span>
                                </div>
                            </div>
                        </div>
                    @endfor
            @endforelse
        </div>
    </div>
</section>
@endsection
