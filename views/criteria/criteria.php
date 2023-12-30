<?php
$pageTitle = "Criteria";
ob_start(); // Start buffering output
?>

<div class="row p-4">
    <div class="col-12 card card-body">
        <div class="row mb-4 justify-content-between">
            <div class="col-sm-12 col-lg-4">
                <button class="btn btn-primary" id="add">Add Criteria</button>
            </div>
            <div class="col-sm-12 col-lg-4 d-flex flex-row">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Criteria" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-search">Search</button>
                </div>            
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th style="width: 50%;">Name</th>
                        <th style="width: 25%;">Type</th>
                        <th style="width: 25%;">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (empty($criterias)) { 
                    ?>
                         <tr>
                            <td colspan="3">
                                <div class="d-flex justify-content-center align-items-center" style="height: 25vh;">
                                   <h6>
                                       No Criteria found, please add some criteria <a href="/criteria/create"> here</a>
                                   </h6>
                                </div>
                            </td>
                        </tr>          
                    <?php
                        } else { 
                            foreach($criterias as $criteria) {
                    ?>
                        <tr>
                            <td>
                                <?= $criteria['criteria']?>
                            </td>
                            <td>
                                <?= $criteria['weight']?>
                            </td>
                            <td>
                                <?= $criteria['type']?>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <?php
                if (!empty($criteria)) { 
            ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>      
            <?php
                }
            ?>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean(); // Get the buffered content
include(__DIR__ . '/../layout/layout.php');
?>
