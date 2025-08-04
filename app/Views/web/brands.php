<?php
$brandName = isset($brand['title']) ? $brand['title'] : 'Mobile';
$page_title = $brandName . ' Repair in Mumbai | QASWA TELECOM';
$meta_description = 'QASWA TELECOM offers doorstep ' . $brandName . ' mobile repair in Mumbai. Book same-day repair service now.';
?>

<?= view('web/partials/header.php') ?>

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
    "description": "QASWA TELECOM provides doorstep repair for <?= $brandName ?> phones across Mumbai. Same-day service with original parts and warranty."
  }
</script>

<!-- ✅ Optional: FAQ Schema -->
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [{
        "@type": "Question",
        "name": "Do you use original mobile parts?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. We use genuine, brand-approved parts with proper warranty and performance."
        }
      },
      {
        "@type": "Question",
        "name": "How long will the repair take?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Most repairs are done within 30 to 60 minutes, depending on the issue."
        }
      },
      {
        "@type": "Question",
        "name": "Are there any hidden charges?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Absolutely not. We follow transparent pricing — no visit fee, no hidden charges."
        }
      },
      {
        "@type": "Question",
        "name": "Is my personal data safe?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "100%. Our repair process ensures your data remains untouched and fully protected."
        }
      }
    ]
  }
</script>

<style>
  .video-wrapper iframe {
    width: 100%;
    height: 220px;
  }

  @media (max-width: 767px) {
    .search_container {
      display: none !important;
    }
  }

  /* ✅ BRANDS WE REPAIR section only */
  .brand-section .single_category {
    height: 180px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  @media (hover: hover) and (min-width: 768px) {
    .brand-section .single_category:hover {
      transform: scale(1.08);
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
    }
  }

  @media (max-width: 767px) {
    .brand-section .single_category {
      aspect-ratio: 1 / 1;
      height: auto;
      margin: 5px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .brand-section .models-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      padding: 10px;
    }

    .brand-section .category_name h3 {
      font-size: 13px;
      font-weight: 400;
      text-align: center;
    }
  }

  /* ✅ DEVICE SECTION - animation only for 4 white boxes */
  .device-section .single_category {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  @media (hover: hover) and (min-width: 768px) {
    .device-section .single_category:hover {
      transform: scale(1.12);
      box-shadow: 0 10px 24px rgba(0, 0, 0, 0.15);
    }
  }

  /* ✅ Doorstep Repair Heading */
  #device .device_heading h1 {
    font-weight: 500;
    font-size: 46px;
    margin-bottom: 10px;
  }

  @media (min-width: 992px) {
    #device .device_heading h1 {
      font-size: 60px;
    }
  }

  @media (max-width: 767px) {
    #device .device_heading h1 {
      font-size: 40px;
      line-height: 38px;
    }

    #device .device_heading p {
      font-size: 16px;
      line-height: 22px;
    }

    #device .row.justify-content-center.mt-3 {
      margin: 0 -5px;
    }

    #device .col-6 {
      padding: 5px !important;
      margin-bottom: 0 !important;
    }

    #device .single_category {
      margin: 0 !important;
    }
  }

  /* ✅ MODEL PAGE - 6 brand boxes per row + updated text */
  .models-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 20px;
    padding: 10px;
    justify-content: center;
  }

  .model-item .single_category {
    width: 100%;
    max-width: 200px;
    height: 180px;
    margin: auto;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
  }

  .model-item .single_category:hover {
    transform: scale(1.08);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
  }

  .category_thumb {
    width: 60px;
    height: 60px;
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
    font-size: 16px;
    font-weight: 400;
    text-align: center;
    margin-top: 10px;
    line-height: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100%;
  }

  /* ✅ Heading text style for Brand page */
  .section_title .brand-header-title {
    font-size: 32px;
    font-weight: 500;
    text-align: center;
    line-height: 1.5;
    margin-bottom: 25px;
  }

  @media (max-width: 767px) {
    .models-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }

    .model-item .single_category {
      max-width: 100%;
      height: 140px;
      padding: 10px 5px;
    }

    .category_name h3 {
      font-size: 14px;
    }

    .section_title .brand-header-title {
      font-size: 18px;
      font-weight: 500;
      text-align: left;
      margin-left: 10px;
      margin-right: 10px;
      margin-top: 20px;
      /* ✅ YAHI line spacing ke liye add ki gayi hai */
    }
  }
