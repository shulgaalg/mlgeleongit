<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('scroll.create')}}">Create</a> 
        </h2>
    </x-slot>

    <div class="container">
    <h2>{{$scroll->name}}</h2>
    <p>{{$scroll->description}}</p>
    <p>{{$scroll->header}}</p>
    <p>{{$scroll->offer}}</p>
    <p>{{$scroll->imagepath}}</p>
    <p>{{$scroll->html}}</p>
    <p>{{$scroll->typeScroll}}</p>
</div>

    
</x-app-layout>