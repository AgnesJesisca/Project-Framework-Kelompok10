<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Bina Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #5e72e4, #825ee4);
            min-height: 100vh;
        }

        .login-card {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 40px rgba(0,0,0,.15);
        }

        .login-logo {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            background: #5e72e4;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: bold;
            margin: 0 auto 16px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 14px;
        }

        .btn-login {
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
        }

        .small-link {
            text-decoration: none;
            font-weight: 500;
        }

        .small-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5 col-lg-4">

        <div class="card login-card p-4">

            {{-- LOGO --}}
            <div class="login-logo">
                BD
            </div>

            <h4 class="text-center fw-bold mb-1">Bina Desa</h4>
            <p class="text-center text-muted mb-4">Silakan login untuk melanjutkan</p>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="you@email.com"
                           required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="••••••••"
                           required>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label small" for="remember">
                            Remember me
                        </label>
                    </div>

                    <a href="{{ route('auth.index') }}" class="small small-link text-primary">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100">
                    Login
                </button>
            </form>

        </div>

        <p class="text-center text-white-50 small mt-4">
            © {{ date('Y') }} Bina Desa
        </p>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
