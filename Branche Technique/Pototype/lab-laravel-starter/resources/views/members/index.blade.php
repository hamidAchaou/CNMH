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
                    <div class="col-sm-6 ">
                        <div class="float-sm-right">
                            <a href="{{ route('members.create') }}" class="btn btn-primary"><i
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
                                    {{-- search --}}
                                    <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                        <input type="hidden" id="pageNumber" value="1">
                                        <input type="text" id="inputSearch" name="inputSearch" class="form-control float-right"
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
                                {{-- table members --}}
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
                                        @include('members.data')

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{-- {{ $members->links() }} --}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // function fetch data
            function fetchData(page, searchValue) {
                $.ajax({
                    url: '/members?page=' + page + '&searchValue=' + searchValue,
                    success: function(data) {
                        $('tbody').html('');
                        $('tbody').html(data);
                        console.log(data)
                    },
                        error: function (xhr, status, error) {
                        console.error(error);
                    }
                })
            }

            $('body').on('keyup', '#inputSearch', function () {
                let page = $('#pageNumber').val();
                let searchValue = $('#inputSearch').val();

                console.log(page);
                fetchData(page, searchValue);
            })
        })
    </script>
@endsection
