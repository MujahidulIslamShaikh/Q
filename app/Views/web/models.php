<?php
$brandName = isset($brand['title']) ? $brand['title'] : 'Mobile';
$page_title = $brandName . ' Models – Doorstep Mobile Repair in Mumbai | QASWA TELECOM';
$meta_description = 'Explore ' . $brandName . ' mobile models for doorstep repair in Mumbai by QASWA TELECOM. Fast, safe, and original parts. Book your service today.';
?>

<?= view('web/partials/header.php') ?>

<!-- ✅ JSON-LD SCHEMA: CollectionPage -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "<?= $brandName ?> Mobile Models for Repair in Mumbai",
  "description": "View all <?= $brandName ?> mobile models available for doorstep repair by QASWA TELECOM in Mumbai.",
  "url": "<?= current_url() ?>",
  "publisher": {
    "@type": "Organization",
    "name": "QASWA TELECOM",
    "url": "<?= base_url() ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?= base_url('assets/img/logo.png') ?>"
    }
  }
}
</script>

<!-- ✅ JSON-LD SCHEMA: LocalBusiness with YouTube -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "QASWA TELECOM",
  "url": "<?= base_url() ?>",
  "logo": "<?= base_url('assets/img/logo.png') ?>",
  "telephone": "+91-9324316048",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Mumbai",
    "addressRegion": "MH",
    "postalCode": "400092",
    "addressCountry": "IN"
  },
  "sameAs": [
    "https://www.instagram.com/qaswatelecom/",
    "https://www.facebook.com/qaswatelecom1/",
    "https://www.youtube.com/@qaswatelecom"
  ],
  "description": "QASWA TELECOM offers doorstep mobile, iPhone, MacBook & tablet repairs in Mumbai. Same-day service with genuine parts & warranty."
}
</script>

<style>
/* ðŸ’  Your existing responsive model grid CSS â€” untouched */
.section_title h2 {
    font-size: 22px;
    font-weight: 400;
    margin-bottom: 20px;
}
@media (min-width: 768px) {
    .section_title h2 {
        font-size: 28px;
        font-weight: 500;
    }
    .single_category figure {
        margin-top: 20px;
    }
}
@media (max-width: 767px) {
    .section_title h2 {
        text-align: left;
        font-size: 20px;
        font-weight: 500;
        line-height: 26px;
        margin-top: 30px;
        /* margin-bottom: 70px !important; */
    }
    .models-grid {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 12px;
        padding: 0 20px !important;
        box-sizing: border-box;
    }
    .model-item {
        padding: 0 !important;
    }
    .top_category_container {
        width: 100%;
    }
    .model-item .single_category {
        height: 200px;
        width: 100%;
        padding: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .category_thumb {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .category_name h3 {
        font-size: 14px !important;
        font-weight: normal !important;
        line-height: 18px;
        text-align: center;
        min-height: 36px;
        overflow-wrap: break-word;
        margin-top: 36px;
    }
}
.single_category {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
    margin: auto;
    max-width: 190px;
    height: 200px;
    padding: 10px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}
@media (hover: hover) {
    .single_category:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
}
.models-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 15px;
    max-width: 100%;
    margin: 0 auto;
    padding: 5px;
    justify-content: center;
}
.category_thumb {
    width: 75px;
    height: 75px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.category_thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.category_name h3 {
    font-size: 17px;
    font-weight: normal;
    text-align: center;
    line-height: 20px;
    width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: 36px;
}
@media (max-width: 1280px) {
    .models-grid {
        grid-template-columns: repeat(5, 1fr);
    }
}
@media (max-width: 1024px) {
    .models-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}
</style>

<!-- âœ… Select Model Section Start -->
<section class="top_category_product mb-70 mt-60">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- âœ… Heading + Search Box -->
        <div class="section_title d-md-flex d-block justify-content-between align-items-center">
          <h2 class="mb-3"><?= $brand['title'] ?> : Doorstep Screen Repair & Replacement</h2>
          <div class="search_container mb-0">
            <form action="" method="post">
              <?= csrf_field() ?>
              <div class="search_box qaswa-style">
                <input type="text" name="query" placeholder="Search model..." value="<?= esc($query ?? '') ?>">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 24 24">
                    <path d="M10 2a8 8 0 105.293 14.293l4.707 4.707 1.414-1.414-4.707-4.707A8 8 0 0010 2zm0 2a6 6 0 110 12A6 6 0 0110 4z"/>
                  </svg>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- âœ… Model Grid -->
    <div class="row">
      <?php if($models): ?>
        <div class="models-grid">
          <?php foreach($models as $model): 
            $uri_brand_title = str_replace(' ', '-', $brand['title']);
            $uri_model_title = str_replace(' ', '-', $model['title']);
            $uri_brand_title = strtolower($uri_brand_title);
            $uri_model_title = strtolower($uri_model_title);
            ?>
            <div class="model-item">
              <div class="top_category_container">
                <a href="<?= base_url($uri_brand_title.'/'.$uri_model_title.'/services') ?>">
                  <article class="single_category">
                    <figure>
                      <div class="category_thumb">
                        <img src="<?= base_url('public/uploads/'.$model['image']) ?>" alt="<?= $model['title'] ?> Repair - Doorstep, Onsite in Mumbai - QASWA TELECOM">
                      </div>
                      <figcaption class="category_name">
                        <h3><?= $model['title'] ?></h3>
                      </figcaption>
                    </figure>
                  </article>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <div class="col-md-12">
          <h4 class="text-center">No Model available.</h4>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- âœ… Model-Wise Blog Article Load -->
<?php
  $brandSlug = strtolower(trim(str_replace([' ', '+'], ['-', ''], $brand['title'])));
  if ($brandSlug === 'appleiphone' || $brandSlug === 'apple') {
    $brandSlug = 'apple-iphone';
  }
  $articleViewPath = 'web/models-articles/' . $brandSlug;
  $articleFullPath = APPPATH . 'Views/' . $articleViewPath . '.php';
?>

<!-- âœ… BLOG CSS -->
<style>
.model-article-section {
  padding-top: 20px;
  padding-bottom: 40px;
}
.model-article-box {
  border: 1px solid #00b2a2;
  border-radius: 14px;
  padding: 24px;
  background-color: #f9f9f9;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
  font-family: 'Poppins', sans-serif;
  color: #222;
  max-width: 1240px;
  margin: auto;
}
.model-article-box h2,
.model-article-box h3 {
  font-weight: 600;
  font-size: 24px;
  margin-bottom: 20px;
}
.model-article-box p,
.model-article-box li {
  font-size: 17px;
  line-height: 1.9;
  margin-bottom: 16px;
}
@media (max-width: 767px) {
  .model-article-box {
    padding: 16px !important;
    border-radius: 10px !important;
    margin-left: 10px !important;
    margin-right: 10px !important;
  }
  .model-article-box h2 {
    font-size: 21px;
  }
  .model-article-box h3 {
    font-size: 18px;
  }
  .model-article-box p,
  .model-article-box li {
    font-size: 15.5px;
    line-height: 1.7;
  }
}
</style>

<!-- âœ… BLOG SECTION -->
<section class="model-article-section">
  <?php if (file_exists($articleFullPath)): ?>
    <div class="model-article-box">
      <?= view($articleViewPath) ?>
    </div>
  <?php endif; ?>
</section>

<!-- âœ… Clearfix before footer to fix cut issue -->
<div style="clear: both; padding-top: 20px;"></div>

<?= view('web/partials/footer.php') ?>