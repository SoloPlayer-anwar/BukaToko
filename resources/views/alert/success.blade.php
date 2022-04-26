@if (session('status'))
<div class="alert alert-success alert=dismissible">
    <button type="submit" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session('status')}}
</div>

@endif
