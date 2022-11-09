<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('peminjams.create') }}" class="text-grey-900 hover:text-indigo-900">Create Data</a>

                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Foto
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Nama
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        NIK
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Alamat
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        HP
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($peminjams as $peminjam)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$peminjam->photo_id}}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{$peminjam->nama_peminjam}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$peminjam->ktp}}
                                    </td>
                                    <td class="py-4 px-6">
                                      {{$peminjam->alamat}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$peminjam->hp}}
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{route('peminjams.edit', $peminjam->id)}}" 
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form class="inline-block" action="{{ route('peminjams.destroy', $peminjam->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                                      value="Delete">
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>