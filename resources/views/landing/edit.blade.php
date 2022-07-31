<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-default" href="{{route('landing.create')}}">Create</a>
        </h2>

    </x-slot>

    <div class="container">
        @include('partial.error')
        <div class="row">
            <div>
                <form method="post" action="{{ route('landing.update',[ $landing->id ]) }}" id="form1">
                    {{csrf_field()}}
                    {{ method_field('put')}}
                    <div class="form-landing">
                        <label for="scrollId">Scroll</label>
                        @isset($scrolls)
                        @if(count($scrolls))
                        <select form="form1" name="scrollId" size="1">
                            @foreach($scrolls as $scroll)
                            @if($scroll->name==$scrollName)
                                <option selected>{{$scroll->name}}</option>
                            @else
                                 <option>{{$scroll->name}}</option>
                            @endif    
                            
                            @endforeach
                        </select>
                        @endif
                        @endisset
                        @if(!count($scrolls))
                        <input type="text" value="No Scrolls!" class="form-control" id="scrollId" name="scrollId" readonly>
                        @endif
                    </div>
                    <div>
                        <label for="order">Order</label>
                        <input type="text" id="order" name="order" value="{{$landing->order}}">
                    </div>
<div class="form-landing">
                        <label for="scrollId">Scroll</label>
                        @isset($groups)
                        @if(count($groups))
                        <select form="form1" name="groupId" size="1">
                            @foreach($groups as $group)
                            @if($group->name==$groupName)
                                <option selected>{{$group->name}}</option>
                            @else
                                 <option>{{$group->name}}</option>
                            @endif    
                            
                            @endforeach
                        </select>
                        @endif
                        @endisset
                        @if(!count($groups))
                        <input type="text" value="No Group!" class="form-control" id="groupId" name="groupId" readonly>
                        @endif

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

</x-app-layout>