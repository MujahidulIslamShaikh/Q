<?= view('web/partials/header.php') ?>

    <!-- Policy area start-->
    <div class="privacy_policy_main_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="privacy_policy_header">
                        <h1>Privacy Policy</h1>
                    </div>
                    <div class="privacy_content section_2">
                        <?php if($policies): ?>
                            <?php foreach($policies as $policy): ?>
                                <?= $policy['policy'] ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class="text-center">No data available.</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Policy area end-->

<?= view('web/partials/footer.php') ?>