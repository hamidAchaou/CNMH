@extends('layouts.app')

{{-- @section('title', 'HomePage') --}}

@section('content')
    <div class="pt-3" style="min-height: 1302.4px;">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('words.members_title') }}</h1>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('error') }}.
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{ route('members.create') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus"></i>{{ __('words.add_member') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header col-md-12">
                                <div class=" p-0">
                                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                        <input type="text" name="table_search" class="form-control float-right"
                                            placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>{{ __('words.members_FirstName') }}</th>
                                            <th>{{ __('words.members_lasttName') }}</th>
                                            <th>{{ __('words.email') }}</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $member->firstName }}</td>
                                                <td>
                                                    {{ $member->lastName }}
                                                </td>
                                                <td>
                                                    {{ $member->email }}
                                                </td>
                                                <td>
                                                    {{-- btn edit --}}
                                                    <a href="{{ route('members.edit', ['member' => $member->id]) }}"
                                                        class="btn btn-sm btn-default">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    {{-- btn delete --}}
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        onclick="AddIdMembers({{ $member->id }})" data-toggle="modal"
                                                        data-target="#modalDeleteMember"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{ $members->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        {{-- modal Delete Tasks --}}
        @component('component.modal-delete-member')
        @endcomponent

    </div>
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
