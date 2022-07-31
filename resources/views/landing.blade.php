<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @if(!empty($scrolls))


        {!!$scrolls[0]->html!!}
  

    @if(count($scrolls)>1)

        @for($i=1;$i<count($scrolls);$i++) 

            {!!$scrolls[$i]->html!!}
   
            @endfor
 
    @endif
    @endif




</html>