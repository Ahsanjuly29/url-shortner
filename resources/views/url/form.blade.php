    @extends('master')
    @section('main-content')
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <form action="{{ route('urls.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="text-light form-label">Long Url</label>
                            <input type="text" class="form-control" name="long_url" placeholder="Enter URL to shorten"
                                required>

                            @if ($errors->has('long_url'))
                                <div class="error text-danger">
                                    <b>
                                        {{ $errors->first('long_url') }}
                                    </b>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">Shorten URL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (session()->has('data'))
            <div class="container mt-4">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 border border-danger" style="overflow-x: scroll;">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="text-light form-label">Long Url</label><br>
                            <a class="btn btn-light" href="{{ session()->get('data')['longUrl'] }}" target="_blank">
                                {{ session()->get('data')['longUrl'] }}
                            </a>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="text-light form-label">Shortened Url</label> <br>
                            <a class="btn btn-light" href="{{ session()->get('data')['shortUrl'] }}" target="_blank">
                                {{ session()->get('data')['shortUrl'] }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
