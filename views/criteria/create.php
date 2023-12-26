<?php
$pageTitle = "Criteria";
ob_start(); // Start buffering output
?>

<div class="row p-4">
   <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <div class="row my-4">
                        <div class="col-12">
                            <h5>Add New Criteria</h5>
                        </div>
                    </div>
                    <form action="/criteria/store" method="POST">
                        <div class="row gap-4">
                            <div class="col-12">
                                <label for="name" class="label mb-2">Criteria Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="col-12">
                                <label for="name" class="label mb-2">Criteria Weight</label>
                                <input type="number" class="form-control" id="weight" name="weight">
                            </div>
                            <div class="col-12">
                                <label for="name" class="label mb-2">Criteria Type</label>
                                <select name="type" class="form-control" id="type">
                                    <option value="">Select Criteria Type</option>
                                    <option value="benefit">Benefit</option>
                                    <option value="cost">Cost</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12 d-flex justify-content-end gap-4">
                                <a type="button" href="/criteria" class="btn btn-outline-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean(); // Get the buffered content
include(__DIR__ . '/../layout/layout.php');
?>
