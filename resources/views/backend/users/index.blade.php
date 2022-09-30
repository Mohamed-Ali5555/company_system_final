@extends('backend.layouts.master')
@section('content')
    <div class="main-panel">
        <div class="main-content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Zero configuration table -->
                    <section id="configuration">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title-wrap bar-success">
                                            <h4 class="card-title">Users Information</h4>
                                        </div>
                                    </div>
                                    <div class="card-body collapse show">
                                        <div class="card-block card-dashboard">
                                            <p class="card-text">DataTables has most features enabled by default,
                                                so all you need to do to use it with your own ables is to call the
                                                construction</p>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                                        <label>Show
                                                            <select name="DataTables_Table_0_length"
                                                                aria-controls="DataTables_Table_0"
                                                                class="form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">
                                                                    100</option>
                                                            </select> </label></div>
                                                </div>
                                                <div class="col-lg-1"></div>
                                                <div class="col-sm-12 col-md-3">
                                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                                        <label>Search:<input type="search"
                                                                class="form-control form-control-sm" placeholder=""
                                                                aria-controls="DataTables_Table_0"></label></div>
                                                </div>
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-3"><button id="addRow" class="btn btn-primary mb-2">
                                                        <i class="ft-plus"></i>&nbsp;
                                                        <a href="{{ route('users.create') }}"> Add new User</a></button></div>
                                            </div>


                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success">
                                                    <p>{{ $message }}</p>
                                                </div>
                                            @endif

                                            <table class="table table-striped table-bordered zero-configuration">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>status</th>
                                                    <th>Roles</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                                @foreach ($data as $key => $user)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @if ($user->status == 'active')
                                                                <span class="label text-success d-flex">
                                                                    <div class="dot-label bg-success ml-1"></div>
                                                                    {{ $user->status }}
                                                                </span>
                                                            @else
                                                                <span class="label text-danger d-flex">
                                                                    <div class="dot-label bg-danger ml-1"></div>
                                                                    {{ $user->status }}
                                                                </span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if (!empty($user->getRoleNames()))
                                                                @foreach ($user->getRoleNames() as $v)
                                                                    <label
                                                                        class="badge badge-success">{{ $v }}</label>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-info"
                                                                href="#">Show</a>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>


                                            {!! $data->render() !!}

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>

        <footer class="footer footer-static footer-light">
            <p class="clearfix text-muted text-center px-2"><span>Copyright &copy; 2021 <a href="#" id="pixinventLink"
                        target="_blank" class="text-bold-800 primary darken-2">Pioneer solutions </a>, All rights reserved.
                </span></p>
        </footer>

    </div>



@endsection
