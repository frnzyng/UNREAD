<x-layout>
    <x-slot:title>
        Draw a Message
    </x-slot:title>

    <div class="min-h-screen flex flex-col">
        <x-top-nav />

        <div class="flex-1 flex items-center justify-center p-6">
            <div class="max-w-2xl w-full">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 md:p-12 border border-pink-200/50">
                    <div class="text-center mb-8">
                        <h1 class="text-5xl font-bold mb-4 flex items-center justify-center gap-3">
                            <span class="text-5xl">✨</span>
                            <span class="bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400 bg-clip-text text-transparent">Draw a Message</span>
                            <span class="text-5xl">✨</span>
                        </h1>
                        <p class="text-lg text-purple-600/70">Discover a random message from someone special</p>
                    </div>

                @if(session('message'))
                    <div class="mb-8 p-6 rounded-2xl bg-gradient-to-br from-pink-100/80 via-purple-100/80 to-blue-100/80 border-2 border-pink-300/50 shadow-md">
                        <div class="space-y-4">
                            <div class="flex items-center gap-2 text-pink-600">
                                <span class="text-2xl">💌</span>
                                <h2 class="text-2xl font-bold">{{ session('message')->title }}</h2>
                            </div>
                            <div class="flex flex-col md:flex-row gap-4 text-purple-700">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">👤</span>
                                    <span class="font-semibold">To:</span>
                                    <span>{{ session('message')->to }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">💝</span>
                                    <span class="font-semibold">From:</span>
                                    <span>{{ session('message')->from }}</span>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-pink-300/50">
                                <p class="text-blue-800/80 leading-relaxed text-lg whitespace-pre-wrap">{{ session('message')->content }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-red-100/80 border-2 border-red-300/50 text-red-700 flex items-center gap-2">
                        <span class="text-xl">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button 
                        onclick="window.location.href='{{ route('draw.random') }}'"
                        class="px-8 py-4 bg-gradient-to-r from-pink-400 to-purple-400 text-white rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2"
                    >
                        <span class="text-2xl">🎲</span>
                        <span>Draw a Message</span>
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

