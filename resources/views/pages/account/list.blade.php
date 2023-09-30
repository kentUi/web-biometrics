<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title" style="letter-spacing: 1px">MANAGE EMPLOYEE</h4>
                    <div class="nk-block-des text-soft">
                        <p>Employee management is the oversight and support that allows staff to fulfil their work duties</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card card-bordered" style="min-height: 450px">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Complete Name</th>
                                    <th class="text-left">Department</th>
                                    <th class="text-left">Username</th>
                                    <th class="text-left">Password</th>
                                    <th class="text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\User;
                                    $users = User::all();
                                @endphp

                                @foreach ($users as $user)
                                    <tr class="text-dark">
                                        <td>{{ $user->id }}.</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->department }}</td>
                                        <td>(<b class="text-danger">*******</b>)</td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-warning" href="btn">
                                                <span class="nk-menu-icon"><em
                                                        class="icon ni ni-edit-alt text-white"></em></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
