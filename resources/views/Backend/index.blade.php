<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Simple Datatable Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- bootstrap5 dataTables css cdn -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
</head>

<body>
    <div class="container mt-4">
        <a href="{{ route('add') }}" class="btn btn-primary mb-3"> Add Product</a>
        <a class="btn btn-danger mb-3" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <button class="btn btn-warning mb-3" id="sortAscButton">Sort by Price (Asc)</button>
        <button class="btn btn-warning mb-3" id="sortDescButton">Sort by Price (Desc)</button>


        <table id="datatable" class="table">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $key => $data)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $data->name }}
                            <img width="50px" height="50px" class="m-1"
                                src="{{ asset('product/' . $data->image) }}" />
                        </td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->category->name }}</td>
                        <td>{{ $data->desc }}</td>
                        <td>
                            <a href="{{ route('edit', $data->id) }}" class="btn btn-primary mb-3">Edit</a>
                            <button class="btn btn-danger mb-3 delete-button"
                                data-id="{{ $data->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- bootstrap5 dataTables js cdn -->
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            var dataTable = $('#datatable').DataTable();
            // Sorting by Price in Ascending Order
            $('#sortAscButton').on('click', function() {
                dataTable.order([2, 'asc']).draw();
            });
            // Sorting by Price in Descending Order
            $('#sortDescButton').on('click', function() {
                dataTable.order([2, 'desc']).draw();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                const deleteButton = $(this); // Store the reference to the clicked button
                const productId = deleteButton.data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('delete') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": productId
                    },
                    dataType: 'json',
                    success: function(data) {
                        deleteButton.closest('tr').remove(); // Remove the closest row
                        console.log("deleted");
                    }
                });
            });
        });
    </script>
</body>
</html>
