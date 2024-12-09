<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f5f5f5; 
            margin-top: 20px;
        }
        .container {
            background-color: #e0e0e0; 
            padding: 20px;
            border-radius: 8px;
        }
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .card {
            width: 100%;
            max-width: 300px;
            background-color: #ffffff; 
            border: 1px solid #ddd; 
            border-radius: 8px;
        }
        .card-body {
            background-color: #f9f9f9; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">search</h1>

        <input type="text" id="search-input" class="form-control mb-3" placeholder="Search by name, department, or designation">

        <div id="users-cards" class="card-deck">
            @forelse($users as $user)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text"><strong>Department:</strong> {{ $user->department->name }}</p>
                        <p class="card-text"><strong>Designation:</strong> {{ $user->designation->name }}</p>
                        <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning w-100">
                    No users found
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#search-input').on('keyup', function () {
                const query = $(this).val();

                $.ajax({
                    url: '{{ route('users.search') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function (data) {
                        const cardsContainer = $('#users-cards');
                        cardsContainer.empty();

                        if (data.length > 0) {
                            data.forEach(user => {
                                cardsContainer.append(`
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">${user.name}</h5>
                                            <p class="card-text"><strong>Department:</strong> ${user.department.name}</p>
                                            <p class="card-text"><strong>Designation:</strong> ${user.designation.name}</p>
                                            <p class="card-text"><strong>Phone Number:</strong> ${user.phone_number}</p>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            cardsContainer.append('<div class="alert alert-warning w-100">No users found</div>');
                        }
                    },
                    error: function () {
                        alert('Error fetching data.');
                    }
                });
            });
        });
    </script>
</body>
</html>
