<?php
$pageTitle = "Data";
ob_start(); // Start buffering output
?>

<div class="row p-4">
    <div class="col-12">
        <div class="row mb-4 justify-content-between">
            <div class="col-sm-12 col-lg-4">
                <button class="btn btn-primary" id="add">Tambah Data</button>
            </div>
            <div class="col-sm-12 col-lg-4 d-flex flex-row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-search">Search</button>
                </div>            
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean(); // Get the buffered content
include('layout/layout.php');
?>
