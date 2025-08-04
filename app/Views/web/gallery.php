<?= view('web/partials/header.php') ?>

<style>
    .gallery_section {
        background-color: #f8f9fa;
    }
    .gallery_item img {
        transition: transform 0.3s ease-in-out;
        border-radius: 10px;
    }
    .gallery_item img:hover {
        transform: scale(1.08);
    }
    .gallery_title {
        font-size: 2.5rem;
        font-weight: bold;
    }
</style>

<!-- Modern Gallery Section Start -->
<div class="gallery_section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="blog_header">
                <h1>Our Gallery</h1>
            </div>
        </div>

        <div class="row justify-content-center g-3">
            <?php if($images): ?>
                <?php foreach($images as $image): ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="gallery_item card border-0 shadow-sm">
                            <a href="<?= base_url('/public/uploads/'.$image['image']) ?>" data-lightbox="gallery" data-title="<?= esc($image['title']) ?> - Gallery - QASWA TELECOM, Doorstep Repair in Mumbai">
                                <img src="<?= base_url('/public/uploads/'.$image['image']) ?>" class="card-img-top rounded" alt="<?= esc($image['title']) ?> - Gallery Image - QASWA TELECOM, Doorstep Repair in Mumbai" loading="lazy">
                            </a>
                        </div>
                        <h3 style="font-size: 16px; margin-bottom: 10px;"><?= $image['title'] ?></h3>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <h3 class="text-muted">No images available</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Modern Gallery Section End -->

<!--blog pagination area start-->
<div class="blog_pagination">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--blog pagination area end-->

<?= view('web/partials/footer.php') ?>
