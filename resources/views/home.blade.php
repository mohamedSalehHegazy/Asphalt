@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                <!-- Admin View -->
                @if(auth()->user()->hasRole('admin'))
                <div class="section-body">
            <div class="container-fluid">
             <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Time</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                          
                                <tbody>
                                    
                                      @if (count($complaints)==0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Complaints on cart</td>
                                        </tr>
                                    @else
                                    @foreach ($complaints as $complaint)

                                        <tr>
                                            <td>{{$complaint->id}}</td>
                                            <td>{{$complaint->created_at}}</td>
                                            <td>
                                            
                                            <div class="col-8">
                                            <div class="row">
                                            <div class="col-md-4">
                                            <!-- Delete Button -->
                                            <form  method="post" action="{{url('complaint/'.$complaint->id)}}"
                                            enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger ">Delete</button>
                                            </form>
                                            </div>
                                            <div class="col-md-4">
                                            <a href="{{url('complaint/'.$complaint->id)}}" class="btn btn-success">Show</i></a> 
                                            </div>
                                            </div>
                                            </div> 
                                            </td>
                                        </tr>
                                       
                                      @endforeach
                                      @endif
                                </tbody>
                            </table>                        
                        </div>
                    </div>                
                </div>
            </div>
        </div>
                @endif

                <!-- User View -->
                @if(auth()->user()->hasRole('user'))
                <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    @if (Session::has('success'))
                        {{Session::get('success')}}
                        @php
                            Session::forget('success');
                        @endphp
                    @endif
                    @if (count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="col-md-12 col-lg-12">
                        <form class="card" method="POST"  enctype="multipart/form-data" action="{{url('/complaint')}}">
                            @csrf
                            
                            <div class="card-body">
                                <h3>Add New Complaint </h3>
                                <hr /><br />
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label"> Complaints Description</label>
                                            <textarea rows="4" class="form-control" name="description" value=""></textarea>
                                        </div>
                                    </div>
                                   
                                    <div class=" col-12">
                                        <div class="form-group">
                                            <label class="form-label">Image</label>
                                            <input id="Upload" type="file" class="form-control" name="img" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <input type="hidden" name="user_id" value=" {{Auth::user()->id}}">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
