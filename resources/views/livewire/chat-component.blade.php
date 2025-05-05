<div class="flex flex-col bg-gray-900 text-gray-200 p-4 rounded-lg">
    <!-- Chat Messages -->
    <div class="overflow-y-auto h-48 mb-3 space-y-2" id="messages">
        @foreach($messages as $message)
            <div class="flex {{ $message['user'] === 'You' ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-md">
                    <div class="{{ $message['user'] === 'You' ? 'bg-indigo-600' : 'bg-gray-700' }} shadow rounded-xl p-2">
                        <p class="text-sm whitespace-pre-wrap">
                            {{ $message['text'] }}
                        </p>
                    </div>
                    <span class="block text-xs mt-1 text-gray-400 {{ $message['user'] === 'You' ? 'text-right' : 'text-left' }}">
                        {{ $message['user'] }}
                    </span>
                </div>
            </div>
        @endforeach

        @if($isTyping)
            <div class="flex justify-start">
                <div class="max-w-md">
                    <div class="bg-gray-700 shadow rounded-xl p-2">
                        <p class="text-sm whitespace-pre-wrap" wire:stream="response">
                            <!-- Streamed content will appear here -->
                        </p>
                    </div>
                    <span class="block text-xs mt-1 text-gray-400 text-left">
                        AI
                    </span>
                </div>
            </div>
        @endif
    </div>

    <!-- Chat Input -->
    <div class="border-t border-gray-700 pt-2">
        <form wire:submit.prevent="send" class="flex space-x-2">
            <input type="text"
                   wire:model.defer="input"
                   placeholder="Ask something..."
                   class="w-full rounded-lg border border-gray-700 bg-gray-800 text-gray-200 placeholder-gray-500 p-2 text-sm shadow focus:ring-indigo-500 focus:border-indigo-500"
                   required />
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg px-4 text-sm shadow transition"
            >
                Send
            </button>
        </form>
    </div>

    <!-- Todo List -->
    <div class="mt-4 bg-gray-800 rounded-lg p-3">
        <h3 class="text-lg font-medium mb-2">Your Todos</h3>
        <div class="space-y-2">
            @foreach($todos as $index => $todo)
                <div class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        wire:click="toggleTodo({{ $todo['id'] }})"
                        @checked($todo['completed'])
                        class="rounded text-indigo-600 focus:ring-indigo-500"
                    >
                    <span class="text-sm {{ $todo['completed'] ? 'line-through text-gray-500' : '' }}">
                        {{ $todo['title'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>
