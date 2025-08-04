<?php
$page_title = 'Mobile Repair Blogs & Articles | QASWA TELECOM Mumbai';
$meta_description = 'Explore expert mobile repair blogs, tips & DIY tricks by QASWA TELECOM. Fast, safe, and doorstep phone service insights for Mumbai users.';
?>

<?= view('web/partials/header.php') ?>

<!-- ✅ Blog Schema JSON-LD for Listing -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "QASWA TELECOM Blog",
  "url": "<?= base_url('Blogs') ?>",
  "description": "Explore expert mobile repair blogs, tips & guides by QASWA TELECOM.",
  "blogPost": [
    <?php foreach ($blogs as $i => $blog): ?>
    {
      "@type": "BlogPosting",
      "headline": "<?= addslashes($blog['title']) ?>",
      "image": "<?= base_url('/public/uploads/' . $blog['image']) ?>",
      "url": "<?= base_url('blogDetails/' . $blog['id']) ?>",
      "datePublished": "<?= date('Y-m-d', strtotime($blog['created_at'])) ?>",
      "author": {
        "@type": "Organization",
        "name": "QASWA TELECOM"
      }
    }<?= $i < count($blogs) - 1 ? ',' : '' ?>
    <?php endforeach; ?>
  ]
}
</script>

<!-- Blog Listing Area Start -->
<div class="blog_page_section blog_fullwidth mt-60" style="padding-bottom: 40px;">
    <div class="container">
        <!-- Mobile spacing fix -->
        <div class="text-center mb-4 blog_page_heading" style="padding-top: 0;">
            <h1 style="font-size: 32px; font-weight: 700;">📚 Blogs & Repair Articles</h1>
            <p style="font-size: 15px; color: #666; max-width: 600px; margin: 0 auto;">
                Explore expert mobile repair insights, tips, and DIY tricks by QASWA TELECOM.
            </p>
        </div>

        <div class="row">
            <?php if ($blogs): ?>
                <?php foreach ($blogs as $blog): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="<?= base_url('blogDetails/' . $blog['id']) ?>" style="text-decoration: none;">
                            <div class="blog_card" style="
                                background: #fff;
                                border: 1px solid #00b2a2;
                                border-radius: 12px;
                                overflow: hidden;
                                height: 100%;
                                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                                transition: all 0.3s ease;
                                display: flex;
                                flex-direction: column;">
                                
                                <!-- Blog Image -->
                                <div style="width: 100%;">
                                    <img src="<?= base_url('/public/uploads/' . $blog['image']) ?>"
                                         alt="<?= $blog['title'] ?> – Blog by QASWA TELECOM Mumbai"
                                         title="<?= $blog['title'] ?>"
                                         loading="lazy"
                                         style="width: 100%; height: auto; display: block;">
                                </div>

                                <!-- Blog Text Content -->
                                <div style="padding: 15px;">
                                    <h3 style="font-size: 18px; font-weight: 600; color: #000; margin-bottom: 10px;">
                                        <?= $blog['title'] ?>
                                    </h3>
                                    <p style="font-size: 14px; color: #444;">
                                        <?= substr(strip_tags($blog['description']), 0, 150) ?>...
                                    </p>
                                    <p style="font-size: 13px; color: #888; font-style: italic; margin-top: 10px;">
                                        <?= date('d F, Y', strtotime($blog['created_at'])) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <h3 class="text-center">No blogs available</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Blog Listing Area End -->

<!-- Custom CSS -->
<style>
.blog_card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

@media (max-width: 767px) {
    .blog_page_heading {
        padding-top: 30px !important;
    }
}
</style>

<?= view('web/partials/footer.php') ?>