@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$Complaint->late}},{{$Complaint->long}}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
  <img class="card-img-top" src="{{asset('img/'.$Complaint->img)}}" alt="Card image cap">
  <div class="card-body">
  <p>{{$Complaint->description}}</p>
</div>
</div>
</div>
</div>
</div>
@endsection