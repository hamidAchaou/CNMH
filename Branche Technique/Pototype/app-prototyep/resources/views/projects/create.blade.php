@extends('layouts.app')

@section('title', 'HomePage')
    
@section('content')
<section class="w-75 w-md-75 w-sm-100 container">
    <div class="container-fluid">
        <!-- Project Form -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Project</h3>
            </div>
            <div class="card-body">
                    <form action="{{ route('projects.store')}}" method="post">
                        @csrf
                    
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control @error('Name') is-invalid @enderror" id="Name" name="Name" placeholder="Enter project name" value="{{ old('Name')}}" >
                        @error('Name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Enter project description" >
                            {{ old('description')}}
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate" value="{{ old('startDate')}}" >
                        @error('startDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control @error('endDate') is-invalid @enderror" id="endDate" name="endDate" value="{{ old('endDate')}}" >
                        @error('endDate')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary text-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection