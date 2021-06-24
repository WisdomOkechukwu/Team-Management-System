@extends('layout.User_layout.layout')

@section('content')

<div class="col-xxl-8 mb-30">
    <div class="card card-statistics h-100 mb-0">
        <div class="card-header d-flex justify-content-between">
            <div class="card-heading">
                <h4 class="card-title">{{ $Name }} Tasks</h4>
            </div>
            
        </div>
        <div class="card-body">
            <div class="max-h-600 scrollbar scroll_dark" style="height: 400px">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mb-0 table-borderless">
                        <thead class="bg-light">
                            <tr>
                                
                                <th>Task Name </th>
                                <th> Duration </th>
                                <th> Action  </th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                           
                                
                            
                            
                                @foreach ($Task as $key)
                                <tr id ="teamid{{ $key->id }}">
                                    
                                    <td> {{ $key->task_name }} </td>
                                    <td> {{ $key->created_at->diffForHumans() }} </td>
                                    <td> <a href="javascript:void(0)" 
                                        onclick="editTask({{ $key->id }})" class="btn btn-info">Edit
                                        </a> 
                                        {{-- <a href="javascript:void(0)" 
                                        onclick="editStudent({{ $key->id }})" class="btn btn-danger">Delete
                                        </a>  --}}
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


            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#verticalCenter">Vew Modal</button>     --}}

<div class="modal fade" id="verticalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EditForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="firstname">Task Name</label>
                        <input type="text" class="form-control" id="name">
                    </div>
    
                    <div class="form-group">
                        <label for="lastname">Task Details</label>
                        <textarea class="form-control" name="details" id="details" cols="40" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editTask(id)
    {
        $.get('/EditTask/'+id,function(task){
            $("#id").val(task.id);
            $("#name").val(task.task_name);
            $("#details").val(task.task_detail);
            $("#verticalCenter").modal('toggle')

        })
    }
</script>

@endsection