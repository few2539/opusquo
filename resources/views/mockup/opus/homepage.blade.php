@extends('mockup.opus.layouts.master')

@section('content')
  @foreach($data as $key=>$value)
    @include('mockup.opus.templates.'.$value['template_name'], ['data' => $value])
  @endforeach
@endsection