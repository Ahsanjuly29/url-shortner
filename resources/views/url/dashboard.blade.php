@extends('master')
@section('main-content')
    <div class="container mt-3">
        <h1 class="h2 text-white">Welcome -
            <span class="h1 text-danger">
                {{ auth()->user()->name }}
            </span>
        </h1>
        <p class="text-white">Your Created Links list:</p>

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="check_all_box" />
                            </div>
                        </th>
                        <th>Id</th>
                        <th>Long Url</th>
                        <th>Short Url</th>
                        <th>Clicks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $eachItem)
                        <tr>
                            <td class="text-center">
                                <div class="form-check">
                                    <input class="form-check-input checkitem" type="checkbox" value="{{ $eachItem->id }}"
                                        name="id" />
                                </div>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a href="{{ $eachItem->long_url }}">
                                    {{ $eachItem->long_url }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('urls.show', $eachItem->short_code) }}">
                                    {{ route('urls.show', $eachItem->short_code) }}
                                </a>
                            </td>
                            <td>{{ $eachItem->click_count }} </td>
                            <td>
                                <a class="btn btn-outline-danger delete-btn" data-id="{{ $eachItem->id }}"
                                    href="#">delete</a>
                            </td>
                        </tr>
                    @endforeach
                    @if ($eachItem->count() > 0)
                        <tr>
                            <td colspan="13">
                                <button id="multiple_delete_btn" class="btn btn-xs btn-danger mr-2 d-none" type="submit">
                                    Delete all
                                </button>

                                <form action="{{ route('urls.destroy') }}" method="post" id="delete_form">
                                    @csrf @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="pagination-area mt-15 mb-50">
            {{ $data->appends(Request::except('page'))->render() }}
        </div>
    </div>
@endsection
