<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('group.create')}}">Create</a> 
        </h2>
    </x-slot>

    <div class="container">
    <h2>{{$group->name}}</h2>    
    <p>{{$group->nameHeader}}</p>
    <p>{{$group->description}}</p>
</div>

    
</x-app-layout>