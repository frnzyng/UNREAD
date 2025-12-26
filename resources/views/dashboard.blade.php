<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <div class="min-h-screen flex flex-col">
        <x-top-nav />

        <div class="flex-1 flex items-center justify-center p-6 py-12">
            <div class="max-w-6xl w-full">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 md:p-12 border border-purple-200/50">
                    <div class="text-center">
                        <h1 class="text-5xl font-bold mb-4 flex items-center justify-center gap-3">
                            <span class="text-5xl">📊</span>
                            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-blue-400 bg-clip-text text-transparent">Dashboard</span>
                        </h1>
                        <p class="text-lg text-purple-600/70 mb-8">Welcome to your dashboard!</p>
                    </div>

                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-green-100/80 border-2 border-green-300/50 text-green-700 flex items-center gap-2">
                        <span class="text-xl">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-100/80 border-2 border-red-300/50 text-red-700 flex items-center gap-2">
                        <span class="text-xl">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <div class="mb-8">
                    <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1">
                            <label class="block text-purple-700 font-semibold mb-2 text-lg">
                                <span class="text-xl">🔎</span> Search
                            </label>
                            <input
                                type="text"
                                name="q"
                                value="{{ $q ?? request('q') }}"
                                placeholder="Search title, to, from, content..."
                                class="w-full px-4 py-3 rounded-xl border-2 border-purple-300/50 focus:border-purple-400 focus:ring-2 focus:ring-purple-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60"
                            >
                        </div>

                        <div class="flex items-end gap-3">
                            <button
                                type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-purple-400 to-pink-400 text-white rounded-2xl font-semibold shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200"
                            >
                                ✨ Search
                            </button>
                            <a
                                href="{{ route('dashboard') }}"
                                class="px-6 py-3 bg-white/60 backdrop-blur-sm text-purple-600 rounded-2xl font-semibold border-2 border-purple-300/50 shadow-md hover:shadow-lg hover:bg-white/80 transition-all duration-200"
                            >
                                ↩️ Clear
                            </a>
                        </div>
                    </form>
                </div>

                @if($messages->count() === 0)
                    <div class="text-center py-12">
                        <p class="text-lg text-purple-600/70">No messages found.</p>
                    </div>
                @else
                    <div class="overflow-hidden rounded-3xl border border-purple-200/50 bg-white/60 backdrop-blur-sm shadow-lg">
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left">
                                <thead class="bg-gradient-to-r from-pink-100/80 via-purple-100/80 to-blue-100/80">
                                    <tr class="text-purple-900">
                                        <th class="px-5 py-4 text-sm font-semibold">Title</th>
                                        <th class="px-5 py-4 text-sm font-semibold">To</th>
                                        <th class="px-5 py-4 text-sm font-semibold">From</th>
                                        <th class="px-5 py-4 text-sm font-semibold">Created</th>
                                        <th class="px-5 py-4 text-sm font-semibold text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-purple-200/50">
                                    @foreach($messages as $message)
                                        <tr class="hover:bg-white/70 transition-colors">
                                            <td class="px-5 py-4">
                                                <div class="flex items-center gap-2">
                                                    <span class="text-lg">💌</span>
                                                    <span class="font-semibold text-purple-900">{{ $message->title }}</span>
                                                </div>
                                                <div class="text-sm text-purple-600/70 max-w-[22rem] truncate">
                                                    {{ $message->content }}
                                                </div>
                                            </td>
                                            <td class="px-5 py-4 text-purple-700 whitespace-nowrap">{{ $message->to }}</td>
                                            <td class="px-5 py-4 text-purple-700 whitespace-nowrap">{{ $message->from }}</td>
                                            <td class="px-5 py-4 text-purple-600/70 whitespace-nowrap">
                                                {{ $message->created_at?->format('Y-m-d') }}
                                            </td>
                                            <td class="px-5 py-4">
                                                <div class="flex items-center justify-end gap-3 whitespace-nowrap">
                                                    <a
                                                        href="{{ route('messages.show', $message->id) }}"
                                                        class="px-4 py-2 bg-gradient-to-r from-blue-400 to-purple-400 text-white rounded-xl font-semibold text-sm shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200"
                                                    >
                                                        👀 View
                                                    </a>
                                                    <a
                                                        href="{{ route('messages.edit', $message->id) }}"
                                                        class="px-4 py-2 bg-gradient-to-r from-purple-400 to-pink-400 text-white rounded-xl font-semibold text-sm shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200"
                                                    >
                                                        ✏️ Edit
                                                    </a>
                                                    <form
                                                        action="{{ route('messages.delete', $message->id) }}"
                                                        method="POST"
                                                        class="inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this message?');"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="px-4 py-2 bg-gradient-to-r from-red-400 to-pink-400 text-white rounded-xl font-semibold text-sm shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200"
                                                        >
                                                            🗑️ Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if(method_exists($messages, 'links'))
                        <div class="mt-6 flex items-center justify-center">
                            {{ $messages->appends(['q' => $q])->links('components.pagination') }}
                        </div>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>