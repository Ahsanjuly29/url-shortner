@extends('master')

@section('main-content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- 1. Input Section -->
                <div class="card shadow-lg border-0 rounded-4 bg-dark text-white p-4 mb-4">
                    <div class="card-body">
                        <h2 class="text-center mb-4 font-semibold">Shorten Your Long URL</h2>
                        <form action="{{ route('urls.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label text-white/70">Paste your long link here</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-secondary border-0 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                            <path
                                                d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                            <path
                                                d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                                        </svg>
                                    </span>
                                    <input type="url"
                                        class="form-control bg-light border-0 shadow-none @error('long_url') is-invalid @enderror"
                                        name="long_url" placeholder="https://example.com/very-long-link" required
                                        value="{{ old('long_url') }}">
                                    <button type="submit" class="btn btn-danger px-4">Shorten Now</button>
                                </div>

                                @error('long_url')
                                    <div class="invalid-feedback d-block mt-2 font-semibold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 2. Result Section (Shown after successful shortening) -->
                @if (session()->has('data'))
                    <div class="card border-danger border-2 rounded-4 bg-dark text-white p-4 animate-fade-in">
                        <div class="card-body">
                            <h4 class="text-danger mb-4 font-semibold text-center">Success! Your link is ready.</h4>

                            <!-- Long URL Display -->
                            <div class="mb-4">
                                <label class="text-white/50 small text-uppercase">Original URL</label>
                                <div class="p-3 bg-secondary/20 rounded border border-white/10 text-truncate">
                                    <a href="{{ session()->get('data')['longUrl'] }}" target="_blank"
                                        class="text-white text-decoration-none">
                                        {{ session()->get('data')['longUrl'] }}
                                    </a>
                                </div>
                            </div>

                            <!-- Short URL Display with Copy Feature -->
                            <div class="mb-2">
                                <label class="text-white/50 small text-uppercase">Shortened URL</label>
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 text-dark font-bold"
                                        value="{{ session()->get('data')['shortUrl'] }}" id="shortUrlInput" readonly>
                                    <button class="btn btn-outline-danger" type="button" onclick="copyToClipboard()">
                                        Copy Link
                                    </button>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ session()->get('data')['shortUrl'] }}" target="_blank"
                                    class="btn btn-link text-danger text-decoration-none">
                                    Open in new tab &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- 3. Helper Script -->
    <script>
        function copyToClipboard() {
            var copyText = document.getElementById("shortUrlInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

            Swal.fire({
                icon: 'success',
                title: 'Copied!',
                text: 'Link copied to clipboard',
                showConfirmButton: false,
                timer: 1500,
                background: '#1a1a1a',
                color: '#fff'
            });
        }
    </script>

    <style>
        .bg-secondary\/20 {
            background-color: rgba(108, 117, 125, 0.2);
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-bold {
            font-weight: 700;
        }
    </style>
@endsection
