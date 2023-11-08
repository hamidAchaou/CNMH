@extends('layouts.app')

@section('title', 'HomePage')
    
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Project Form -->
            <div class="card col-md-8">
                <div class="card-header">
                    <h3 class="card-title">Edit Project</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title-task" name="title" placeholder="Enter task title" value="{{ $task->title }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description-task" name="description" rows="3" placeholder="Enter task description">{{ $task->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection