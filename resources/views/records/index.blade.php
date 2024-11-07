<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Управление записями') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ route('records.show') }}" method="GET" class="mt-6 space-y-6">
              @csrf

              <div class="mt-2">
                <p class="font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Выберите подразделение') }}</p>
                <select for="division_id" name="division_id"
                  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                  wire:model="Record">
                  @foreach ($divisions as $division)
            <option value={{ $division->path}}>{{ $division->name }}</option>
          @endforeach
                </select>
              </div>

              <div class="mt-2">
                <p class="font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('День') }}</p>
                <select for="day" name="day"
                  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                  wire:model="Record">
                  @for ($day = 1; $day <= 31; $day++)
            @if ($day >= 1 && $day <= 9)
        <option value={{'0' . $day}}>{{ '0' . $day }}</option>
      @else
    <option value={{$day}}>{{ $day }}</option>
  @endif
          @endfor
                </select>
              </div>

              <div class="mt-2">
                <p class="font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Месяц') }}</p>
                <select for="mounth" name="mounth"
                  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                  wire:model="Record">
                  @for ($mounth = 1; $mounth <= 12; $mounth++)
            @if ($mounth >= 1 && $mounth <= 9)
        <option value={{'0' . $mounth}}>{{ '0' . $mounth }}</option>
      @else
    <option value={{$mounth}}>{{ $mounth }}</option>
  @endif
          @endfor
                </select>
              </div>

              <div class="mt-2">
                <p class="font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Год') }}</p>
                <select for="year" name="year"
                  class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                  wire:model="Record">
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                </select>
              </div>
          </div>
          <x-input-error :messages="$errors->get('Record')" id="Record" class="mt-2" />
          <x-primary-button class="mt-4">{{ __('Найти') }}</x-primary-button>
        </div>
      </div>
      <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
        aria-label="Table navigation">
        <span
          class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Показано
          <span class="font-semibold text-gray-900 dark:text-white">1-10</span> Из <span
            class="font-semibold text-gray-900 dark:text-white">1000</span></span>
        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Назад</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
          </li>
          <li>
            <a href="#" aria-current="page"
              class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
          </li>
          <li>
            <a href="#"
              class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Вперед</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</x-app-layout>