<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        /* Responsive tweaks for small screens */
        @media (max-width: 767px) {
            .table-responsive {
                font-size: 13px;
            }

            .table thead {
                display: none;
            }

            .table tbody td {
                display: block;
                width: 100%;
                text-align: right;
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #444;
            }

            .table tbody td:before {
                position: absolute;
                left: 10px;
                top: 10px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                text-align: left;
                content: attr(data-label);
            }

            .table tr {
                margin-bottom: 15px;
                display: block;
                border-bottom: 2px solid #333;
            }
        }

        /* Custom thead color */
        .table thead tr {
            background-color: #343a40 !important;
            /* dark gray */
        }

        .table thead th {
            color: #ffc107 !important;
            /* amber/yellow */
            border-color: #454d55 !important;
        }
    </style>
</head>

<body>

    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <!-- Display Notification Messages -->
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('error') }}
                </div>
                @endif

                <div class="card shadow mt-4">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0 text-center">Registered Users</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registered At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td data-label="Name">{{ $user->name }}</td>
                                    <td data-label="Email">{{ $user->email }}</td>
                                    <td data-label="Phone">{{ $user->phone }}</td>
                                    <td data-label="Registered At">{{ $user->created_at->format('M d, Y') }}</td>
                                    <td data-label="Actions">
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url('delete_user',$user->id) }}">Delete User</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>