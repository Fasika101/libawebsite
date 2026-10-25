<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in — Liba Digitals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #0B3015; min-height: 100vh; }
        .login-card { max-width: 420px; border: 0; border-radius: 1rem; }
        .btn-brand { background: #008A16; border-color: #008A16; color: #fff; }
        .btn-brand:hover { background: #0B3015; color: #fff; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center p-3">
    <div class="card login-card shadow w-100">
        <div class="card-body p-4 p-md-5">
            <p class="text-success fw-semibold mb-1">Liba Digitals</p>
            <h1 class="h3 mb-4">Admin sign in</h1>
            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input id="username" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" required autofocus>
                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button class="btn btn-brand w-100" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>
