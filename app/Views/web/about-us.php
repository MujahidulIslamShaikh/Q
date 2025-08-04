<?php
$page_title = 'About QASWA TELECOM - Doorstep Mobile Repair Service in Mumbai';
$meta_description = 'Know more about QASWA TELECOM – Mumbai’s most trusted doorstep mobile repair service. Fast, safe, and expert repairs for phones, iPads, MacBooks & more.';
?>

<?= view('web/partials/header.php') ?>
<?php
    helper('text');

    $string = "My name is Mujahid dsjflksd asdjflksdfjdsa sdfasdfsdalkjfdasfsd fasd fdas fdfd ";

    // echo word_limiter($string, 6); 

?>

<style>
    .about_section {
        margin-top: 40px;
    }

    .about_section figure {
        background: #f4f4f4;
        border-radius: 16px;
        padding: 25px;
        border: 1px solid #00b2a2;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
        margin-bottom: 40px;
        font-family: 'Poppins', 'Segoe UI', sans-serif;
    }

    .about_section .section-heading {
        font-size: 32px;
        font-weight: 600;
        color: #00b2a2;
        text-align: center;
        margin-bottom: 10px;
        position: relative;
    }

    .about_section .section-heading::after {
        content: "";
        display: block;
        height: 1px;
        background-color: #ccc;
        width: fit-content;
        margin: 10px auto 20px auto;
    }

    .about_section .about_thumb img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .about_section .about_content {
        font-size: 18px;
        line-height: 1.9;
        color: #333;
        text-align: justify;
        font-weight: 400;
        letter-spacing: 0.2px;
        word-spacing: 0.5px;
    }

    .about_content h2,
    .about_content h3,
    .about_content strong {
        font-size: 20px;
        color: #222;
        font-weight: 600;
    }

    .about_content p {
        font-size: 18px;
        line-height: 1.9;
        margin-bottom: 15px;
    }

    .about_content li {
        font-size: 18px;
        line-height: 1.9;
        margin-bottom: 8px;
    }

    .about_content ol {
        padding-left: 20px;
        margin-bottom: 20px;
    }

    .choseus_area {
        font-family: 'Poppins', 'Segoe UI', sans-serif;
        padding-top: 20px;
        padding-bottom: 60px;
        background-color: #fff;
    }

    .choseus_area .single_chose {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        border-radius: 16px;
        background-color: #f4f4f4;
        padding: 20px;
        border: 1px solid #00b2a2;
        transition: transform 0.3s ease;
    }

    .choseus_area .single_chose:hover {
        transform: translateY(-5px);
    }

    .choseus_area h3 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #00b2a2;
    }

    .choseus_area p {
        font-size: 16px;
        color: #555;
    }

    @media (max-width: 768px) {
        .about_section {
            padding-top: 30px;
        }

        .about_section figure {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .about_section .section-heading {
            font-size: 18px !important;
            letter-spacing: 0.2px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 10px;
        }

        .about_section .section-heading::after {
            margin: 8px auto 15px auto;
        }

        .about_section .about_content {
            font-size: 16px;
            text-align: left;
            color: #444;
            line-height: 1.8;
        }

        .about_content h2,
        .about_content h3,
        .about_content strong {
            font-size: 17px;
        }

        .about_content li {
            font-size: 16px;
        }

        .about_content p {
            font-size: 16px;
        }

        .choseus_area {
            padding-top: 10px;
            padding-bottom: 30px;
        }

        .choseus_area .single_chose {
            padding: 15px;
        }

        .choseus_area h3 {
            font-size: 18px;
        }

        .choseus_area p {
            font-size: 14px;
            color: #444;
        }
    }
</style>

<!-- ✅ About Section Start -->
<section class="about_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <figure>
                    <div class="section-heading">ABOUT US | QASWA TELECOM</div>
                    <div class="about_thumb">
                        <img
                            src="<?= base_url('assets/web/img/about/about-us-image.png') ?>"
                            alt="About QASWA TELECOM – Mobile Repair at Your Doorstep in Mumbai"
                            title="QASWA TELECOM doorstep mobile repair service in Mumbai"
                            loading="lazy"
                            width="100%"
                            style="border-radius:10px;">
                    </div>
                    <figcaption class="about_content">
                        <?php foreach ($about as $data): ?>
                            <?= $data['about_us'] ?>
                        <?php endforeach; ?>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>
<!-- ✅ About Section End -->

<!-- ✅ Philosophy Start -->
<div class="choseus_area mb-0">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single_chose h-100">
                    <div class="chose_icone mb-2">
                        <img src="<?= base_url('assets/web/img/about/Our_mission.png') ?>" alt="Mission of Qaswa Telecom" style="height:50px;">
                    </div>
                    <h3>Our Mission</h3>
                    <p>To provide quick, reliable, and hassle-free mobile repair service across every corner of Mumbai — keeping you connected, always.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single_chose h-100">
                    <div class="chose_icone mb-2">
                        <img src="<?= base_url('assets/web/img/about/Our_vision.png') ?>" alt="Vision of Qaswa Telecom" style="height:50px;">
                    </div>
                    <h3>Our Vision</h3>
                    <p>To become the #1 choice in Mumbai for mobile and gadget repairs by offering consistent quality, real-time support, and unmatched convenience.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 mb-4">
                <div class="single_chose h-100">
                    <div class="chose_icone mb-2">
                        <img src="<?= base_url('assets/web/img/about/Our_values.png') ?>" alt="Values of Qaswa Telecom" style="height:50px;">
                    </div>
                    <h3>Our Values</h3>
                    <p>Integrity. Transparency. Speed. Customer Delight. These values drive everything we do at <strong>QASWA TELECOM</strong> every single day in Mumbai.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ✅ Philosophy End -->

<?= view('web/partials/footer.php') ?>