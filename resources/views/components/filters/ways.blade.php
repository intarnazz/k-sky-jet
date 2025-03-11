<!-- Форма фильтрации -->
<div class="mb-6">
    <form action="{{ route('ways') }}" method="GET" class="flex space-x-4">
        <!-- Фильтр по цене -->
        <div>
            <label for="price" class="block text-gray-700">Цена</label>
            <input type="number" id="price" name="price" value="{{ request('price') }}"
                   class="p-2 border rounded" placeholder="Цена">
        </div>

        <!-- Фильтр по дате вылета -->
        <div>
            <label for="departure_time" class="block text-gray-700">Дата вылета</label>
            <input type="date" id="departure_time" name="departure_time" value="{{ request('departure_time') }}"
                   class="p-2 border rounded">
        </div>

        <!-- Фильтр по классу -->
        <div>
            <label for="class" class="block text-gray-700">Класс</label>
            <select name="class" id="class" class="p-2 border rounded">
                <option value="">Выберите класс</option>
                <option value="economy" {{ request('class') == 'economy' ? 'selected' : '' }}>Эконом</option>
                <option value="business" {{ request('class') == 'business' ? 'selected' : '' }}>Бизнес</option>
                <option value="first" {{ request('class') == 'first' ? 'selected' : '' }}>Первый</option>
            </select>
        </div>

        <div class="flex items-end">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Фильтровать</button>
        </div>
    </form>
</div>
