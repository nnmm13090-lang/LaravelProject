@extends('layouts.app')

@section('title', 'Dashboard — ' . config('app.name', 'The Desk'))

@section('content')

{{-- ── DASHBOARD HEADER ── --}}
<section class="bg-ink text-ivory px-6 lg:px-10 py-10 border-b border-white/10">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-[0.65rem] font-bold uppercase tracking-[0.25em] text-accent mb-1">Admin Panel</p>
            <h1 class="font-display text-3xl font-bold tracking-tight">
                Welcome back, {{ auth()->user()->display_name ?? auth()->user()->name }} 👋
            </h1>
        </div>
        <a href="{{ route('admin.posts.create') }}"
           class="bg-accent text-ivory text-xs font-bold uppercase tracking-widest px-6 py-3 rounded-sm hover:bg-orange-800 transition-colors">
            + New Post
        </a>
    </div>
</section>

{{-- ── STATS ── --}}
<section class="bg-cream border-b border-rule px-6 lg:px-10 py-8">
    <div class="max-w-7xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-5">
        @php
            $stats = [
                ['label' => 'Total Posts',       'value' => $stats['posts'] ?? 0,       'color' => 'text-accent'],
                ['label' => 'Published',          'value' => $stats['published'] ?? 0,   'color' => 'text-green-600'],
                ['label' => 'Total Views',        'value' => number_format($stats['views'] ?? 0), 'color' => 'text-accent2'],
                ['label' => 'Subscribers',        'value' => $stats['subscribers'] ?? 0, 'color' => 'text-gold'],
            ];
        @endphp
        @foreach($stats as $stat)
        <div class="bg-white border border-rule p-6">
            <p class="font-display text-3xl font-bold {{ $stat['color'] }} mb-1">{{ $stat['value'] }}</p>
            <p class="text-[0.65rem] font-bold uppercase tracking-[0.18em] text-muted">{{ $stat['label'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ── MAIN CONTENT ── --}}
<section class="bg-ivory px-6 lg:px-10 py-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-8">

        {{-- POSTS TABLE --}}
        <div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <span class="text-[0.65rem] font-bold uppercase tracking-[0.25em] text-accent">Recent Posts</span>
                    <span class="w-8 h-px bg-accent"></span>
                </div>
                <a href="{{ route('admin.posts.index') }}"
                   class="text-[0.68rem] font-bold uppercase tracking-wide text-accent2 border-b border-accent2 pb-0.5 hover:text-accent hover:border-accent transition-colors">
                    All Posts
                </a>
            </div>

            <div class="bg-white border border-rule overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-cream border-b border-rule">
                            <th class="text-left text-[0.6rem] font-bold uppercase tracking-[0.18em] text-muted px-5 py-3">Title</th>
                            <th class="text-left text-[0.6rem] font-bold uppercase tracking-[0.18em] text-muted px-4 py-3 hidden md:table-cell">Category</th>
                            <th class="text-left text-[0.6rem] font-bold uppercase tracking-[0.18em] text-muted px-4 py-3 hidden lg:table-cell">Views</th>
                            <th class="text-left text-[0.6rem] font-bold uppercase tracking-[0.18em] text-muted px-4 py-3">Status</th>
                            <th class="text-right text-[0.6rem] font-bold uppercase tracking-[0.18em] text-muted px-5 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentPosts ?? [] as $post)
                        <tr class="border-b border-rule last:border-0 hover:bg-cream/50 transition-colors">
                            <td class="px-5 py-4">
                                <p class="font-semibold text-ink text-sm leading-snug line-clamp-1">{{ $post->title }}</p>
                                <p class="text-[0.65rem] text-muted mt-0.5">{{ $post->published_at?->format('M j, Y') ?? 'Draft' }}</p>
                            </td>
                            <td class="px-4 py-4 hidden md:table-cell">
                                <span class="text-xs text-accent2">{{ $post->categories->first()?->name ?? '—' }}</span>
                            </td>
                            <td class="px-4 py-4 hidden lg:table-cell">
                                <span class="text-xs text-muted">{{ number_format($post->views_count ?? 0) }}</span>
                            </td>
                            <td class="px-4 py-4">
                                @if($post->status === 'published')
                                    <span class="text-[0.6rem] font-bold uppercase tracking-wide bg-green-100 text-green-700 px-2 py-1 rounded-sm">Published</span>
                                @elseif($post->status === 'draft')
                                    <span class="text-[0.6rem] font-bold uppercase tracking-wide bg-warm text-muted px-2 py-1 rounded-sm">Draft</span>
                                @else
                                    <span class="text-[0.6rem] font-bold uppercase tracking-wide bg-yellow-100 text-yellow-700 px-2 py-1 rounded-sm">Scheduled</span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('post', $post->slug) }}" target="_blank"
                                       class="text-[0.6rem] font-bold uppercase tracking-wide text-muted hover:text-ink transition-colors">View</a>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                       class="text-[0.6rem] font-bold uppercase tracking-wide text-accent2 hover:text-ink transition-colors">Edit</a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this post?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-[0.6rem] font-bold uppercase tracking-wide text-accent hover:text-red-700 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-12 text-muted text-sm">
                                No posts yet.
                                <a href="{{ route('admin.posts.create') }}" class="text-accent2 hover:underline ml-1">Create your first post →</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- SIDEBAR --}}
        <div class="space-y-6">

            {{-- Quick Actions --}}
            <div class="bg-white border border-rule p-6">
                <div class="flex items-center gap-3 mb-5">
                    <span class="text-[0.62rem] font-bold uppercase tracking-[0.2em] text-accent">Quick Actions</span>
                    <span class="w-6 h-px bg-accent"></span>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('admin.posts.create') }}"
                       class="flex items-center justify-between px-4 py-3 bg-ink text-ivory text-xs font-bold uppercase tracking-wide hover:bg-accent transition-colors">
                        Write New Post <span>→</span>
                    </a>
                    <a href="{{ route('admin.categories.create') }}"
                       class="flex items-center justify-between px-4 py-3 border border-rule text-xs font-bold uppercase tracking-wide text-charcoal hover:bg-ink hover:text-ivory hover:border-ink transition-colors">
                        Add Category <span>→</span>
                    </a>
                    <a href="{{ route('admin.media') }}"
                       class="flex items-center justify-between px-4 py-3 border border-rule text-xs font-bold uppercase tracking-wide text-charcoal hover:bg-ink hover:text-ivory hover:border-ink transition-colors">
                        Media Library <span>→</span>
                    </a>
                    <a href="{{ route('admin.comments') }}"
                       class="flex items-center justify-between px-4 py-3 border border-rule text-xs font-bold uppercase tracking-wide text-charcoal hover:bg-ink hover:text-ivory hover:border-ink transition-colors">
                        Comments <span class="text-accent">{{ $pendingComments ?? 0 }} pending</span>
                    </a>
                </div>
            </div>

            {{-- Recent Comments --}}
            <div class="bg-white border border-rule p-6">
                <div class="flex items-center gap-3 mb-5">
                    <span class="text-[0.62rem] font-bold uppercase tracking-[0.2em] text-accent">Recent Comments</span>
                    <span class="w-6 h-px bg-accent"></span>
                </div>
                <div class="space-y-4">
                    @forelse($recentComments ?? [] as $comment)
                    <div class="pb-4 border-b border-rule last:border-0 last:pb-0">
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-5 h-5 rounded-full bg-ink text-ivory flex items-center justify-center text-[0.5rem] font-bold flex-shrink-0">
                                {{ strtoupper(substr($comment->user->name, 0, 2)) }}
                            </div>
                            <span class="text-xs font-semibold text-ink">{{ $comment->user->name }}</span>
                            <span class="text-[0.6rem] text-muted ml-auto">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs text-charcoal line-clamp-2 leading-relaxed">{{ $comment->content }}</p>
                    </div>
                    @empty
                    <p class="text-xs text-muted">No comments yet.</p>
                    @endforelse
                </div>
            </div>

            {{-- Post This Week --}}
            <div class="bg-cream border border-rule p-6">
                <p class="text-[0.62rem] font-bold uppercase tracking-[0.2em] text-muted mb-2">Drafts</p>
                <p class="font-display text-4xl font-bold text-ink">{{ $stats['drafts'] ?? 0 }}</p>
                <p class="text-xs text-muted mt-1">posts waiting to publish</p>
                <a href="{{ route('admin.posts.index', ['status' => 'draft']) }}"
                   class="inline-block mt-4 text-[0.65rem] font-bold uppercase tracking-wide text-accent2 border-b border-accent2 pb-0.5 hover:text-accent hover:border-accent transition-colors">
                    Review Drafts →
                </a>
            </div>
        </div>
    </div>
</section>

@endsection