<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Профиль пользователя</h2>

        <div class="flex items-center space-x-4">
            @if(auth()->user()->image_id)
                <img src="{{ route('image', ['image' => auth()->user()->image_id]) }}"
                     alt="Аватар" class="w-24 h-24 object-cover rounded-full border">
            @endif
            <div>
                <p class="text-lg"><strong>Логин:</strong> {{ auth()->user()->login }}</p>
                <p class="text-lg"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p class="text-lg"><strong>Телефон:</strong> {{ auth()->user()->phone }}</p>
            </div>
        </div>

        <div class="mt-6 flex space-x-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">
                    Выйти
                </button>
            </form>
        </div>
    </div>
</div>
