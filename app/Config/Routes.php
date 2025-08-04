<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;
use Config\Services;

$routes = Services::routes();

$routes->setDefaultNamespace('App\\Controllers');
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);      
$routes->set404Override();    

// $routes->setAutoRoute(true);

$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');
$routes->get('/Login', 'Home::userLogin');
$routes->post('/Login', 'Home::userLogin');

$routes->post('/send-otp', 'Home::sendOtp');
$routes->post('/verifyotp', 'Home::verifyOTP');
$routes->get('/verifyotp', 'Home::verifyOTP');
$routes->get('/Logout', 'Home::userLogout');
$routes->get('/About', 'Home::AboutUs');
$routes->get('/Blogs', 'Home::Blogs');
$routes->get('/Gallery', 'Home::Gallery');
$routes->get('/blogDetails/(:any)', 'Home::blogDetails/$1');
$routes->get('/Contact', 'Home::ContactUs');
$routes->post('/Contact', 'Home::enquiryMail');
$routes->get('/EwastePolicy', 'Home::EwastePolicy');
$routes->get('/PrivacyPolicy', 'Home::PrivacyPolicy');
$routes->get('/TermsCondition', 'Home::TermsCondition');
$routes->get('/WarrantyPolicy', 'Home::WarrantyPolicy');
$routes->get('/FAQ', 'Home::FAQ');

$routes->get('/brands', 'Home::Brands');
$routes->get('(:segment)/(:segment)/models', 'Home::appleModels/$1/$2');
$routes->post('(:segment)/(:segment)/models', 'Home::appleModels/$1/$2');
$routes->get('(:segment)/models', 'Home::Models/$1');
$routes->post('(:segment)/models', 'Home::Models/$1');
$routes->get('(:segment)/(:segment)/services', 'Home::modelServices/$1/$2');
$routes->post('/add-to-cart', 'Home::addToCart');
$routes->get('/cart-remove/(:segment)', 'Home::removeToCart/$1');
$routes->get('/cart-remove-other/(:num)/(:segment)', 'Home::removeOtherToCart/$1/$2');
$routes->get('/Checkout', 'Home::Checkout');
$routes->post('/Checkout', 'Home::Checkout');
$routes->post('/order-confirm', 'Home::orderConfirm');
$routes->get('/myOrders', 'Home::myOrders');
$routes->get('/orderDetails/(:segment)', 'Home::orderDetails/$1');
$routes->post('cancel-order/(:segment)', 'Home::cancelOrder/$1');
$routes->post('reschedule-order', 'Home::rescheduleOrder');
$routes->get('getWarrantyDetails/(:num)', 'Home::getWarrantyDetails/$1');
// $routes->get('' 'Home::');

// Admin Routes
$routes->get('/admin/godown/add_product', 'ControllerGodown::add_product');
$routes->post('/admin/godown/add_product', 'ControllerGodown::add_product');

$routes->get('/admin', 'Controllerlogin::index');
$routes->post('/admin', 'Controllerlogin::login');
$routes->get('/admin/change-password', 'Controllerlogin::changepass');
$routes->post('/admin/update-password', 'Controllerlogin::updatePassword');
$routes->get('/admin/logout', 'Controllerlogin::Logout');

$routes->get('/admin/dashboard', 'Controllerlogin::Dashboard');
$routes->get('/admin/Brands', 'Brand::index');
$routes->get('/admin/add-brand', 'Brand::addBrand');
$routes->post('/admin/add-brand', 'Brand::addBrand');
$routes->get('/admin/edit-brand/(:any)', 'Brand::editBrand/$1');
$routes->post('/admin/edit-brand/(:any)', 'Brand::updateBrand/$1');
$routes->get('/admin/delete-brand/(:any)', 'Brand::deleteBrand/$1');

