<x-app-layout>
    <x-slot name="header">
        <p class="pb-4"><strong>Unread Notifications</</p>
        
        @forelse ($unreadNotifications as $unreadNotification)
            <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
                <div class="flex">
                    <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    <div>
                        @if ($unreadNotification->type === 'App\Notifications\UserSubscribed')
                            <p class="font-bold">Subscribed to {{ $unreadNotification->data['channel'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="mb-6 bg-orange-lightest border-l-4 border-orange text-orange-dark p-4" role="alert">
                <p class="font-bold">You have read all the Notifications !</p>
            </div>
        @endforelse

        <p class="pb-4 pt-2"><strong>Read Notifications</strong></p>
        
        @foreach ($readNotifications as $readNotification)
            <div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
                <div class="flex">
                    <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    <div>
                        @if ($readNotification->type === 'App\Notifications\UserSubscribed')
                        <p class="font-bold">Subscribed to {{ $readNotification->data['channel'] }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </x-slot>
</x-app-layout>
