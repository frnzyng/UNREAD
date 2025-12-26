<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="text-center max-w-4xl w-full">
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl p-12 md:p-16 border border-pink-200/50">
                <span>
                <h1 class="text-6xl md:text-7xl font-bold mb-6 flex items-center justify-center gap-4">
                    <span class="text-6xl md:text-7xl">💌</span>
                    <span class="bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400 bg-clip-text text-transparent">Unread</span>
                    <span class="text-6xl md:text-7xl">💌</span>
                </h1>
                <p class="text-xl md:text-2xl text-purple-600/70 font-bold italic">
                    "A mail that was never read, a message that was never sent"
                </p>
                <p class="text-xl md:text-2xl text-purple-600/70 mb-12 font-light">
                    Share messages or discover what others have left behind
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-stretch">
                    <a 
                        href="{{ route('drop') }}" 
                        class="group px-10 py-6 bg-gradient-to-r from-purple-400 to-pink-400 text-white rounded-2xl font-semibold text-xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3"
                    >
                        <span class="text-3xl group-hover:animate-bounce">📮</span>
                        <span>Drop a Message</span>
                    </a>
                    <a 
                        href="{{ route('draw') }}" 
                        class="group px-10 py-6 bg-gradient-to-r from-pink-400 to-blue-400 text-white rounded-2xl font-semibold text-xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-200 flex items-center justify-center gap-3"
                    >
                        <span class="text-3xl group-hover:animate-spin">🎲</span>
                        <span>Draw a Message</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>