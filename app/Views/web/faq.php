<?= view('web/partials/header.php') ?>

    <!--faq area start-->
    <div class="faq_content_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq_content_wrapper">
                        <h4>Below are frequently asked questions, you may find the answer for yourself</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Accordion area-->
    <div class="accordion_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="accordion" class="card__accordion">
                        <?php if ($faqs): ?>
                            <?php foreach ($faqs as $index => $faq): ?>
                                <div class="card card_dipult">
                                    <div class="card-header card_accor" id="heading<?= $index ?>">
                                        <button class="btn btn-link <?= $index === 0 ? '' : 'collapsed' ?>" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapse<?= $index ?>" 
                                            aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" 
                                            aria-controls="collapse<?= $index ?>">
                                            <?= esc($faq['question']) ?> 
                                            <i class="fa fa-plus"></i>
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <div id="collapse<?= $index ?>" 
                                        class="collapse <?= $index === 0 ? 'show' : '' ?>" 
                                        aria-labelledby="heading<?= $index ?>" 
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <p><?= esc($faq['answer']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3 class="text-center">No FAQs available</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Accordion area end-->
    <!--faq area end-->

<?= view('web/partials/footer.php') ?>