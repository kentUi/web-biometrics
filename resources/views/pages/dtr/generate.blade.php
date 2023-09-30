<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title" style="letter-spacing: 1px"> DAILY TIME RECORDS</h4>
                    <div class="nk-block-des text-soft">
                        <p>Generate Daily Time Records (DTR) for Local Government Unit</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="row">
                <div class="col-md-7">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title text-center">.: Temporary Setting :.</h5>
                                        <img src="./assets/images/settings.jpg" alt="">
                                        <hr>
                                        <center>
                                            <a class="btn btn-outline-danger" target="_blank"
                                                href="./assets/images/settings.jpg">
                                                Expand Settings
                                            </a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <form action="/dtr" method="GET">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-home"></em>
                                        </div>
                                        <select name="d" id="" class="form-control"
                                            style="letter-spacing: 1px;">
                                            <option value="" selected disabled>-- SELECT DEPARTMENT --
                                            </option>
                                            @php
                                                use App\Models\Employees;
                                                $value = session('info');
                                            @endphp
                                            <?php
                                        if($value['department'] == "HRMO"){
                                           
                                            $employeesx = Employees::all()->groupBy('e_department');
                                            foreach ($employeesx as $employeeGroup) {
                                                $employee = $employeeGroup->first();
                                                echo "<option value='{$employee->e_department}'>{$employee->e_department}</option>";
                                            }
                                        }else{
                                        ?>
                                            <option value="{{ $value['department'] }}">{{ $value['department'] }}
                                            </option>
                                            <?php
                                        }
                                        ?>
                                        </select>

                                    </div>
                                    <input type="date" name="from" class="form-control mt-2">
                                    <input type="date" name="to" class="form-control mt-2">
                                    <button class="btn btn-lg mt-2 btn-block btn-primary">
                                        GENERATE DTR
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
