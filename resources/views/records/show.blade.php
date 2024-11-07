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
            <div class="pb-4 flex justify-between">
              <label for="table-search" class="sr-only">Поиск</label>
              <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                </div>
                <input type="text" id="table-search"
                  class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Поиск...">
              </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              @if(!$fields)
          <p>Записи отсутствуют.</p>
        @else
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="p-4">
          <div class="flex items-center">
            <input id="checkbox-all-search" type="checkbox"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-all-search" class="sr-only">checkbox</label>
          </div>
          </th>
          <th scope="col" class="px-6 py-3">
          Тип звонка
          </th>
          <th scope="col" class="px-6 py-3">
          Входящий номер
          </th>
          <th scope="col" class="px-6 py-3">
          Исходящий номер
          </th>
          <th scope="col" class="px-6 py-3">
          Дата
          </th>
          <th scope="col" class="px-6 py-3">
          Время звонка
          </th>
          <th scope="col" class="px-6 py-3">
          Прослушать
          </th>
          <th scope="col" class="px-6 py-3">
          Действия
          </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($fields as $field)
      <tr
        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
        <div class="flex items-center">
        <input id="checkbox-table-search-1" type="checkbox"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
        </td>
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $field['type'] }}
        </th>
        <td class="px-6 py-4">
        {{ $field['in_number'] }}
        </td>
        <td class="px-6 py-4">
        {{ $field['out_number'] }}
        </td>
        <td class="px-6 py-4">
        {{ $field['date'] }}
        </td>
        <td class="px-6 py-4">
        {{ $field['time'] }}
        </td>
        <td class="px-6 py-4">
        <audio controls>
        <source src="{{ route('records.stream', ['file' => $field['full_path']]) }}" type="audio/mpeg">
        </audio>
        </td>
        <td class="px-6 py-4 flex">
        <form class="flex" action="{{ route('records.download') }}" method="POST">
        @csrf
        <input hidden class="w-full bg-transparent font-medium text-sm text-gray-700 dark:text-gray-300"
        for="full_path" name="full_path" value="{{ $field['full_path'] }}"></input>
        <x-primary-button class="mt-2">{{ __('Скачать') }}</x-primary-button>
        </form>
        </td>
      </tr>
    @endforeach
    @endif
              </tbody>
            </table>
          </div>
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
  </div>
  </div>
</x-app-layout>