<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <?php $uri = service('uri');
            $segment = $uri->getSegment(2); ?>
            <ul>
                <li class="menu-title"><span class="abcd_main">Main</span></li>
                <!-- =======   Manage Contact Details ===========     -->
                <li class="submenu <?= ($segment == 'Mobile' || $segment == 'Email' || $segment == 'Address') ? 'active' : '' ?>">
                    <a href="#"><i data-feather="file-text"></i><span>Manage Godown Details</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li class="<?= ($segment == 'Mobile') ? 'active' : '' ?>"><a href="<?= base_url('/admin/godown/add_product') ?>">insert prod in godown</a></li>
                        <li class="<?= ($segment == 'Email') ? 'active' : '' ?>"><a href="<?= base_url('admin/Email') ?>">Manage Email</a></li>
                        <li class="<?= ($segment == 'Address') ? 'active' : '' ?>"><a href="<?= base_url('admin/Address') ?>">Manage Address</a></li>
                    </ul>
                </li>
                <!-- ================================ -->
                <li class="<?= ($segment == 'Brands') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Brands') ?>">
                        <i data-feather="star"></i><span>Manage Brands</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Models') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Models') ?>">
                        <i data-feather="layers"></i><span>Manage Models</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Services') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Services') ?>">
                        <i data-feather="tool"></i><span>Manage Repair Services</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Orders') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Orders') ?>">
                        <i data-feather="shopping-bag"></i><span>Manage All Users Order</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Banners') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Banners') ?>">
                        <i data-feather="image"></i><span>Manage Banners</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Gallery') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Gallery') ?>">
                        <i data-feather="grid"></i><span>Manage Gallery</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Blog') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Blog') ?>">
                        <i data-feather="grid"></i><span>Manage Blogs</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Videos') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Videos') ?>">
                        <i data-feather="video"></i><span>Manage Videos</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Issues') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Issues') ?>">
                        <i data-feather="alert-circle"></i><span>Manage Common Issues</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'About') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/About') ?>">
                        <i data-feather="info"></i><span>Manage About Us</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'FAQ') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/FAQ') ?>">
                        <i data-feather="help-circle"></i><span>Manage FAQs</span>
                    </a>
                </li>
                <li class="<?= ($segment == 'Testimonials') ? 'active' : '' ?>">
                    <a href="<?= base_url('admin/Testimonials') ?>">
                        <i data-feather="message-circle"></i><span>Manage Testimonials</span>
                    </a>
                </li>
                <!-- =======   Manage Contact Details ===========     -->
                <li class="submenu <?= ($segment == 'Mobile' || $segment == 'Email' || $segment == 'Address') ? 'active' : '' ?>">
                    <a href="#"><i data-feather="file-text"></i><span>Manage Contact Details</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li class="<?= ($segment == 'Mobile') ? 'active' : '' ?>"><a href="<?= base_url('admin/Mobile') ?>">Manage Mobile Number</a></li>
                        <li class="<?= ($segment == 'Email') ? 'active' : '' ?>"><a href="<?= base_url('admin/Email') ?>">Manage Email</a></li>
                        <li class="<?= ($segment == 'Address') ? 'active' : '' ?>"><a href="<?= base_url('admin/Address') ?>">Manage Address</a></li>
                    </ul>
                </li>
                <!-- =======   Manage Policies ===========     -->
                <li class="submenu <?= ($segment == 'TermsCondition' || $segment == 'WarrantyPolicy' || $segment == 'EwastePolicy' || $segment == 'PrivacyPolicy') ? 'active' : '' ?>">
                    <a href="#"><i data-feather="file-text"></i><span>Manage Policies</span><span class="menu-arrow"></span></a>
                    <ul>
                        <li class="<?= ($segment == 'TermsCondition') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/TermsCondition') ?>">
                                Manage Term & Conditions
                            </a>
                        </li>
                        <li class="<?= ($segment == 'PrivacyPolicy') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/PrivacyPolicy') ?>">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="<?= ($segment == 'WarrantyPolicy') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/WarrantyPolicy') ?>">
                                Manage Warranty policy
                            </a>
                        </li>
                        <li class="<?= ($segment == 'EwastePolicy') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/EwastePolicy') ?>">
                                Manage E-waste Policy
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->