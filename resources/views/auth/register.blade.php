@extends('layouts.app')

@section('title', 'Create Account - ' . config('app.name', 'The Desk'))
@section('hideChrome', true)

@section('content')

<section class="relative h-screen overflow-hidden bg-[#f7efe4]">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.95),_transparent_34%),radial-gradient(circle_at_bottom_right,_rgba(181,69,27,0.16),_transparent_28%),linear-gradient(135deg,#f8f3eb_0%,#efe2d1_55%,#e7d4c0_100%)]"></div>
    <div class="absolute -left-20 top-16 h-64 w-64 rounded-full bg-white/50 blur-3xl"></div>
    <div class="absolute right-0 top-0 h-80 w-80 rounded-full bg-[#b5451b]/10 blur-3xl"></div>
    <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-[#2c5f8a]/10 blur-3xl"></div>

    <div class="relative mx-auto flex h-screen max-w-7xl items-center px-6 py-6 lg:px-10 lg:py-8">
        <div class="grid w-full items-center gap-8 lg:grid-cols-[0.95fr_1.05fr]">
            <div class="max-w-xl">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 font-display text-4xl font-bold tracking-tight text-ink">
                    The<span class="text-accent">.</span>Desk
                </a>
                <div class="mt-8">
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center gap-2 rounded-full border border-ink/10 bg-white/60 px-4 py-2 text-xs font-bold uppercase tracking-[0.22em] text-ink transition-colors hover:border-accent hover:text-accent">
                        <span>&larr;</span>
                        <span>Back</span>
                    </a>
                </div>

                <p class="mt-12 text-[0.72rem] font-bold uppercase tracking-[0.34em] text-accent2">Join The Desk</p>
                <h1 class="mt-5 font-display text-5xl font-bold leading-[0.96] tracking-tight text-ink lg:text-7xl">
                    Create your place on this corner of the internet.
                </h1>
            </div>

            <div class="relative">
                <div class="absolute -left-6 top-10 hidden h-32 w-32 rounded-[2rem] bg-white/40 blur-2xl lg:block"></div>
                <div class="relative rounded-[2rem] border border-white/70 bg-white/78 p-7 shadow-[0_30px_80px_rgba(89,64,42,0.14)] backdrop-blur-md lg:p-9">
                    <div class="mb-8 flex items-start justify-between gap-4">
                        <div>
                            <p class="text-[0.68rem] font-bold uppercase tracking-[0.28em] text-accent">Register</p>
                            <h2 class="mt-3 font-display text-4xl font-bold tracking-tight text-ink">Create account</h2>
                        </div>
                        <div class="rounded-full bg-[#f4e8da] px-4 py-2 text-[0.62rem] font-bold uppercase tracking-[0.2em] text-accent2">
                            New
                        </div>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                                Full Name
                            </label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                                   class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors placeholder:text-[#a99a88] focus:border-accent2 @error('name') border-accent @enderror">
                            @error('name')
                                <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                                Email Address
                            </label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors placeholder:text-[#a99a88] focus:border-accent2 @error('email') border-accent @enderror">
                            @error('email')
                                <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                            @enderror
                        </div>

                            <div>
                                <label for="password" class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                                    Password
                                </label>
                                <input id="password" type="password" name="password" required
                                       class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors focus:border-accent2 @error('password') border-accent @enderror">
                                @error('password')
                                    <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                                @enderror
                            </div>

                        <div class="rounded-2xl bg-[#f6ede1] px-4 py-3 text-sm text-charcoal">
                            By creating an account, you agree to receive occasional updates from The Desk.
                        </div>

                        <button type="submit"
                                class="w-full rounded-2xl bg-ink px-6 py-4 text-xs font-bold uppercase tracking-[0.24em] text-ivory transition-colors hover:bg-accent">
                            Create Account
                        </button>
                    </form>

                    <div class="mt-8 rounded-[1.5rem] bg-[#f4e8da] px-5 py-4">
                        <p class="text-sm text-charcoal">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-semibold text-accent2 hover:text-accent">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
