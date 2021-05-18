@extends('layout.Admin_layout.layout')

@section('content')
<div class="page-title mb-2 mb-sm-0" >
    <h1 style="margin-bottom: 20px;">{{ $Name }}
        <a class="btn btn-primary" href="/Members/{{ $Name }}" >
            Add New Team Member
        </a></h1>
    
</div>
<div class="row widget-social">
                            
    <!--Here  -->
    
    @foreach ($Users as $key)
        
    
    <div class="col-xl-4 col-md-6">
        <div class="card card-statistics widget-social-box6">
            <form method="POST" action="{{ route('LeadPost') }}">
                @csrf
                <div class="card-body">
                    <div class="text-center widget-social-contant pt-4">
                        <div class="bg-img m-auto"><img style="height: 68px;" class="img-fluid" src="{{ asset($key->image) }}" alt="socialwidget-img"></div>
                        <div class="p-3">
                            <input type="hidden" name="user_id" value="{{ $key->id }}">
                            <input type="hidden" name="name" value="{{ $Name }}">
                            
                            <h4 class="mb-1"><a href="javascript:void(0)">{{ $key->name }}</a></h4>
                                @foreach ($Status as $keys)
                                    @if ($keys->user_id == $key->id)
                                        <input type="hidden" name="team_id" value="{{ $keys->team_id }}">
                                        <p class="mb-0"><a href="javascript:void(0)">{{ $keys->status }}</a></p>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                    <ul class="nav justify-content-center pb-2">
                        
                    
                        <li class="nav-item">
                            <button type="submit" class="btn btn-icon btn-round btn-outline-success">
                                <i class="ti ti-plus"></i>
                            </button>
                        </li>
                        
                    </ul>
                </div>
            </form>
            
        </div>
    </div>

    @endforeach

    
    
    

    
</div>

@endsection