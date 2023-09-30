<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title" style="letter-spacing: 1px">MANAGE EMPLOYEES</h4>
                    <div class="nk-block-des text-soft">
                        <p>Keep in mind that it is necessary to start with the Employee data.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card card-bordered" style="min-height: 420px">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <h2 style="font-size: 28px">Employee Registration form</h2>
                        <hr>
                        <?php
                        if(isset($_GET['s'])){
                            ?>
                            <div class="alert alert-success alert-dismissible alert-icon">
                                <em class="icon ni ni-check-circle"></em> <strong>Success</strong>! New Employee Added.<button class="close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php } ?>
                        <form method="POST" action="/employee-register">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="default-01">Complete Name <b
                                        style="color: red">*</b></label>
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-left">
                                        <em class="icon ni ni-users"></em>
                                    </div>
                                    <input type="text" name="inp_name" class="form-control" id="default-03"
                                        placeholder="Enter Employee Complete name here..">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="default-01">Department <b
                                                style="color: red">*</b></label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-home"></em>
                                            </div>
                                            <select name="inp_department" id="" class="form-control"
                                                style="letter-spacing: 1px;">
                                                <option value="" selected disabled>-- SELECT DEPARTMENT --
                                                </option>
                                                @php
                                                    use App\Models\Employees;
                                                    $employees = Employees::groupBy('e_department')
                                                        ->select('e_department')
                                                        ->get();
                                                @endphp

                                                @foreach ($employees as $employee)
                                                    <option>{{ $employee->e_department }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-01">Biometric ID <b
                                                style="color: red">*</b></label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-qr"></em>
                                            </div>
                                            <input type="text" name="inp_bioID" class="form-control" id="default-03"
                                                placeholder="Enter Biometric ID here..">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="default-01">Biometric Name <b
                                                style="color: red">*</b></label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-user-add"></em>
                                            </div>
                                            <input type="text" name="inp_bioName" class="form-control" id="default-03"
                                                placeholder="Enter Biometric name here..">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-">
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-wider btn-success">
                                        <em class="icon ni ni-check"></em>
                                        <span>Register Employee</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
