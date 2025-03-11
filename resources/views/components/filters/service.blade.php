<!-- Форма фильтрации -->
<div class="mb-6">
    <form action="{{ route('services') }}" method="GET" class="flex space-x-4">
        <div>
            <label for="type" class="block text-gray-700">Класс</label>
            <select name="type" id="type" class="p-2 border rounded">
                <option value="">Выберите тип</option>
                <option value="VIP" {{ request('type') == 'VIP' ? 'selected' : '' }}>VIP</option>
                <option value="transfers" {{ request('type') == 'transfers' ? 'selected' : '' }}>transfer</option>
                <option value="rentals" {{ request('type') == 'rentals' ? 'selected' : '' }}>Аренда</option>
            </select>
        </div>
        <div class="flex items-end">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Фильтровать</button>
        </div>
    </form>
</div>
