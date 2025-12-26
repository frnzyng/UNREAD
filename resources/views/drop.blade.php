<x-layout>
    <x-slot:title>
        Drop a Message
    </x-slot:title>

    <div class="min-h-screen flex flex-col">
        <x-top-nav />

        <div class="flex-1 flex items-center justify-center p-6 py-12">
            <div class="max-w-2xl w-full">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 md:p-12 border border-purple-200/50">
                    <div class="text-center mb-8">
                        <h1 class="text-5xl font-bold mb-4 flex items-center justify-center gap-3">
                            <span class="text-5xl">💌</span>
                            <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-blue-400 bg-clip-text text-transparent">Drop a Message</span>
                            <span class="text-5xl">💌</span>
                        </h1>
                        <p class="text-lg text-purple-600/70">Share your thoughts with someone special</p>
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

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-100/80 border-2 border-red-300/50 text-red-700">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('drop.submit') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-purple-700 font-semibold mb-2 text-lg">
                            <span class="text-xl">📝</span> Title
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}"
                            placeholder="Enter message title..."
                            class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('title') ? 'border-red-400' : 'border-pink-300/50' }} focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60"
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-purple-700 font-semibold mb-2 text-lg">
                                <span class="text-xl">👤</span> To
                            </label>
                            <input 
                                type="text" 
                                name="to" 
                                value="{{ old('to') }}"
                                placeholder="Recipient name..."
                                class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('to') ? 'border-red-400' : 'border-purple-300/50' }} focus:border-purple-400 focus:ring-2 focus:ring-purple-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60"
                            >
                            @error('to')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-purple-700 font-semibold mb-2 text-lg">
                                <span class="text-xl">💝</span> From
                            </label>
                            <input 
                                type="text" 
                                name="from" 
                                value="{{ old('from') }}"
                                placeholder="Your name..."
                                class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('from') ? 'border-red-400' : 'border-blue-300/50' }} focus:border-blue-400 focus:ring-2 focus:ring-blue-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60"
                            >
                            @error('from')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-purple-700 font-semibold mb-2 text-lg">
                            <span class="text-xl">💬</span> Message
                        </label>
                        <textarea 
                            name="content" 
                            placeholder="Write your message here..."
                            rows="6"
                            class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('content') ? 'border-red-400' : 'border-pink-300/50' }} focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60 resize-none"
                        >{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button 
                            type="submit"
                            class="flex-1 px-8 py-4 bg-gradient-to-r from-purple-400 to-pink-400 text-white rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2"
                        >
                            <span class="text-2xl">✨</span>
                            <span>Send Message</span>
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

