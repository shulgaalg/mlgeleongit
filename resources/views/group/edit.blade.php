

<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('group.create')}}">Create</a> 
        </h2>
        
    </x-slot>

    <div class="container">
    @include('partial.error')
    <div class="row">
        <div >
            <form method="post" action="{{ route('group.update',[ $group->id]) }}" id="form1">
                {{csrf_field()}}
                {{ method_field('put')}}
                <div >
                    <label for="name">Name</label>
                    <input type="text"  id="name" name="name" value="{{$group->name}}">
                </div>
                <div >
                    <label for="nameHeader">Name Header</label>
                    <input type="text"  id="nameHeader" name="nameHeader" value="{{$group->nameHeader}}">
                </div>
                <div >
                    <label for="description">Description</label>
                    <input type="text"  id="description" name="description" value="{{$group->description}}" maxlength="500" >
                </div>
                    
                <input type="submit"   value="Submit">
            </form>
        </div>
    </div>
</div>

</x-app-layout>