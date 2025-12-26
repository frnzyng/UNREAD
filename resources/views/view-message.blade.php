<x-layout>
    <x-slot:title>
        View Message
    </x-slot:title>

    <div class="min-h-screen flex flex-col">
        <x-top-nav />

        <div class="flex-1 flex items-center justify-center p-6 py-12">
            <div class="max-w-3xl w-full">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 md:p-12 border border-purple-200/50">
                    <div class="text-center mb-8">
                        <h1 class="text-5xl font-bold mb-4 flex items-center justify-center gap-3">
                            <span class="text-5xl">👀</span>
                            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-blue-400 bg-clip-text text-transparent">View Message</span>
                        </h1>
                    </div>

                    <div class="p-6 rounded-2xl bg-gradient-to-br from-pink-100/80 via-purple-100/80 to-blue-100/80 border-2 border-purple-200/50 shadow-md">
                        <div class="space-y-4">
                            <div class="flex items-center justify-center gap-2 text-purple-700">
                                <span class="text-2xl">💌</span>
                                <h2 class="text-2xl font-bold text-center">{{ $message->title }}</h2>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-purple-700">
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">👤</span>
                                    <span class="font-semibold">To:</span>
                                    <span class="break-words">{{ $message->to }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">💝</span>
                                    <span class="font-semibold">From:</span>
                                    <span class="break-words">{{ $message->from }}</span>
                                </div>
                            </div>

                            <div class="pt-4 border-t border-purple-300/50">
                                <p class="text-blue-900/80 leading-relaxed text-lg whitespace-pre-wrap">{{ $message->content }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-8">
                        <a
                            href="{{ route('messages.edit', $message->id) }}"
                            class="flex-1 px-8 py-4 bg-gradient-to-r from-purple-400 to-pink-400 text-white rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2"
                        >
                            <span class="text-2xl">✏️</span>
                            <span>Edit</span>
                        </a>

                        <a
                            href="{{ route('dashboard') }}"
                            class="px-8 py-4 bg-white/60 backdrop-blur-sm text-purple-600 rounded-2xl font-semibold text-lg border-2 border-purple-300/50 shadow-md hover:shadow-lg hover:bg-white/80 transition-all duration-200 flex items-center justify-center gap-2"
                        >
                            <span class="text-xl">↩️</span>
                            <span>Back to Dashboard</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>


