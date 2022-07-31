<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('scroll.create')}}">Create</a> 
        </h2>
    </x-slot>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                   <th>Id</th>
                    <th>Name</th>
                    <th>header</th>
                    <th>Offer</th>
                    <th>description</th>
                    <th>typeScroll</th>
                    <th>formId</th>
                    <th>Imagepath</th>
                    <th>html</th>
                    <th></th>
            </tr>            
        </thead>
        <tbody>
            @if(!empty($Scrolls))
            @if(count($Scrolls))
                @foreach($Scrolls as $Scroll)
                <tr>
                    <td>{{$Scroll->id}}</td>
                    <td>
                        <a class="btn btn-link" href="{{route('scroll.show',[$Scroll->id])}}">
                        {{$Scroll->name}}
                        </a>
                    </td>                  
                    <td><p class="bg-success">{{$Scroll->header}}</p></td>                    
                    <td><p class="bg-success">{{$Scroll->Offer}}</p></td>
                    <td><p class="bg-success">{{$Scroll->description}}</p></td>                    
                    <td><p class="bg-success">{{$Scroll->typeScroll}}</p></td>
                    <td><p class="bg-success">{{$Scroll->formId}}</p></td>                    
                    <td><p class="bg-success">{{$Scroll->Imagepath}}</p></td>
                    <td><p class="bg-success">{{$Scroll->html}}</p></td>
                    <td>
                    
                        <a class="btn btn-default" href="{{route('scroll.edit',[$Scroll->id])}}">Edit</a>                        
  
                    </td>
                    <td>
                        <form method="post" action="{{route('scroll.destroy',[$Scroll->id])}}">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                                            
                    </td>
                </tr>
                @endforeach
                @endif
                @endif
        </tbody>
 
    </table>
 
</div>
 
</x-app-layout>