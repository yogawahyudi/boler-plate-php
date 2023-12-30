<?php if (isset($_SESSION['Error']) || isset($_SESSION['Success'])) : ?>
    <div class="toast-container position-absolute top-0 end-0 p-3" style="z-index: 3;">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="1000">
            <div class="toast-header text-light <?=  isset($_SESSION['Error']) ? 'bg-danger' : 'bg-success';?>"
>
                <strong class="me-auto">
                    <?php echo isset($_SESSION['Error']) ? 'Error' : 'Success'; ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?=  isset($_SESSION['Error']) ? $_SESSION['Error'] : $_SESSION['Success']; ?>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['Error']);
    unset($_SESSION['Success']);
    ; ?>
    <script>
        $(document).ready(() => {
            setTimeout(() => {
                $('.toast').toast('dispose');
            } , 5000);

            $('button[data-bs-dismiss="toast"]').click(() => {
                $('.toast').toast('dispose');
            })
        })
    </script>
<?php endif; ?>