$routes->get('/admin/Models', 'Model::index');
$routes->get('/admin/add-model', 'Model::addModel');
$routes->post('/admin/add-model', 'Model::addModel');
$routes->get('/admin/edit-model/(:any)', 'Model::editModel/$1');
$routes->post('/admin/edit-model/(:any)', 'Model::updateModel/$1');
$routes->get('/admin/delete-model/(:any)', 'Model::deleteModel/$1');
$routes->get('/admin/get-model/(:any)', 'Model::getModelsByBrand/$1');

$routes->get('/admin/Services', 'Service::index');
$routes->get('/admin/add-service', 'Service::addService');
$routes->post('/admin/add-service', 'Service::addService');
$routes->get('/admin/edit-service/(:any)', 'Service::editService/$1');
$routes->post('/admin/edit-service/(:any)', 'Service::updateService/$1');
$routes->get('/admin/delete-service/(:any)', 'Service::deleteService/$1');

$routes->get('/admin/Orders', 'Order::index');
$routes->get('/admin/view-order/(:any)', 'Order::viewOrder/$1');
$routes->post('/admin/view-order/(:any)', 'Order::updateOrderStatus/$1');

$routes->get('/admin/Banners', 'Banner::index');
$routes->get('/admin/add-banner', 'Banner::addBanner');
$routes->post('/admin/add-banner', 'Banner::addBanner');
$routes->get('/admin/delete-banner/(:any)', 'Banner::deleteBanner/$1');

$routes->get('/admin/Gallery', 'Gallery::index');
$routes->get('/admin/add-gallery', 'Gallery::addGallery');
$routes->post('/admin/add-gallery', 'Gallery::addGallery');
$routes->get('/admin/delete-gallery/(:any)', 'Gallery::deleteGallery/$1');

$routes->get('/admin/Blog', 'Blog::index');
$routes->get('/admin/add-blog', 'Blog::addBlog');
$routes->post('/admin/add-blog', 'Blog::addBlog');
$routes->get('/admin/edit-blog/(:any)', 'Blog::editBlog/$1');
$routes->post('/admin/edit-blog/(:any)', 'Blog::updateBlog/$1');
$routes->get('/admin/delete-blog/(:any)', 'Blog::deleteBlog/$1');

$routes->get('/admin/Videos', 'Videos::index');
$routes->get('/admin/add-video', 'Videos::addVideo');
$routes->post('/admin/add-video', 'Videos::addVideo');
$routes->get('/admin/delete-video/(:any)', 'Videos::deleteBlog/$1');

$routes->get('/admin/Issues', 'Issue::index');
$routes->get('/admin/add-issue', 'Issue::addIssue');
$routes->post('/admin/add-issue', 'Issue::addIssue');
$routes->get('/admin/edit-issue/(:any)', 'Issue::editIssue/$1');
$routes->post('/admin/edit-issue/(:any)', 'Issue::updateIssue/$1');
$routes->get('/admin/delete-issue/(:any)', 'Issue::deleteIssue/$1');

$routes->get('/admin/Mobile', 'Contact::Mobile');
$routes->get('/admin/add-mobile', 'Contact::addMobile');
$routes->post('/admin/add-mobile', 'Contact::addMobile');
$routes->get('/admin/edit-mobile/(:any)', 'Contact::editMobile/$1');
$routes->post('/admin/edit-mobile/(:any)', 'Contact::updateMobile/$1');
$routes->get('/admin/delete-mobile/(:any)', 'Contact::deleteMobile/$1');

$routes->get('/admin/Email', 'Contact::Email');
$routes->get('/admin/add-email', 'Contact::addEmail');
$routes->post('/admin/add-email', 'Contact::addEmail');
$routes->get('/admin/edit-email/(:any)', 'Contact::editEmail/$1');
$routes->post('/admin/edit-email/(:any)', 'Contact::updateEmail/$1');
$routes->get('/admin/delete-email/(:any)', 'Contact::deleteEmail/$1');

$routes->get('/admin/Address', 'Contact::Address');
$routes->get('/admin/add-address', 'Contact::addAddress');
$routes->post('/admin/add-address', 'Contact::addAddress');
$routes->get('/admin/edit-address/(:any)', 'Contact::editAddress/$1');
$routes->post('/admin/edit-address/(:any)', 'Contact::updateAddress/$1');
$routes->get('/admin/delete-address/(:any)', 'Contact::deleteAddress/$1');

