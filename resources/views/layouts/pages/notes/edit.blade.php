<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SecretNote | Create</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .form-card {
            background-color: #1a1a1a;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(255, 255, 255, 0.05);
        }

        .form-control {
            background-color: #2a2a2a;
            color: #fff;
            border: 1px solid #444;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: #000;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container py-4">
        <!-- Top bar: Back and Logout -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('notes.index')}}" class="btn btn-outline-light btn-sm">&larr; Back to Notes</a>

            <form action="/logout" method="POST" class="mb-0">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
            </form>
        </div>

        <div class="form-card p-4">
            <h3 class="mb-4">Edit Note</h3>

            <form method="POST" action="{{ route('notes.update', $note->id) }}" class="needs-validation">
                <!-- For Laravel, add: @csrf -->
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $note->title) }}"
                        placeholder="Enter note title" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="8"
                        placeholder="Type your note here..." required>{{ old('content', $note->content) }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Save Note</button>
                    <a href="{{ route('notes.index') }}" class="btn btn-outline-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
