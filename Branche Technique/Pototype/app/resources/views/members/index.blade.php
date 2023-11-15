@extends('layouts.app')

@section('title', 'HomePage')

@section('content')
    <div class="container">
        <h2 class="py-2 container">{{ __('words.members_list') }}</h2>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="content">
            <div class="card container">
                <div class="d-flex card-header">
                    <div class="input-group mb-3 w-50">
                        <input type="text" class="form-control" placeholder="{{ __('words.search_placeholder') }}"
                            aria-label="{{ __('words.search_placeholder') }}" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                    <div class="w-50 d-flex flex-row-reverse form-group">
                        <a href="{{ route('members.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                            {{ __('words.new_members') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Table and Pagination -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('words.first_name') }}</th>
                                <th>{{ __('words.last_name') }}</th>
                                <th>{{ __('words.email') }}</th>
                                <th>{{ __('words.action') }}</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach ($members as $member)
                                <!-- Display members -->
                                <tr>
                                    <td>{{ $member->firstName }}</td>
                                    <td>{{ $member->lastName }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td class="d-flex">
<<<<<<< HEAD
                                        <button type="submit" class="btn btn-default  mr-2">
                                            <i class="fas fa-edit"></i>
=======
                                        {{-- btn edit Members --}}
                                        <a href="{{ route('members.edit', ['member' => $member->id]) }}" type="submit"
                                            class="btn btn-primary mr-2 text-primary">
                                            <i class="fas fa-edit"></i> {{ __('words.edit') }}
                                        </a>
                                        {{-- btn delete Members --}}
                                        <button type="button" class="btn btn-sm btn-default bg-danger"
                                            onclick="AddIdMember({{ $member->id }})" data-toggle="modal"
                                            data-target="#modalDeleteMember">
                                            <i class="fa-solid fa-trash"></i> {{ __('words.delete') }}
>>>>>>> 86c8191043df9f4e9fcd753e50885c753d0faa7d
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="d-flex flex-row-reverse pt-3" id="pagination-links">
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- modal Delete Tasks --}}
    @component('components.projects.modal-delete-member')
    @endcomponent

    {{-- // Script for searching members --}}
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                let query = $(this).val();

                if (query.length >= 3) {
                    // Perform AJAX request to the search route using named route
                    $.ajax({
                        url: '{{ route('members.search') }}',
                        method: 'GET',
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}' // Add the _token parameter
                        },
                        success: function(data) {
                            // Update the search results container
                            displaySearchResults(data);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', xhr.responseText);
                        }
                        console.log('data'); // Fix the typo here
                    });
                } else {
                    // Clear the search results container if the input is less than 3 characters
                    $('#searchResults').empty();
                }
            });

            // Function to display search results
            function displaySearchResults(results) {
                console.log(results); // Fix the typo here

                let resultsContainer = $('#searchResults');
                resultsContainer.empty();

                if (results.length > 0) {
                    $.each(results, function(index, result) {
                        // Append the results to table rows
                        resultsContainer.append('<tr>' +
                            '<td>' + result.firstName + '</td>' +
                            '<td>' + result.lastName + '</td>' +
                            '<td>' + result.email + '</td>' +
                            '<td class="d-flex">' +
                            '<button type="submit" class="btn btn-primary mr-2 text-primary">' +
                            '<i class="fas fa-edit"></i>' +
                            '</button>' +
                            '<button type="submit" class="btn btn-danger mr-2 text-danger">' +
                            '<i class="fas fa-trash-alt"></i>' +
                            '</button>' +
                            '</td>' +
                            '</tr>');
                    });
                } else {
                    resultsContainer.append('<tr><td colspan="4">No results found</td></tr>');
                }
            }
        });
    </script>


@endsection
