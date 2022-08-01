<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 <a class="btn btn-default" href="{{route('group.create')}}">Create</a> 
        </h2>
    </x-slot>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                   <th>Id</th>
                    <th>Name</th>
                    <th>Header</th>
                    <th>Description</th>
            </tr>            
        </thead>
        <tbody>
            @if(!empty($Groups))
            @if(count($Groups))
                @foreach($Groups as $Group)
                <tr>
                    <td>{{$Group->id}}</td>
                    <td>
                        <a class="btn btn-link" href="{{route('group.show',[$Group->id])}}">
                        {{$Group->name}}
                        </a>
                    </td>
                    <td><p class="bg-success">{{$Group->nameHeader}}</p></td>                    
                    <td>                  
                    <td><p class="bg-success">{{$Group->description}}</p></td>                    
                    <td>
                    
                        <a class="btn btn-default" href="{{route('group.edit',[$Group->id])}}">Edit</a>                        
  
                    </td>
                    <td>
                        <form method="post" action="{{route('group.destroy',[$Group->id])}}">
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