<?php
$page_title = $blog['title'] . ' - Blog | QASWA TELECOM';
$meta_description = 'Read: ' . substr(strip_tags($blog['description']), 0, 150) . '... Get expert repair tips & insights from QASWA TELECOM, Mumbai’s trusted doorstep mobile repair service.';

$faq_items = [
    [
        "question" => "Can I get mobile repair at my doorstep in Mumbai?",
        "answer" => "Yes, QASWA TELECOM provides doorstep mobile repair service across Mumbai in just 60–90 minutes."
    ],
    [
        "question" => "Is my data safe during mobile repair?",
        "answer" => "Absolutely. We do repairs in front of you without needing your phone passcode, so your data remains 100% safe."
    ],
    [
        "question" => "How to book a repair service with QASWA TELECOM?",
        "answer" => "You can call or WhatsApp us at +91-9324316048 or visit our website to book online."
    ]
];
?>

<?= view('web/partials/header.php') ?>

<!-- ✅ FAQ SCHEMA JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php foreach ($faq_items as $i => $faq): ?>
    {
      "@type": "Question",
      "name": "<?= addslashes($faq['question']) ?>",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<?= addslashes($faq['answer']) ?>"
      }
    }<?= $i < count($faq_items) - 1 ? ',' : '' ?>
    <?php endforeach; ?>
  ]
}
</script>

<style>
/* тЬЕ Mobile-specific spacing fixes */
@media (max-width: 767px) {
    .blog_details {
        margin-top: -8px !important;      /* ЁЯФ╗ Header рд╕реЗ space рдФрд░ рдХрдо */
        padding-top: 0px !important;
        margin-bottom: 24px !important;   /* ЁЯФ╗ Footer рд╕реЗ рдереЛрдбрд╝рд╛ рдКрдкрд░ */
    }
    .blog_thumb {
        margin-bottom: 0px !important;    /* ЁЯФ╗ Image рдХреЗ рдиреАрдЪреЗ gap рдФрд░ рдХрдо */
    }
}

/* ЁЯУ▒ Mobile-specific blog title */
@media (max-width: 767px) {
    .post_title {
        font-size: 24px !important;
        line-height: 30px !important;
        font-weight: 500 !important;
        letter-spacing: -0.2px;
        margin-top: 20px !important;
        text-align: left !important;
    }
}

/* ЁЯТ╗ Desktop blog title */
@media (min-width: 768px) {
    .post_title {
        font-size: 30px !important;
        line-height: 38px !important;
        font-weight: 600 !important;
        text-align: left !important;
    }
}

/* ЁЯУЦ Paragraph styling */
.post_content,
.post_content p,
.post_content li,
.post_content span {
    font-size: 20px !important;
    font-weight: 300 !important;
    line-height: 32px !important;
    color: #222 !important;
    text-align: left !important;
}

/* ЁЯП╖я╕П Headings */
.post_content h3,
.post_content h4 {
    font-size: 26px !important;
    font-weight: 500 !important;
    line-height: 36px !important;
    margin-top: 24px !important;
    text-align: left !important;
}

/* ЁЯФе Bold text */
.post_content strong {
    font-weight: 500 !important;
}

/* ЁЯУ▒ Mobile tweaks */
@media (max-width: 767px) {
    .post_content,
    .post_content p,
    .post_content li,
    .post_content span {
        font-size: 16px !important;
        line-height: 26px !important;
    }

    .post_content h3,
    .post_content h4 {
        font-size: 20px !important;
        line-height: 30px !important;
        font-weight: 500 !important;
    }
}

/* тЬЕ Blog Box Styling */
.full-blog-box {
    border: 1px solid #00b2a2;
    border-radius: 14px;
    padding: 24px;
    margin-top: 30px;
    background-color:  #f9f9f9;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
    font-family: 'Poppins', sans-serif;
    line-height: 1.8;
    color: #222;
    max-width: 100%;
    text-align: left;
}
.full-blog-box h2,
.full-blog-box h3 {
    font-weight: 600;
    font-size: 24px;
    margin-bottom: 20px;
}
.full-blog-box p {
    font-size: 16px;
    margin-bottom: 16px;
}
</style>

<!-- ЁЯУ░ Blog body area start -->
<div class="blog_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- тЬЕ Entire blog inside one box -->
                <div class="full-blog-box">
                    <article class="single_blog">
                        <figure>
                            <div class="post_header">
                                <h3 class="post_title">
                                    <?= $blog['title'] ?>
                                </h3>
                                <div class="blog_meta">
                                    <span class="post_date">On : <a><?= date('d-m-Y', strtotime($blog['created_at'])) ?></a></span>
                                </div>
                            </div>
                            <div class="blog_thumb">
                                <a href="#">
                                    <img src="<?= base_url('/public/uploads/'.$blog['image']) ?>"
                                         alt="<?= $blog['title'] ?> - Blog | QASWA TELECOM - Mobile Repair in Mumbai"
                                         title="<?= $blog['title'] ?> | QASWA TELECOM"
                                         style="width: 100%; height: auto; border-radius: 10px;" loading="lazy">
                                </a>
                            </div>
                            <figcaption class="blog_content">
                                <div class="post_content">
                                    <?= $blog['description'] ?>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ЁЯУ░ Blog section area end -->

<?= view('web/partials/footer.php') ?>
