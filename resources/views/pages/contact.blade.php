@extends('layouts.app')

@section('title', 'Contact - ' . config('app.name', 'The Desk'))

@section('content')


<section class="bg-[#fbf7f0] px-6 py-10 lg:px-10">
    <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[0.9fr_0.7fr]">
        <div class="rounded-[2rem] border border-white/70 bg-white/82 p-7 shadow-[0_24px_70px_rgba(89,64,42,0.10)] backdrop-blur-sm lg:p-9">
            <div class="mb-8 flex items-start justify-between gap-4">
                <div>
                    <p class="text-[0.68rem] font-bold uppercase tracking-[0.28em] text-accent">Send A Message</p>
                    <h2 class="mt-3 font-display text-4xl font-bold tracking-tight text-ink">Write directly</h2>
                </div>
                <div class="rounded-full bg-[#f4e8da] px-4 py-2 text-[0.62rem] font-bold uppercase tracking-[0.2em] text-accent2">
                    Contact Form
                </div>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                            Name
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors focus:border-accent2 @error('name') border-accent @enderror">
                        @error('name')
                            <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors focus:border-accent2 @error('email') border-accent @enderror">
                        @error('email')
                            <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                        Subject
                    </label>
                    <input type="text" name="subject" value="{{ old('subject') }}" required
                           class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors focus:border-accent2 @error('subject') border-accent @enderror">
                    @error('subject')
                        <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                        Reason
                    </label>
                    <select name="reason"
                            class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors focus:border-accent2">
                        <option value="">Select a reason...</option>
                        <option value="general" {{ old('reason') === 'general' ? 'selected' : '' }}>General Inquiry</option>
                        <option value="collaboration" {{ old('reason') === 'collaboration' ? 'selected' : '' }}>Collaboration</option>
                        <option value="speaking" {{ old('reason') === 'speaking' ? 'selected' : '' }}>Speaking / Podcast</option>
                        <option value="feedback" {{ old('reason') === 'feedback' ? 'selected' : '' }}>Article Feedback</option>
                        <option value="other" {{ old('reason') === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted">
                        Message
                    </label>
                    <textarea name="message" rows="6" required
                              class="w-full rounded-2xl border border-[#ddcfbf] bg-white px-5 py-4 text-sm text-ink outline-none transition-colors focus:border-accent2 @error('message') border-accent @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-2 text-xs text-accent">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full rounded-2xl bg-ink px-6 py-4 text-xs font-bold uppercase tracking-[0.24em] text-ivory transition-colors hover:bg-accent">
                    Send Message
                </button>
            </form>
        </div>

        <div class="grid gap-5">
            <div class="rounded-[2rem] bg-[#1f1a17] p-8 text-ivory shadow-[0_24px_60px_rgba(31,26,23,0.12)]">
                <p class="text-[0.68rem] font-bold uppercase tracking-[0.28em] text-gold">Direct Contact</p>
                <h3 class="mt-4 font-display text-3xl font-bold">A few useful details.</h3>
                <div class="mt-6 space-y-4 text-sm leading-7 text-[#d0c4b6]">
                    <p><span class="font-semibold text-ivory">Email:</span> <a href="mailto:hello@thedesk.blog" class="text-gold hover:underline">hello@thedesk.blog</a></p>
                    <p><span class="font-semibold text-ivory">Response Time:</span> Usually within 2-3 business days.</p>
                    <p><span class="font-semibold text-ivory">Best For:</span> Collaborations, thoughtful feedback, or writing-related opportunities.</p>
                </div>
            </div>

            <div class="rounded-[1.75rem] border border-rule bg-white p-6 shadow-sm">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent2">Before Sending</p>
                <ul class="mt-4 space-y-3 text-sm leading-7 text-muted">
                    <li>Include enough context so the first reply can be useful.</li>
                    <li>If it relates to a post, mention the title or topic directly.</li>
                    <li>Short messages are welcome, clear messages are even better.</li>
                </ul>
            </div>

            <div class="rounded-[1.75rem] border border-rule bg-[#eef3f7] p-6 shadow-sm">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.24em] text-accent">Newsletter</p>
                <h3 class="mt-3 font-display text-2xl font-bold text-ink">Just here for the writing?</h3>
                <p class="mt-3 text-sm leading-7 text-muted">
                    You can also skip the form and follow new essays by email.
                </p>
                <a href="{{ route('home') }}#newsletter"
                   class="mt-5 inline-flex rounded-full bg-accent px-6 py-3 text-xs font-bold uppercase tracking-[0.22em] text-ivory transition-colors hover:bg-orange-800">
                    Join Newsletter
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
