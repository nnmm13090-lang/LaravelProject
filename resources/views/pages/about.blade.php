@extends('layouts.app')

@section('title', 'About — ' . config('app.name', 'The Desk'))

@section('content')

{{-- ── HEADER ── --}}

{{-- ── MAIN ABOUT ── --}}
<section class="bg-ivory px-6 lg:px-10 py-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[280px_1fr] gap-16 lg:gap-24 items-start">

        {{-- Portrait --}}
        <div class="lg:sticky lg:top-28">
            <div class="relative from-ink to-charcoal border-4 border-ink aspect-[3/4] overflow-hidden"
                 style="background-image: url(https://st.depositphotos.com/2309453/3449/i/450/depositphotos_34490345-stock-photo-confident-casual-unshaven-young-man.jpg); background-repeat: no-repeat; background-size: cover;">
                <span class="absolute bottom-4 right-4 font-display text-8xl font-bold text-white/[0.07] leading-none select-none">JD</span>
                <span class="absolute bottom-5 left-5 text-[0.68rem] font-bold uppercase tracking-[0.2em] text-white">Author & Writer</span>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-3 mt-8 border border-rule bg-white">
                <div class="text-center py-6 border-r border-rule">
                    <p class="font-display text-3xl font-bold text-accent">120+</p>
                    <p class="text-[0.62rem] uppercase tracking-widest text-muted mt-1">Articles</p>
                </div>
                <div class="text-center py-6 border-r border-rule">
                    <p class="font-display text-3xl font-bold text-accent">4.2k</p>
                    <p class="text-[0.62rem] uppercase tracking-widest text-muted mt-1">Readers</p>
                </div>
                <div class="text-center py-6">
                    <p class="font-display text-3xl font-bold text-accent">5yr</p>
                    <p class="text-[0.62rem] uppercase tracking-widest text-muted mt-1">Writing</p>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div>
            <div class="flex items-center gap-3 mb-6">
                <span class="text-[0.65rem] font-bold uppercase tracking-[0.25em] text-accent">My Story</span>
                <span class="w-10 h-px bg-accent"></span>
            </div>

            <h2 class="font-display text-4xl font-bold tracking-tight text-ink mb-6 leading-tight">
                Writing helps me think.<br><em class="not-italic text-charcoal">Publishing forces clarity.</em>
            </h2>

            <div class="space-y-5 text-charcoal text-[1.02rem] leading-[1.9]">
                <p>
                    I'm James — a writer, occasional software person, and chronic overthinker.
                    This blog is where I work through ideas in public, because nothing forces
                    you to understand something quite like having to explain it.
                </p>
                <p>
                    I write about the intersection of technology and how we live: how we work,
                    how we decide, how we pay attention, and what we choose to build.
                    My goal is simply to write things I'd want to read.
                </p>
                <p>
                    Before starting The Desk, I spent several years building software products.
                    That background informs almost everything I write — I think carefully about
                    systems, incentives, and second-order effects.
                </p>
            </div>

            {{-- Topics --}}
            <div class="mt-12 pt-10 border-t border-rule">
                <p class="text-[0.65rem] font-bold uppercase tracking-[0.25em] text-muted mb-5">What I Write About</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($categories ?? ['Technology','Business','Productivity','Finance','Culture','Book Notes'] as $cat)
                    <span class="px-4 py-2 border border-rule text-xs font-semibold uppercase tracking-wide text-charcoal rounded-sm">
                        {{ is_object($cat) ? $cat->name : $cat }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- CTA --}}
            <div class="mt-12 pt-10 border-t border-rule flex flex-wrap gap-4">
                <a href="{{ route('blog') }}"
                   class="bg-accent text-ivory text-xs font-bold uppercase tracking-widest px-8 py-4 rounded-sm hover:bg-orange-800 transition-colors">
                    Read the Blog
                </a>
                <a href="{{ route('contact') }}"
                   class="border border-ink text-ink text-xs font-bold uppercase tracking-widest px-8 py-4 rounded-sm hover:bg-ink hover:text-ivory transition-colors">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>
</section>

@endsection