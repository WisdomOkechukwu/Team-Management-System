@extends('layout.User_layout.layout')

@section('content')

<div class="col-xxl-8 mb-30">
    <div class="card card-statistics h-100 mb-0">
        <div class="card-header d-flex justify-content-between">
            <div class="card-heading">
                <h4 class="card-title">Teams</h4>
            </div>
            
        </div>
        <div class="card-body">
            <div class="max-h-600 scrollbar scroll_dark" style="height: 400px">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mb-0 table-borderless">
                        <thead class="bg-light">
                            <tr>
                                <th>Member </th>
                                <th>Task Name </th>
                                <th> Duration </th>
                                <th> Action  </th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                           
                                
                            
                            
                                @foreach ($MemberTask as $key)
                                <tr>
                                    @foreach ($Memebers as $keys)
                                        @if ($key->user_id == $keys->id)
                                        <td>  {{ $keys->name }} </td>
                                        @endif
                                    @endforeach
                                    <td> {{ $key->task_name }} </td>
                                    <td> {{ $key->created_at->diffForHumans() }} </td>
                                    <td> <a href="javascript:void(0)" 
                                        onclick="editStudent({{ $key->id }})" class="btn btn-info">Edit
                                        </a> 
                                        <a href="javascript:void(0)" 
                                        onclick="editStudent({{ $key->id }})" class="btn btn-danger">Delete
                                        </a> 
                                    </td>

                                </tr>
                                @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection