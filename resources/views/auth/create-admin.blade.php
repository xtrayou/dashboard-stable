<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin Users - DISKOMINFO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --success-color: #059669;
            --danger-color: #dc2626;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            padding: 2rem 0;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            border: none;
            padding: 2rem;
        }

        .btn {
            border-radius: 10px;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            transform: translateY(-2px);
        }

        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            border: none;
            color: var(--primary-color);
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .alert-danger {
            background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .dev-warning {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #92400e;
            border-left: 4px solid #f59e0b;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-elements::before {
            width: 100px;
            height: 100px;
            top: 20%;
            right: 20%;
            animation-delay: -2s;
        }

        .floating-elements::after {
            width: 60px;
            height: 60px;
            bottom: 30%;
            left: 10%;
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>

<body>
    <div class="floating-elements"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Header Card -->
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <i class="fas fa-user-plus fa-3x mb-3"></i>
                        <h2 class="mb-0">Create Admin Users</h2>
                        <p class="mb-0 opacity-75">Development Tool - DISKOMINFO Purwakarta</p>
                    </div>
                </div>

                <!-- Development Warning -->
                <div class="dev-warning">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Development Environment Only</h5>
                            <p class="mb-0">This tool is only available in development mode and will be disabled in production.</p>
                        </div>
                    </div>
                </div>

                <!-- Results -->
                @if($success)
                <div class="alert alert-success">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Admin Users Created Successfully!</h5>
                            <p class="mb-0">{{ count($users) }} user accounts have been processed.</p>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-users me-2"></i>Created User Accounts
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <span class="badge bg-secondary">#{{ $user['id'] }}</span>
                                        </td>
                                        <td>
                                            <strong>{{ $user['name'] }}</strong>
                                        </td>
                                        <td>
                                            <code>{{ $user['email'] }}</code>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <code class="me-2">{{ $user['password'] }}</code>
                                                <button class="btn btn-sm btn-outline-secondary"
                                                    onclick="copyToClipboard('{{ $user['password'] }}')"
                                                    title="Copy password">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            @if($user['created'])
                                            <span class="badge bg-success">
                                                <i class="fas fa-plus me-1"></i>New
                                            </span>
                                            @else
                                            <span class="badge bg-info">
                                                <i class="fas fa-check me-1"></i>Existing
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('login') }}?email={{ $user['email'] }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-sign-in-alt me-1"></i>Login
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @elseif(isset($error))
                <div class="alert alert-danger">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Error Creating Users</h5>
                            <p class="mb-0">{{ $error }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Instructions Card -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>Usage Instructions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-primary">Default Admin Accounts</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <strong>Administrator:</strong><br>
                                        <code>admin@diskominfo.go.id</code> / <code>admin123</code>
                                    </li>
                                    <li class="mb-2">
                                        <strong>User Test:</strong><br>
                                        <code>user@diskominfo.go.id</code> / <code>password123</code>
                                    </li>
                                    <li class="mb-2">
                                        <strong>Operator:</strong><br>
                                        <code>operator@diskominfo.go.id</code> / <code>operator123</code>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-primary">Quick Actions</h6>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('login') }}" class="btn btn-primary">
                                        <i class="fas fa-sign-in-alt me-2"></i>Go to Login Page
                                    </a>
                                    <a href="{{ route('dashboard.index') }}" class="btn btn-info">
                                        <i class="fas fa-tachometer-alt me-2"></i>View Dashboard
                                    </a>
                                    <a href="{{ url('/') }}" class="btn btn-secondary">
                                        <i class="fas fa-home me-2"></i>Back to Home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Create temporary success message
                const toast = document.createElement('div');
                toast.className = 'toast align-items-center text-white bg-success border-0 position-fixed top-0 end-0 m-3';
                toast.style.zIndex = '9999';
                toast.innerHTML = `
                    <div class="d-flex">
                        <div class="toast-body">
                            Password copied to clipboard!
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                `;
                document.body.appendChild(toast);

                const bsToast = new bootstrap.Toast(toast);
                bsToast.show();

                // Remove toast after it's hidden
                toast.addEventListener('hidden.bs.toast', () => {
                    document.body.removeChild(toast);
                });
            }).catch(function() {
                alert('Password: ' + text);
            });
        }

        // Auto-reload every 30 seconds in development
        @if(app() - > environment('local'))
        setTimeout(() => {
            window.location.reload();
        }, 30000);
        @endif
    </script>
</body>

</html>