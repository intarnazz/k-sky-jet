<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Список дополнительных услуг</h2>

    <!-- Таблица с услугами -->
    <table class="min-w-full table-auto border-collapse border border-gray-300 mb-6">
        <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Название</th>
            <th class="px-4 py-2 border">Описание</th>
            <th class="px-4 py-2 border">Цена</th>
            <th class="px-4 py-2 border">Тип</th>
            <th class="px-4 py-2 border">Фото</th>
            <th class="px-4 py-2 border">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($services as $service)
            <tr class="text-center">
                <td class="px-4 py-2 border">{{ $service->id }}</td>
                <td class="px-4 py-2 border">{{ $service->name }}</td>
                <td class="px-4 py-2 border">{{ $service->description }}</td>
                <td class="px-4 py-2 border">{{ number_format($service->price, 2, ',', ' ') }} ₽</td>
                <td class="px-4 py-2 border">{{ $service->type }}</td>
                <td class="px-4 py-2 border">
                    @if ($service->image_id)
                        <img src="{{ route('image', ['image' => $service->image_id]) }}" alt="Фото" class="w-16 h-16 object-cover rounded">
                    @else
                        <span>Нет фото</span>
                    @endif
                </td>
                <td class="px-4 py-2 border">
                    <button class="text-blue-500 hover:underline edit-button" data-id="{{ $service->id }}">Редактировать</button>
                    <form action="{{ route('admin.service.delete', $service->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Удалить</button>
                    </form>
                </td>
            </tr>

            <!-- Форма редактирования услуги (скрыта по умолчанию) -->
            <tr id="edit-form-{{ $service->id }}" class="edit-form hidden">
                <td colspan="6" class="px-4 py-2 border bg-gray-100">
                    <form action="{{ route('admin.service.patch', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Название</label>
                            <input type="text" name="name" value="{{ $service->name }}" class="w-full px-4 py-2 border rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Описание</label>
                            <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-md" required>{{ $service->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Цена</label>
                            <input type="number" name="price" value="{{ $service->price }}" class="w-full px-4 py-2 border rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Тип услуги</label>
                            <select name="type" class="w-full px-4 py-2 border rounded-md" required>
                                <option value="VIP" @if($service->type == 'VIP') selected @endif>VIP</option>
                                <option value="transfers" @if($service->type == 'transfers') selected @endif>Transfers</option>
                                <option value="rentals" @if($service->type == 'rentals') selected @endif>Rentals</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Фото</label>
                            <input type="file" name="image" class="w-full px-4 py-2 border rounded-md" accept="image/*">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Сохранить изменения</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Форма для добавления новой услуги -->
    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Добавить новую услугу</h2>
        <form action="{{ route('admin.service.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Название</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Описание</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2 border rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Цена</label>
                <input type="number" name="price" class="w-full px-4 py-2 border rounded-md" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Тип услуги</label>
                <select name="type" class="w-full px-4 py-2 border rounded-md" required>
                    <option value="VIP">VIP</option>
                    <option value="transfers">Transfers</option>
                    <option value="rentals">Rentals</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Фото</label>
                <input type="file" name="image" class="w-full px-4 py-2 border rounded-md" accept="image/*">
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Добавить услугу</button>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            document.getElementById(`edit-form-${id}`).classList.toggle('hidden');
        });
    });
</script>
