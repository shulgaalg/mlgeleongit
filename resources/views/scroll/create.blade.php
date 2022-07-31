<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('scroll.create')}}">Create</a> 
        </h2>
    </x-slot><div class="container">
    @include('partial.error')
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <form method="post" action="{{ route('scroll.store') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="event_date">FormId</label>
                    <input type="text" class="form-control" id="formId" name="formId">
                </div>
                <div class="form-group">
                    <label for="event_date">Header</label>
                    <input type="text" class="form-control" id="header" name="header">
                </div>
                <div class="form-group">
                    <label for="event_date">Offer</label>
                    <input type="text" class="form-control" id="offer" name="offer">
                </div>
                <div class="form-group">
                    <label for="event_date">description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="event_date">Imagepath</label>
                    <input type="text" class="form-control" id="imagepath" name="imagepath">
                </div>
                <div class="form-group">
                    <label for="event_date">TypeScroll</label>
                    <input type="text" class="form-control" id="typeScroll" name="typeScroll">
                </div>
                <div class="form-group">
                    <label for="event_date">Html</label>
                    <input type="text" class="form-control" id="html" name="html">
                </div>
                
                <input type="submit" class="btn btn-success"  value="Submit">
            </form>
        </div>
    </div>
</div>
 
</x-app-layout>
