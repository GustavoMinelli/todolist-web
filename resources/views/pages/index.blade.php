<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pages
        </h2>
    </x-slot>


     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid justify-items-end">
                        <x-href-button href="{{ route('pages.create') }}">Nova página</x-href-button>
                    </div>

                    @if (count($pages) > 0)

                        <div class="my-8 overflow-hidden">
                            <table class="w-full table-fixed border-collapse border-2">
                                <thead class="border-collapse border border-slate-400">
                                    <tr>
                                        <th class="border border-slate-300 border-b p-4 pb-3 pl-8 text-left font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Nome da página</th>
                                        <th class="border border-slate-300 border-b p-4 pb-3 pl-8 text-left font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Slug</th>
                                        <th class="border border-slate-300 border-b p-4 pb-3 pl-8 text-left font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Usuário</th>
                                        <th class="border-b p-4 pb-3 pl-8 text-left font-medium text-slate-400 dark:border-slate-600 dark:text-slate-200">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr>
                                        @foreach ($pages as $page)
                                            <x-generic-td>{{ $page->title }}</x-generic-td>
                                            <x-generic-td>{{ $page->slug }}</x-generic-td>
                                            <x-generic-td>{{ $page->user->name }}</x-generic-td>
                                            <x-generic-td class="flex gap-1">

                                                <form action="{{ route('pages.delete', $page->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{ $page->id }}">
                                                    <x-danger-button>Deletar</x-danger-button>
                                                </form>

                                                <x-href-button>Editar</x-href-button>
                                            </x-generic-td>
                                            
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="grid justify-items-end">
                            <x-href-button href="{{ route('pages.create') }}">Nova página</x-href-button>
                        </div>
                    @else

                        <div class="text-center">
                            <p class="text-gray-500">Nenhuma página cadastrada.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>