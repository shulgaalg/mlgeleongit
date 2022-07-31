<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('group.create')}}">Create</a> 
        </h2>
    </x-slot><div class="container">
    @include('partial.error')
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <form method="post" action="{{ route('group.store') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="nameHeader">Name Header</label>
                    <input type="text" class="form-control" id="nameHeader" name="nameHeader">
                </div>             
                <div class="form-group">
                    <label for="event_date">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>

                <input type="submit" class="btn btn-success"  value="Submit">
            </form>
        </div>
    </div>
</div>
 
</x-app-layout>
