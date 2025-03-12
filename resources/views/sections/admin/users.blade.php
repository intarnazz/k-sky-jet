<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Список зарегистрированных пользователей</h2>

    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Имя</th>
            <th class="px-4 py-2 border">Email</th>
            <th class="px-4 py-2 border">Дата регистрации</th>
            <th class="px-4 py-2 border">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr class="text-center">
                <td class="px-4 py-2 border">{{ $user->id }}</td>
                <td class="px-4 py-2 border">{{ $user->name }}</td>
                <td class="px-4 py-2 border">{{ $user->email }}</td>
                <td class="px-4 py-2 border">{{ $user->created_at->format('d.m.Y') }}</td>
                <td class="px-4 py-2 border">
                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
