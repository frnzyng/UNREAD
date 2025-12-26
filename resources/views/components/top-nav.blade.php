<nav class="sticky top-0 z-50 w-full">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 py-5">
        <div class="rounded-3xl border border-purple-200/60 bg-white/70 backdrop-blur-md shadow-lg">
            <div class="flex items-center justify-between gap-4 px-4 py-3 sm:px-6">
                <a href="{{ route('index') }}" class="flex items-center gap-3">
                    <span class="text-2xl">💌</span>
                    <span class="font-bold text-lg bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400 bg-clip-text text-transparent">
                        Unread
                    </span>
                </a>

                <div class="flex items-center gap-2">
                    <a
                        href="{{ route('drop') }}"
                        class="{{ request()->routeIs('drop') ? 'bg-purple-100/80 border-purple-300/60 text-purple-800' : 'bg-white/40 border-purple-200/50 text-purple-700 hover:bg-white/70' }} px-4 py-2 rounded-2xl border font-semibold shadow-sm transition-all duration-200"
                    >
                        <span class="mr-2">📮</span> Drop
                    </a>
                    <a
                        href="{{ route('draw') }}"
                        class="{{ request()->routeIs('draw') ? 'bg-pink-100/80 border-pink-300/60 text-pink-800' : 'bg-white/40 border-pink-200/50 text-purple-700 hover:bg-white/70' }} px-4 py-2 rounded-2xl border font-semibold shadow-sm transition-all duration-200"
                    >
                        <span class="mr-2">🎲</span> Draw
                    </a>


                    @if(session()->has('user_id'))
                        <a
                            href="{{ route('dashboard') }}"
                            class="{{ request()->routeIs('dashboard') ? 'bg-blue-100/80 border-blue-300/60 text-blue-900' : 'bg-white/40 border-blue-200/50 text-purple-700 hover:bg-white/70' }} px-4 py-2 rounded-2xl border font-semibold shadow-sm transition-all duration-200"
                        >
                            <span class="mr-2">📊</span> Dashboard
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="px-4 py-2 rounded-2xl border border-rose-200/60 bg-white/40 text-rose-700 hover:bg-white/70 font-semibold shadow-sm transition-all duration-200"
                            >
                                <span class="mr-2">🚪</span> Logout
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>

