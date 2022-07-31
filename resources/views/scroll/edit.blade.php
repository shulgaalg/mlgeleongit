

<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('scroll.create')}}">Create</a> 
        </h2>
        
    </x-slot>

    <div class="container">
    @include('partial.error')
    <div class="row">
        <div >
            <form method="post" action="{{ route('scroll.update',[ $scroll->id]) }}" id="form1">
                {{csrf_field()}}
                {{ method_field('put')}}
                <div >
                    <label for="name">Name</label>
                    <input type="text"  id="name" name="name" value="{{$scroll->name}}">
                </div>
                <div >
                    <label for="html">Html0</label>
                    <input type="text"  id="html0" name="html0" value="{{$scroll->html}}" maxlength="500" >
                </div>
                <div width="300px">
                    <label for="html">Html</label>
                    <textarea form="form1" cols="100" rows="50" id="html" name="html" >{{$scroll->html}} </textarea>
                </div>
                
                <input type="submit"   value="Submit">
            </form>
        </div>
    </div>
</div>

</x-app-layout>