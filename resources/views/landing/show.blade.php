<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('landing.create')}}">Create</a> 
        </h2>
    </x-slot>

    <div class="container">
    <h2>{{$landing->order}}</h2>
    <p>{{$groupName}}</p>
    <p>{{$scrollName}}</p>
</div>

    
</x-app-layout>