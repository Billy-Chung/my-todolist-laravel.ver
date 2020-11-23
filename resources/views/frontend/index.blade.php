@include('frontend.layouts.errors')
@extends('frontend.layouts.master')

@section('content')
    {{-- @php
    dd($todos);
    @endphp --}}


    <button type="button" c class="btn btn-primary mb-3" onclick="createTodo()" data-toggle="modal"
        data-target="#createModal">
        create
    </button>
    <ul class="list-group">

        @foreach ($todos as $value)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-auto mr-auto">
                        @if ($value->done)
                            <input style="vertical-align: middle;" type="checkbox" name="isDone" checked disabled>
                        @else
                            <input style="vertical-align: middle;" type="checkbox" name="isDone" disabled>
                        @endif
                        <h4 style="display: inline; vertical-align: middle;">
                            {{ $value->todo }}
                        </h4>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-success" onclick="completeTodo({{ $value->id }})"
                            data-toggle="modal" data-target="#completeModal">
                            complete
                        </button>

                        <button type="button" class="btn btn-warning"
                            onclick="editTodo({{ $value->id }},{{ $value->todo }})" data-toggle="modal"
                            data-target="#editModal">
                            edit
                        </button>

                        <button type="button" class="btn btn-danger" onclick="deleteTodo({{ $value->id }})"
                            data-toggle="modal" data-target="#deleteModal">
                            delete
                        </button>
                    </div>
                </div>
            </li>
        @endforeach
        <script>
            function createTodo() {
                /* debugger */
                let createUrl = 'create'
                $('#createModal').find('form').prop('action', createUrl);
                $('#createModal').modal('show');
            }

            function editTodo(id, todo) {
                /* debugger */
                let editUrl = `edit/${ id }`
                let oldTodo = todo
                $('#editModal').find('form').prop('action', editUrl);
                $('#editModal').find('input').prop('value', oldTodo);
                $('#editModal').modal('show');
            }

            function deleteTodo(id) {
                /* debugger */
                let deleteUrl = `delete/${ id }`
                $('#deleteModal').find('form').prop('action', deleteUrl);
                $('#deleteModal').modal('show');
            }

            function completeTodo(id) {
                let completeUrl = `complete/${ id }`;
                $('#completeModal').find('form').prop('action', completeUrl);
                $('#completeModal').modal('show');
            }

        </script>
        <div class="modal fade" id="createModal" aria-labelledby="createModallLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModallLabel">新增todo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" style="display: inline;">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="todo" name="todo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>

                            <button class="btn btn-danger" type="submit">Create</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" aria-labelledby="editModallLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModallLabel">修改todo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" style="display: inline;">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="todo" name="todo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>

                            <button class="btn btn-danger" type="submit">edit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">確定要刪除嗎?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        刪除後將無法復原，您確定要刪除嗎?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                        <form method="POST" style="display: inline;">
                            <button class="btn btn-danger" type="submit">delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="completeModal" aria-labelledby="completeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="completeModalLabel">確定要完成嗎?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        此操作將無法回朔，確定要變更完成狀態嗎?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">否</button>
                        <form action="{{ route('complete', [$value->id]) }} " method="POST" style="display: inline;">
                            <button class="btn btn-danger" type="submit">完成</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </ul>




@endsection
