<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title page-title" style="letter-spacing: 1px">IMPORT ATTENDANCE DATA</h4>
                    <div class="nk-block-des text-soft">
                        <p>Keep in mind that it is necessary to start with the Employee data import</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card card-bordered" style="min-height: 450px">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="title nk-block-title">Attendance Logs</h5>
                                <p>You must need to import the necessary files. Example: (CLXK224760128_attlog.dat)</p>
                            </div>
                        </div>
                        <form id="uploadForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="file">
                                </div>
                                <div class="col-md-2">
                                    <button onclick="testing()" type="button" class="btn btn-block btn-primary">
                                        <em class="icon ni ni-upload"></em>
                                        &ensp; <b>IMPORT</b>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            function testing() {
                                var formData = new FormData($('#uploadForm')[0]);
                                $.ajax({
                                    type: 'POST',
                                    url: '/process-file',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(response) {
                                        $('#responseContainer').html(response);
                                        $('#notification').html(
                                            '<div class="alert alert-success alert-icon"> <em class="icon ni ni-check-circle"></em> <strong>Success!</strong> The employee Daily Time Records (DTR) can now be generated and checked. Thank you.</div>'
                                            );
                                    },
                                    error: function(msg) {
                                        console.warn(msg);
                                        $('#responseContainer').html('');
                                        $('#notification').html(
                                            '<div class="alert alert-danger alert-icon"> <em class="icon ni ni-info"></em> <strong>Invalid File. </strong>. Please Provide a valid file format. Thank you. Try again.</div>'
                                            );
                                    }
                                });
                            }
                        </script>
                        <hr>
                        <div id="notification"></div>

                        <table class="table table-tranx is-compact mt-3">
                            <thead>
                                <tr class="tb-tnx-head">
                                    <th class="tb-tnx-id"><span class="">#</span></th>
                                    <th class="tb-tnx-info">
                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                            <span>Employee Names</span>
                                        </span>
                                        <span class="tb-tnx-date d-md-inline-block d-none">
                                            <span class="d-md-none">Date</span>
                                            <span class="d-none d-md-block">
                                                <span>Date Logs</span>
                                                <span>Time Logs</span>
                                            </span>
                                        </span>
                                    </th>
                                    <th class="tb-tnx-amount">
                                        <span class="tb-tnx-total">Department</span>
                                        <span class="tb-tnx-status d-none d-md-inline-block">Results</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="responseContainer">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
