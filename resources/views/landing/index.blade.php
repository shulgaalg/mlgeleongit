<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('landing.create')}}">Create</a> 
        </h2>
    </x-slot>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                   <th>Id</th>
                    <th>Scroll Id</th>
                    <th>Order</th>
                    <th>Group Id</th>
                    <th></th>
                    <th></th>
            </tr>            
        </thead>
        <tbody>
            @if(!empty($landings))
            @if(count($landings))
                @foreach($landings as $landing)
                <tr>
                    
                    <td>
                        <a class="btn btn-link" href="{{route('landing.show',[$landing->id])}}">
                        {{$landing->id}}
                        </a>
                    </td>
                                      
                    <td><p class="bg-success">{{$landing->scrollId}}</p></td>                    
                                      
                    <td><p class="bg-success">{{$landing->order}}</p></td>                    
                    
                    <td><p class="bg-success">{{$landing->groupId}}</p></td>                    

                    <td>
                        <a class="btn btn-default" href="{{route('landing.edit',[$landing->id])}}">Edit</a>                        
  
                    </td>
                    <td>
                        <form method="post" action="{{route('landing.destroy',[$landing->id])}}">
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