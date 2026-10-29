<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') — Liba Digitals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --forest: #0B3015;
            --brand: #008A16;
            --canvas: #F5F7F2;
        }
        body { background: var(--canvas); color: #202720; }
        .admin-sidebar {
            background: var(--forest);
            min-height: 100vh;
            width: 250px;
        }
        .admin-sidebar a {
            color: rgba(255,255,255,.82);
            border-radius: .5rem;
            text-decoration: none;
        }
        .admin-sidebar a:hover,
        .admin-sidebar a.active {
            background: rgba(255,255,255,.08);
            color: #fff;
        }
        .brand-mark { color: #76D88B; letter-spacing: .04em; }
        .btn-brand { background: var(--brand); border-color: var(--brand); color: #fff; }
        .btn-brand:hover { background: var(--forest); border-color: var(--forest); color: #fff; }
        .stat-card { border: 0; border-radius: .75rem; }
        .content-wrap { min-width: 0; }
        @media (max-width: 991.98px) {
            .admin-sidebar { width: 100%; min-height: auto; }
        }
    </style>
</head>
<body>
<div class="d-flex flex-column flex-lg-row">
    <aside class="admin-sidebar p-3">
        <a href="{{ route('dashboard') }}" class="d-block text-white text-decoration-none mb-4 px-2">
            <div class="fw-bold fs-5">Liba Digitals</div>
            <div class="brand-mark small">Admin</div>
        </a>
        <nav class="nav flex-column gap-1">
            <a class="nav-link px-3 py-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-grid me-2"></i>Overview</a>
            <a class="nav-link px-3 py-2 {{ request()->routeIs('contacts.*') ? 'active' : '' }}" href="{{ route('contacts.index') }}"><i class="bi bi-inbox me-2"></i>Contact inbox</a>
            <a class="nav-link px-3 py-2 {{ request()->routeIs('contact-boxes.*') ? 'active' : '' }}" href="{{ route('contact-boxes.edit') }}"><i class="bi bi-telephone me-2"></i>Contact boxes</a>
            <a class="nav-link px-3 py-2 {{ request()->route('channel') === 'main' || (request()->routeIs('blog.edit') && optional(request()->route('post'))->channel !== 'travel') ? 'active' : '' }}" href="{{ route('blog.channel', 'main') }}"><i class="bi bi-journal-text me-2"></i>Main blog</a>
            <a class="nav-link px-3 py-2 {{ request()->route('channel') === 'travel' || (request()->routeIs('blog.edit') && optional(request()->route('post'))->channel === 'travel') ? 'active' : '' }}" href="{{ route('blog.channel', 'travel') }}"><i class="bi bi-airplane me-2"></i>Travel blog</a>
            <a class="nav-link px-3 py-2 {{ request()->routeIs('visits.*') ? 'active' : '' }}" href="{{ route('visits.index') }}"><i class="bi bi-geo-alt me-2"></i>Visitors</a>
            <a class="nav-link px-3 py-2 {{ request()->routeIs('branding.*') ? 'active' : '' }}" href="{{ route('branding.edit') }}"><i class="bi bi-image me-2"></i>Logo and favicon</a>
            <a class="nav-link px-3 py-2" href="{{ config('liba.public_site_url') }}" target="_blank" rel="noopener"><i class="bi bi-box-arrow-up-right me-2"></i>View website</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-4 px-2">
            @csrf
            <button class="btn btn-outline-light btn-sm w-100" type="submit">Log out</button>
        </form>
    </aside>
    <div class="content-wrap flex-grow-1">
        <header class="bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
            <h1 class="h5 mb-0">@yield('heading')</h1>
            <span class="text-secondary small">{{ auth()->user()->full_name ?: auth()->user()->username }}</span>
        </header>
        <main class="p-4">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('form[enctype="multipart/form-data"]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            const inputs = Array.from(form.querySelectorAll('input[type="file"]')).filter(function (input) {
                return input.files && input.files.length > 0;
            });
            if (!inputs.length) {
                return;
            }
            event.preventDefault();
            Promise.all(inputs.map(function (input) {
                const file = input.files[0];
                if (file.size > 8 * 1024 * 1024) {
                    return Promise.reject(new Error('Use an image under 8 MB.'));
                }
                return new Promise(function (resolve, reject) {
                    const reader = new FileReader();
                    reader.onload = function () {
                        appendField(form, input.name + '_data', reader.result);
                        appendField(form, input.name + '_name', file.name);
                        resolve();
                    };
                    reader.onerror = function () {
                        reject(new Error('Could not read that image.'));
                    };
                    reader.readAsDataURL(file);
                });
            })).then(function () {
                inputs.forEach(function (input) {
                    input.value = '';
                });
                form.submit();
            }).catch(function (error) {
                window.alert(error.message || 'Could not read that image.');
            });
        });
    });

    function appendField(form, name, value) {
        let field = form.querySelector('input[type="hidden"][name="' + name + '"]');
        if (!field) {
            field = document.createElement('input');
            field.type = 'hidden';
            field.name = name;
            form.appendChild(field);
        }
        field.value = value;
    }
</script>
</body>
</html>
