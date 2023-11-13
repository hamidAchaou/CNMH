@extends('layouts.app')

@section('title', __('words.edit_task'))

@section('content')
    <div class="content">
        <div class="container-fluid py-4">
            <div class="card col-md-8 mx-auto">
                <div class="card-header text-center">
                    <h2 class="card-title">{{ __('words.modify_task') }}</h2>
                </div>
                <div class="card-body mt-4">
                    <form method="post" action="{{ route('update.task', ['id' => $task->id]) }}">
                        @csrf
                        @method('PUT') 
                        
                        <div class="form-group">
                            <label for="title">{{ __('words.title') }}</label>
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('name', $task->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="inputDescription">{{ __('words.description') }}</label>
                            <textarea name="description" id="inputDescription" class="form-control @error('description') is-invalid @enderror"
                                oninvalid="this.setCustomValidity('{{ __('words.add_field_please') }}')"
                                oninput="setCustomValidity('')">{{ old('description', $task->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary text-primary">{{ __('words.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-primary:hover {
            color: #fff !important;
        }
    </style>
@endsection
