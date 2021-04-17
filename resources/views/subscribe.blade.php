<x-app-layout>
    <x-slot name="header">
        <form method="POST" action="{{ route('subscribe.store') }}">
            @csrf

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Subscribe
                </button>
                
                @if (session('message'))
                <div class="mt-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                    <p class="font-bold">{{ session('message') }}</p>
                  </div>
                @endif
            </h2>
        </form>
    </x-slot>
</x-app-layout>
