@extends('layout.Admin_layout.TeamCreation')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-statistics clients-contant">
            <div class="card-header">
                <div class="d-xxs-flex justify-content-between align-items-center">
                    <div class="card-heading">
                        <h4 class="card-title">Add Lead</h4>
                    </div>
                    
                </div>
            </div>
            <div class="card-body py-0 table-responsive">
                <table class="table clients-contant-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Employee Name</th>
                            
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($Members as $key)
                        @if ($key->Biz_id == auth()->user()->id)

                        <form action="{{ route('TeamLead') }}" method="POST">
                            @csrf
                        <tr>
                            <td>
                                <div  class="d-flex align-items-center">
                                    <div  class="bg-img mr-4">
                                        <img style="height: 50px;" src="{{ asset($key->image) }}" class="img-fluid" alt="Clients-01">
                                    </div>
                                    <p class="font-weight-bold">{{ $key->name }}</p>
                                </div>
                            </td>
                            <input type="hidden" name="team_id" value="{{ $Team }}" >
                            <input type="hidden" name="user_id" value="{{ $key->id }}" >
                            <input type="hidden" name="status" value="Lead" >
                            
                            
                            <td>
                                <button class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 ">
                                    <i class="ti ti-plus"></i></button>
                                
                            </td>
                        </tr>
                    </form>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>
        
</div>
@endsection