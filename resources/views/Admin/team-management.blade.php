@extends('layout.Admin_layout.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-statistics clients-contant">
            <div class="card-header">
                <div class="d-xxs-flex justify-content-between align-items-center">
                    <div class="card-heading">
                        <h4 class="card-title">Team Management</h4>
                    </div>
                    
                </div>
            </div>
            <div class="card-body py-0 table-responsive">
                <table class="table clients-contant-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Team Name</th>
                            
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Teams as $key)
                            
                        
                        <form action="{{ route('EditMember') }}" method="POST">
                            @csrf
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    
                                    <p class="font-weight-bold"><a href="#">{{ $key->team_name }}</a></p>
                                </div>
                            </td>
                            <input type="hidden" name="team" value="{{ $key->id }}">
                            <td>
                                <button type="submit" name="action" value="edit" class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 ">
                                    <i class="ti ti-pencil"></i></button>
                                <Button type="submit" name="action" value="delete" class="btn btn-icon btn-outline-danger btn-round mr-2 mb-2 mb-sm-0 ">
                                    <i class="ti ti-close"></i></Button>
                                
                            </td>
                        </tr>
                    </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>
        
</div>
@endsection