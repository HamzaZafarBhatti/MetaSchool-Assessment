@extends('user.layouts.app')
@section('styles')
@endsection

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add Todo</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Label:</label>
                                <input type="text" name="name" class="form-control" value="{{ $todo->name }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Deadline:</label>
                                <input type="datetime-local" name="deadline" class="form-control"
                                    value="{{ implode('T', explode(' ', $todo->deadline)) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Todo Status</option>
                                    <option value="0" {{ !$todo->status ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ $todo->status ? 'selected' : '' }}>Done</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea rows="5" cols="5" name="description"
                            class="form-control">{{ $todo->description }}</textarea>
                    </div>

                    <div class="text-right">
                        <a href="{{ route('dashboard') }}" type="button" class="btn btn-secondary">Back <i
                                class="icon-arrow-left8 ml-2"></i></a>
                        <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('scripts')
@endsection
