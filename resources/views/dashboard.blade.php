<x-app-layout>

        @for($i=0; $i<5; $i++)
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard').$i }}
        </h2>
        </x-slot>
        @endfor
        @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                      <div class="container">
                       
                    </div>
                </div>
            </div>
        </div>
        !!!

    </div>
 @show
</x-app-layout>
