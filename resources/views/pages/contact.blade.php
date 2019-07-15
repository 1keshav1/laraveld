@extends('layouts.app')

@section('content')

<h2>Contact Us <strong></strong></h2>

@if(count($persions))
<ul>
@foreach ($persions as $persion)

<li>Name: {{$persion}}</li>

@endforeach
</ul>

@endif

@endsection






@section('footer')
<script>
//alert('Hi');
</script>
{{-- @include('pages.post_view') --}}

@endsection
