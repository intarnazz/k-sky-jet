<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-700">Авторизация</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('auth.login') }}">
            @csrf
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"/>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Пароль</label>
                <input type="password" name="password" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"/>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Войти
                </button>
            </div>
        </form>
    </div>
</div>
