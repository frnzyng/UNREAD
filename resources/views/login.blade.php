<x-layout>
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-md w-full">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 md:p-12 border border-purple-200/50">
                <div class="text-center mb-8">
                    <h1 class="text-5xl font-bold mb-4 flex items-center justify-center gap-3">
                        <span class="text-5xl">🔐</span>
                        <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-blue-400 bg-clip-text text-transparent">Login</span>
                    </h1>
                    <p class="text-lg text-purple-600/70">Welcome back Admin! Please sign in to your account</p>
                </div>

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

                <form action="{{ route('login.submit') }}" method="post" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-purple-700 font-semibold mb-2 text-lg">
                            <span class="text-xl">📧</span> Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            placeholder="Enter your email..."
                            class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('email') ? 'border-red-400' : 'border-purple-300/50' }} focus:border-purple-400 focus:ring-2 focus:ring-purple-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-purple-700 font-semibold mb-2 text-lg">
                            <span class="text-xl">🔑</span> Password
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Enter your password..."
                            class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('password') ? 'border-red-400' : 'border-pink-300/50' }} focus:border-pink-400 focus:ring-2 focus:ring-pink-200 outline-none transition-all bg-white/60 backdrop-blur-sm text-purple-800 placeholder-purple-400/60"
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button 
                        type="submit"
                        class="w-full px-8 py-4 bg-gradient-to-r from-purple-400 to-pink-400 text-white rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-2"
                    >
                        <span class="text-2xl">✨</span>
                        <span>Sign In</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>