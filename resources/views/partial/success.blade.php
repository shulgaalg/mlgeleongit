@if (Session::has('flush_message') )
<div class="alert alert success">
    <p>{{Session::get('flush_message')}}</p>
</div>
@endif
