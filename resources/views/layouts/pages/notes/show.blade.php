<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SecretNote | Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .note-card {
            background-color: #1a1a1a;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(255, 255, 255, 0.05);
        }

        .btn-outline-light:hover {
            color: #000;
            background-color: #fff;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }

        .note-meta {
            font-size: 0.9rem;
            color: #ccc;
        }
    </style>
</head>

<body>

    <div class="container py-4">
        <!-- Top bar: Back and Logout -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('notes.index') }}" class="btn btn-outline-light btn-sm">&larr; Back to Notes</a>

            <form action="/logout" method="POST" class="mb-0">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>

        <div class="note-card p-4">
            <h2 class="mb-3">Meeting Notes</h2>
            <p class="note-meta">{{ $note->created_at->format('d M Y') }} &middot; Last updated: {{ $note->updated_at->format('d M Y') }}</p>

            <hr class="text-secondary">

            <div class="mb-4">
                <p>
                    <strong>Title:</strong> {{ $note->title }}
                </p>
                <p>
                    <strong>Content:</strong> {{ $note->content }}
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-outline-warning">Edit</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
