@extends('layout.Admin_layout.layout')

@section('content')
<div class="page-title mb-2 mb-sm-0" >
    <h1 style="margin-bottom: 20px;">Name 
        <a class="btn btn-primary" href="/Members/" >
            Add New Team Member
        </a></h1>
    
</div>
<div class="row widget-social">
                            
    <!--Here  -->
    
    
    <div class="col-xl-4 col-md-6">
        <div class="card card-statistics widget-social-box6">
            <form method="POST" action="{{ route('DeleteMemeber') }}">
                @csrf
                <div class="card-body">
                    <div class="text-center widget-social-contant pt-4">
                        <div class="bg-img m-auto"><img style="height: 68px;" class="img-fluid" src="{{ 'image' }}" alt="socialwidget-img"></div>
                        <div class="p-3">
                            
                            <h4 class="mb-1"><a href="javascript:void(0)">Name</a></h4>
                            
                            <p class="mb-0"><a href="javascript:void(0)">Status</a></p>
                            
                        </div>
                    </div>
                    <ul class="nav justify-content-center pb-2">
                        
                    
                        <li class="nav-item">
                            <button type="submit" class="btn btn-icon btn-round btn-outline-danger">
                                <i class="ti ti-close"></i>
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