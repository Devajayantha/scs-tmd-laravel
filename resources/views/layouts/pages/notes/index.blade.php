<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SecretNote | List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .table {
            color: #fff;
        }

        .table thead th {
            border-bottom: 2px solid #444;
        }

        .table tbody tr {
            border-bottom: 1px solid #333;
        }

        .btn-outline-light:hover {
            color: #000;
            background-color: #fff;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container py-4">
        <!-- Header with Logout -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-0">Welcome, <strong>{{ Auth::user()->name }}</strong></h5>
                <small class="text-muted">Manage your secret notes</small>
            </div>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>

        <!-- Title, Search, and Add New Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>My SecretNotes</h2>
            <div class="d-flex align-items-center">
                <form action="{{ route('notes.index') }}" method="GET" class="me-2">
                    <div class="input-group input-group-sm">
                        <input type="text" name="q" class="form-control" placeholder="Search notes..."
                            value="{{ request('q') }}">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </div>
                </form>
                <a href="{{ route('notes.create') }}" class="btn btn-success btn-sm">+ Add New Note</a>
            </div>
        </div>

        <!-- Flash Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Notes Table -->
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notes as $note)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $note->title }}</td>
                            <td>{{ Str::limit($note->content, 50) }}</td>
                            <td>{{ $note->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('notes.show', $note->id) }}"
                                    class="btn btn-outline-light btn-sm">View</a>
                                <a href="{{ route('notes.edit', $note->id) }}"
                                    class="btn btn-outline-light btn-sm">Edit</a>
                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No notes found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