$routes->get('/admin/TermsCondition', 'Contact::TermsCondition');
$routes->get('/admin/add-terms-condition', 'Contact::addTermsCondition');
$routes->post('/admin/add-terms-condition', 'Contact::addTermsCondition');
$routes->get('/admin/edit-terms-condition/(:any)', 'Contact::editTermsCondition/$1');
$routes->post('/admin/edit-terms-condition/(:any)', 'Contact::updateTermsCondition/$1');
$routes->get('/admin/delete-terms-condition/(:any)', 'Contact::deleteTermsCondition/$1');

$routes->get('/admin/WarrantyPolicy', 'Contact::WarrantyPolicy');
$routes->get('/admin/add-warranty-policy', 'Contact::addWarrantyPolicy');
$routes->post('/admin/add-warranty-policy', 'Contact::addWarrantyPolicy');
$routes->get('/admin/edit-warranty-policy/(:any)', 'Contact::editWarrantyPolicy/$1');
$routes->post('/admin/edit-warranty-policy/(:any)', 'Contact::updateWarrantyPolicy/$1');
$routes->get('/admin/delete-warranty-policy/(:any)', 'Contact::deleteWarrantyPolicy/$1');

$routes->get('/admin/About', 'Contact::AboutUs');
$routes->get('/admin/add-about', 'Contact::addAboutUs');
$routes->post('/admin/add-about', 'Contact::addAboutUs');
$routes->get('/admin/edit-about/(:any)', 'Contact::editAboutUs/$1');
$routes->post('/admin/edit-about/(:any)', 'Contact::updateAboutUs/$1');
$routes->get('/admin/delete-about/(:any)', 'Contact::deleteAboutUs/$1');

$routes->get('/admin/EwastePolicy', 'Contact::EwastePolicy');
$routes->get('/admin/add-EwastePolicy', 'Contact::addEwastePolicy');
$routes->post('/admin/add-EwastePolicy', 'Contact::addEwastePolicy');
$routes->get('/admin/edit-EwastePolicy/(:any)', 'Contact::editEwastePolicy/$1');
$routes->post('/admin/edit-EwastePolicy/(:any)', 'Contact::updateEwastePolicy/$1');
$routes->get('/admin/delete-EwastePolicy/(:any)', 'Contact::deleteEwastePolicy/$1');

$routes->get('/admin/PrivacyPolicy', 'Contact::PrivacyPolicy');
$routes->get('/admin/add-PrivacyPolicy', 'Contact::addPrivacyPolicy');
$routes->post('/admin/add-PrivacyPolicy', 'Contact::addPrivacyPolicy');
$routes->get('/admin/edit-PrivacyPolicy/(:any)', 'Contact::editPrivacyPolicy/$1');
$routes->post('/admin/edit-PrivacyPolicy/(:any)', 'Contact::updatePrivacyPolicy/$1');
$routes->get('/admin/delete-PrivacyPolicy/(:any)', 'Contact::deletePrivacyPolicy/$1');

$routes->get('/admin/FAQ', 'FAQ::index');
$routes->get('/admin/add-faq', 'FAQ::addFAQ');
$routes->post('/admin/add-faq', 'FAQ::addFAQ');
$routes->get('/admin/edit-faq/(:any)', 'FAQ::editFAQ/$1');
$routes->post('/admin/edit-faq/(:any)', 'FAQ::updateFAQ/$1');
$routes->get('/admin/delete-faq/(:any)', 'FAQ::deleteFAQ/$1');

$routes->get('/admin/Testimonials', 'Testimonial::index');
$routes->get('/admin/add-testimonial', 'Testimonial::addTestimonials');
$routes->post('/admin/add-testimonial', 'Testimonial::addTestimonials');
$routes->get('/admin/delete-testimonial/(:any)', 'Testimonial::deleteTestimonials/$1');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
