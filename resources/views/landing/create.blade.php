<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-default" href="{{route('landing.create')}}">Create</a>
        </h2>
    </x-slot>
    <div class="container">
        @include('partial.error')
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <form method="post" action="{{ route('landing.store') }}" id="form1">
                    {{csrf_field()}}
                    <div class="form-landing">
                        <label for="scrollId">Scroll Id</label>
                        @isset($scrolls)
                        @if(count($scrolls))
                        <select form="form1" name="scrollId" size="1">
                            @foreach($scrolls as $scroll)
                            <option>{{$scroll->name}}</option>
                            @endforeach
                        </select>
                        @endif
                        @endisset
                        @if(!count($scrolls))
                        <input type="text" value="No Scrolls!" class="form-control" id="scrollId" name="scrollId" readonly>
                        @endif
                    </div>
                    <div class="form-landing">
                        <label for="order">Order</label>
                        <input type="text" class="form-control" id="order" name="order">
                    </div>
                    <div class="form-landing">
                        <label for="groupId">Group Id</label>
                        @isset($groups)
                        @if(count($groups))
                        <select form="form1" name="groupId" size="1">
                            @foreach($groups as $group)
                            <option>{{$group->name}}</option>
                            @endforeach
                        </select>
                        @endif
                        @endisset
                        @if(!count($groups))
                        <input type="text" value="No Groups!" class="form-control" id="groupId" name="groupId" readonly>
                        @endif

                    <input type="submit" class="btn btn-success" value="Submit">
                </form>
            </div>
        </div>
    </div>

</x-app-layout>