</style>

<!-- Select model area start-->
<section class="top_category_product mt-60" style="margin-bottom: 30px;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section_title">
          <h2 class="brand-header-title">QASWA TELECOM: Doorstep Mobile Repair Service In Mumbai</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <?php if ($brands): ?>
        <div class="models-grid">
          <?php foreach ($brands as $brand):
            $uri_brand_title = str_replace(' ', '-', $brand['title']);
            $uri_brand_title = strtolower($uri_brand_title); ?>
            <div class="model-item">
              <div class="top_category_container">
                <a href="<?= base_url($uri_brand_title . '/models') ?>">
                  <article class="single_category">
                    <figure>
                      <div class="category_thumb">
                        <img src="<?= base_url('public/uploads/' . $brand['image']) ?>" alt="<?= $brand['title'] ?> doorstep repair, onsite repair - QASWA TELECOM">
                      </div>
                      <figcaption class="category_name">
                        <h3><?= $brand['title'] ?></h3>
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
          <h4 class="text-center">No Brand available for <?= $brand['title'] ?>.</h4>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- Select model area end-->

<!-- ⭐ BEGIN: QASWA TELECOM Brand Page Article -->
<style>
  .full-blog-box {
    border: 1px solid #00b2a2;
    border-radius: 14px;
    padding: 24px;
    margin-top: 30px;
    margin-bottom: 40px;
    background-color: #f9f9f9;
    /* ✅ changed background */
    box-shadow: 0 0.5px 2px rgba(0, 0, 0, 0.04);
    /* ✅ lighter shadow */
    font-family: 'Poppins', sans-serif;
    color: #222;
    text-align: left;
  }

  .full-blog-box h2,
  .full-blog-box h3 {
    font-weight: 600;
    font-size: 24px;
    margin-bottom: 20px;
  }

  .full-blog-box p,
  .full-blog-box li {
    font-size: 16px;
    margin-bottom: 16px;
    line-height: 1.8;
  }

  /* ✅ Article Font Styling */
  .brand-article-section p {
    font-size: 17px;
    line-height: 1.9;
    font-weight: 400;
    color: #222;
    text-align: justify;
  }

  .brand-article-section ul {
    font-size: 17px;
    line-height: 1.8;
    text-align: justify;
  }

  .brand-article-section h2,
  .brand-article-section h3 {
    color: #111;
  }

  @media (min-width: 768px) {

    .brand-article-section p,
    .brand-article-section ul {
      font-size: 18px;
      text-align: justify;
    }
  }

  @media (max-width: 767px) {
    .brand-article-section {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .brand-article-section .container {
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .brand-article-section p,
    .brand-article-section ul {
      font-size: 16px;
      font-weight: 400;
      text-align: left;
    }

    .brand-article-section h2 {
      font-size: 22px;
      text-align: left;
    }

    .brand-article-section h3 {
      font-size: 18px;
      text-align: left;
    }

    .brand-article-section .full-blog-box {
      margin-left: 10px !important;
      margin-right: 10px !important;
      padding: 16px !important;
      border-radius: 10px !important;
    }
  }
</style>

<section class="brand-article-section pb-5 px-3" style="padding-top: 10px;">
  <div class="container">
    <div class="full-blog-box">
      <h2 class="text-center mb-4 fw-bold">Doorstep Mobile Repair in Mumbai – Fast, Reliable & Trusted by QASWA TELECOM</h2>

      <p>Tired of running around looking for a mobile repair shop? With <strong>QASWA TELECOM</strong>, you get <strong>doorstep mobile repair in Mumbai</strong> for brands like <strong>Apple, Samsung, Xiaomi, Realme, Vivo, OnePlus, Oppo</strong> and more — fast, safe, and reliable. Our expert technicians reach your home or office and fix your device right in front of you.</p>

      <p>We cover all major areas including <strong>Andheri, Dadar, Bandra, Borivali, Ghatkopar, Kurla, Malad, Chembur, Vashi</strong> and <strong>Navi Mumbai</strong>. Whether it’s a <strong>screen replacement, battery issue, charging port fault, or water damage</strong> — we’ve got your back with on-the-spot service.</p>

      <h3 class="mt-4 mb-2 fw-semibold">Why Choose QASWA TELECOM?</h3>
      <ul class="ps-3 mb-4">
        <li>🔧 Trained and Verified Technicians</li>
        <li>🛡️ 100% Genuine Parts with Warranty</li>
        <li>⏱️ Same-Day Repairs, Most in Under 1-2 Hours</li>
        <li>📍 Doorstep Service Across Mumbai & Navi Mumbai</li>
        <li>💬 Instant Booking, Friendly Support</li>
      </ul>

      <h3 class="mt-4 mb-2 fw-semibold">We Repair All Popular Brands:</h3>
      <p><strong>iPhone</strong> – Cracked screen, weak battery, mic/speaker issues – solved same-day.</p>
      <p><strong>Samsung</strong> – Super AMOLED screens, fast battery change, power button issues.</p>
      <p><strong>OnePlus, Vivo, Oppo</strong> – Trusted by thousands across Mumbai for fast doorstep fixes.</p>
      <p><strong>Xiaomi, Redmi, POCO</strong> – Affordable + quick mobile repair with premium care.</p>
      <p><strong>Realme, Infinix, Motorola</strong> – Everything from charging ports to camera repairs.</p>

      <h3 class="mt-4 mb-2 fw-semibold">Available Across These Locations:</h3>
      <ul class="ps-3 mb-4">
        <li>📍 <strong>Andheri, Bandra, Borivali</strong> – Quickest response times</li>
        <li>📍 <strong>Dadar, Ghatkopar, Mulund</strong> – Same-day service guaranteed</li>
        <li>📍 <strong>Chembur, Kurla, Malad</strong> – 1-hour arrival available</li>
        <li>📍 <strong>Navi Mumbai – Vashi, Nerul, Belapur</strong></li>
      </ul>

      <p>No more waiting, no more worrying. Whether you're stuck at work or home, QASWA TELECOM sends a trusted technician to you. We’re changing how Mumbai repairs phones — quick, clean, and right in front of you.</p>

      <p>Ready to book your repair? <a href="<?= base_url('contact') ?>"><strong>Contact us now</strong></a> or check out <a href="<?= base_url('blogs') ?>"><strong>our mobile repair tips blog</strong></a> to learn how to protect your device better.</p>

      <h3 class="text-center mt-5 mb-3 fw-bold">Frequently Asked Questions (FAQs)</h3>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item mb-2">
          <h2 class="accordion-header" id="faq1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqAns1">
              Q. Do you use original mobile parts?
            </button>
          </h2>
          <div id="faqAns1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes. We use genuine, brand-approved parts with proper warranty and performance.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-2">
          <h2 class="accordion-header" id="faq2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqAns2">
              Q. How long will the repair take?
            </button>
          </h2>
          <div id="faqAns2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Most repairs are done within 30 to 60 minutes, depending on the issue.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-2">
          <h2 class="accordion-header" id="faq3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqAns3">
              Q. Are there any hidden charges?
            </button>
          </h2>
          <div id="faqAns3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Absolutely not. We follow transparent pricing — no visit fee, no hidden charges.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-2">
          <h2 class="accordion-header" id="faq4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqAns4">
              Q. Is my personal data safe?
            </button>
          </h2>
          <div id="faqAns4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              100%. Our repair process ensures your data remains untouched and fully protected.
            </div>
          </div>
        </div>
      </div>

      <p class="text-center fw-bold mt-5 mb-0" style="font-size: 18px;">
        QASWA TELECOM – Naya Bhool Jao, Bharose Ke Saath Purana Chamkao!
      </p>
    </div>
  </div>
</section>

<?= view('web/partials/footer.php') ?>