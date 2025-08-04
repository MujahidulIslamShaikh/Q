<?= view('web/partials/header.php') ?>

<style>
    .contact_area {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .contact_box_wrapper {
        background: #fff;
        border: 1px solid #00b2a2; /* ✅ 1px border stroke added */
        border-radius: 16px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        padding: 40px 30px;
    }

    .contact_heading {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 15px;
        color: #00b2a2;
    }

    .contact_text {
        font-size: 16px;
        color: #333;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .contact_info ul {
        list-style: none;
        padding-left: 0;
    }

    .contact_info ul li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 16px;
        color: #333;
        margin-bottom: 18px;
    }

    .contact_info ul li i {
        color: #0a8acd;
        font-size: 18px;
        margin-top: 4px;
        width: 22px;
        text-align: center;
    }

    .contact_info ul li a {
        color: #00b2a2 !important;
        text-decoration: none !important;
        font-weight: 500;
    }

    .contact_form_area {
        background: #f4f4f4;
        border: 1px solid #00b2a2;
        border-radius: 20px;
        padding: 35px 30px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    }

    .contact_form_area h3 {
        text-align: center;
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 25px;
        color: #00b2a2;
    }

    .contact_form_area input,
    .contact_form_area select,
    .contact_form_area textarea {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 15px;
    }

    .form_row_two {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .form_row_two input {
        flex: 1;
    }

    .contact_form_area button {
        background: #00b2a2;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        height: 48px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .contact_form_area button:hover {
        background: #009890;
    }

    /* ✅ Mobile Adjustments */
    @media (max-width: 767px) {
        .contact_area {
            padding-top: 30px !important;
        }

        .contact_box_wrapper {
            background: transparent;
            box-shadow: none;
            padding: 0;
            border: none; /* ✅ No outer border on mobile */
        }

        .contact_heading {
            font-size: 18px;
            white-space: nowrap;
            text-align: center;
            margin-top: 0 !important;
        }

        .contact_info {
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .form_row_two {
            flex-direction: column;
        }

        .contact_form_area {
            width: 100%;
            margin: 0 auto;
            padding: 25px 18px;
        }

        .contact_form_area h3 {
            text-align: center;
        }

        .contact_map {
            padding: 5px 12px 0 12px;
        }

        .map-area iframe {
            height: 300px;
        }
    }

    /* ✅ Desktop Map Styling */
    .contact_map {
        background-color: #fff;
        padding: 10px 80px 5px 80px;
    }

    .map-area {
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        border: 1px solid #00b2a2;
    }

    .map-area iframe {
        width: 100%;
        height: 500px;
        border: none;
        display: block;
    }
</style>

<!-- ✅ Flash Messages -->
<div class="container">
    <div class="row">
        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php if (session()->has('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- ✅ Contact Section Start -->
<div class="contact_area">
    <div class="container">
        <div class="contact_box_wrapper">
            <div class="row">
                <!-- Info Column -->
                <div class="col-lg-6 col-md-12 mb-4 contact_info">
                    <h2 class="contact_heading">Contact Us | QASWA TELECOM</h2>
                    <p class="contact_text">
                        Got questions or need quick support? <strong>QASWA TELECOM</strong> is here to help! Whether you’re facing screen damage, battery issues, or any technical glitch — we offer fast, doorstep repairs across Mumbai. Experience reliable service, premium parts, and peace of mind.
                    </p>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> Shop No-8, 1st Floor Thakkar Shopping Mall, S.V Road, Borivali West, Mumbai-400092</li>
                        <li><i class="fa fa-envelope"></i> <a href="mailto:support@qaswatelecom.com">support@qaswatelecom.com</a></li>
                        <li><i class="fa fa-phone"></i> 
                            <a href="tel:9324316048">9324316048</a><br>
                            <a href="tel:9892552039">9892552039</a>
                        </li>
                    </ul>
                </div>

                <!-- Form Column -->
                <div class="col-lg-6 col-md-12">
                    <div class="contact_form_area">
                        <h3>Get in Touch</h3>
                        <form method="POST" action="<?= base_url('/Contact') ?>">
                            <?= csrf_field() ?>
                            <div class="form_row_two">
                                <div style="width: 100%;">
                                    <input type="text" name="name" placeholder="Your Full Name" value="<?= old('name') ?>">
                                    <small class="text-danger"><?= validation_show_error('name') ?></small>
                                </div>
                                <div style="width: 100%;">
                                    <input type="text" name="last_name" placeholder="Last Name" value="<?= old('last_name') ?>">
                                    <small class="text-danger"><?= validation_show_error('last_name') ?></small>
                                </div>
                            </div>
                            <input type="text" name="mobile" placeholder="Phone Number" value="<?= old('mobile') ?>">
                            <small class="text-danger"><?= validation_show_error('mobile') ?></small>
                            <input type="email" name="email" placeholder="Email Address" value="<?= old('email') ?>">
                            <small class="text-danger"><?= validation_show_error('email') ?></small>
                            <input type="text" name="city" placeholder="Enter city name" value="<?= old('city') ?>">
                            <small class="text-danger"><?= validation_show_error('city') ?></small>
                            <select name="subject">
                                <option value="">Reason for contact</option>
                                <option value="Repair" <?= old('subject') == 'Repair' ? 'selected' : '' ?>>Repair</option>
                                <option value="Support" <?= old('subject') == 'Support' ? 'selected' : '' ?>>Support</option>
                                <option value="Other" <?= old('subject') == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                            <small class="text-danger"><?= validation_show_error('subject') ?></small>
                            <textarea name="message" placeholder="Message (Optional)" rows="4"><?= old('message') ?></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ✅ Contact Section End -->

<!-- ✅ Map Section Styles -->
<style>
    .contact_map {
        background-color: #fff;
        padding: 0px 0 30px; /* ✅ Less top-bottom spacing */
        display: flex;
        justify-content: center;
    }

    .map-area {
        border: 1px solid #00b2a2; /* ✅ 1px stroke with brand color */
        border-radius: 16px;
        overflow: hidden;
        width: 100%;
        max-width: 1240px; /* ✅ Matches main container width */
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    }

    .map-area iframe {
        width: 100%;
        height: 460px; /* ✅ Increased height on desktop */
        display: block;
        border: none;
    }

    @media (max-width: 767px) {
        .contact_map {
            padding: 0px 0 20px;
        }

        .map-area {
            margin: 0 10px;
            border-radius: 12px;
        }

        .map-area iframe {
            height: 320px; /* ✅ Adjusted for mobile */
        }
    }
</style>

<!-- ✅ Map Section Start -->
<div class="contact_map">
    <div class="map-area">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.2553983700723!2d72.85271157395538!3d19.227697947195125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b14eedc40e07%3A0x843355757cabb7c2!2sQASWA%20TELECOM%20And%20Training%20Institute!5e0!3m2!1sen!2sin!4v1742985354891!5m2!1sen!2sin" 
            allowfullscreen 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>
<!-- ✅ Map Section End -->

<?= view('web/partials/footer.php') ?>