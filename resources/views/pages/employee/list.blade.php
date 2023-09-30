<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title" style="letter-spacing: 1px">MANAGE EMPLOYEE</h4>
                    <div class="nk-block-des text-soft">
                        <p>Manage Employee Attendance Data.</p>
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
                                    <th class="text-center">Department</th>
                                    <th class="text-center">Biometric ID</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Employees;
                                    $employees = Employees::all();
                                @endphp

                                @foreach ($employees as $employee)
                                    <tr class="text-dark">
                                        <td>{{ $employee->e_id }}.</td>
                                        <td>{{ $employee->e_name }}</td>
                                        <td class="text-center">{{ $employee->e_department }}</td>
                                        <td class="text-center"><b>{{ $employee->e_bioID }}</b></td>
                                        @if ($employee->e_status == 'active')
                                            <td class="text-center"><span
                                                    class="badge badge-dot bg-success">ACTIVE</span></td>
                                        @else
                                            <td class="text-center"><span
                                                    class="badge badge-dot bg-danger">INACTIVE</span></td>
                                        @endif
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
