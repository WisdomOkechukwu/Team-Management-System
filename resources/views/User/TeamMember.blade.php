@extends('layout.User_layout.layout')

@section('content')

            <div class="page-title mb-2 mb-sm-0" >
                <h1 style="margin-bottom: 20px;">{{ $Name }}</h1>
                
            </div>
            <div class="row">
                @foreach ($Member as $key)
                <div class="col-xl-4 col-sm-6">
                    <div class="card card-statistics employees-contant px-2">
                        <div class="card-body pb-5 pt-4">
                            <div class="text-center">
                                
                                <div class="pt-1 bg-img m-auto"><img style="height: 59px;" src="{{ asset($key->image) }}" class="img-fluid" alt="employees-img"></div>
                                <div class="mt-3 employees-contant-inner">
                                    <h4 class="mb-1">{{ $key->name }}</h4>
                                    <a href="mailto:{{ $key->email }}" class="mb-0 badge badge-pill badge-info-inverse px-3 py-2">{{ $key->email }}</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
                
            </div>
@endsection
