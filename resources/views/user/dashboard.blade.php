@extends('user.layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        @include('user.partials.alerts')
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Todo List</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a type="button" class="btn btn-primary" href="{{ route('todos.create') }}">Add Todo <i
                                class="icon-add ml-2"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Todo Label</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$todos->isEmpty())
                            @foreach ($todos as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->deadline)->diffForHumans() }}</td>
                                    <td class="{{ $item->status ? 'text-success' : 'text-warning' }}">
                                        {{ $item->status ? 'Done' : 'Pending' }}</td>
                                    <td>
                                        @if ($item->user_id == auth()->user()->id)
                                            <div class="d-flex justify-content-start align-items center"
                                                style="gap: 0.5rem;">
                                                <a class="btn btn-info"
                                                    href="{{ route('todos.edit', $item->id) }}">Edit <i class="icon-pencil ml-2"></i></a>
                                                <form action="{{ route('todos.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete <i class="icon-trash ml-2"></i></button>
                                                </form>
                                            </div>
                                        @else
                                            <a class="btn btn-info"
                                                href="{{ route('todos.show', $item->id) }}">View <i class="icon-eye ml-2"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No todo found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('scripts')
@endsection
