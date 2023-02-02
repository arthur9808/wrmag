<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Add middelware auth role admin by group
Route::group(['middleware' => ['auth', 'role:admin']], function () {

    //Add prefix admin to all routes
    Route::group(['prefix' => 'admin'], function () {

        Route::get('magazine', [App\Http\Controllers\HomeController::class, 'magazine'])->name('magazine');
        Route::get('homepage', [App\Http\Controllers\HomeController::class, 'homepage'])->name('homepage');
        Route::post('/update-homepage-profiles', [App\Http\Controllers\HomeController::class, 'homepagePost'])->name('homepage');
        

        //Add prefix coach to all routes
        Route::group(['prefix' => 'coaches'], function () {
            Route::get('/', [App\Http\Controllers\CoachController::class, 'index'])->name('coaches.index');
            Route::get('/sort', [App\Http\Controllers\CoachController::class, 'indexSortable'])->name('coaches.sort');
            Route::get('/create', [App\Http\Controllers\CoachController::class, 'create'])->name('coaches.create');
            Route::post('/', [App\Http\Controllers\CoachController::class, 'store'])->name('coaches.store');
            Route::post('/update-order', [App\Http\Controllers\CoachController::class, 'updateOrder'])->name('coaches.updateOrder');
            Route::get('/{coach}', [App\Http\Controllers\CoachController::class, 'show'])->name('coaches.show');
            Route::get('/{coach}/edit', [App\Http\Controllers\CoachController::class, 'edit'])->name('coaches.edit');
            Route::put('/{coach}', [App\Http\Controllers\CoachController::class, 'update'])->name('coaches.update');
            Route::delete('/{coach}', [App\Http\Controllers\CoachController::class, 'destroy'])->name('coaches.destroy');
            Route::get('/{coach}/{image}/featured', [App\Http\Controllers\CoachController::class, 'deleteImage'])->name('coaches.featured');
        });

        //Add prefix profile to all routes
        Route::group(['prefix' => 'profiles'], function () {
            Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profiles.index');
            Route::get('/sort', [App\Http\Controllers\ProfileController::class, 'indexSortable'])->name('profiles.sort');
            Route::get('/top-100', [App\Http\Controllers\ProfileController::class, 'top_one_hundred'])->name('profiles.top100');
            Route::get('/sort-top-100', [App\Http\Controllers\ProfileController::class, 'sortTopOneHundred'])->name('profiles.top100.sort');
            Route::get('/create', [App\Http\Controllers\ProfileController::class, 'create'])->name('profiles.create');
            Route::post('/', [App\Http\Controllers\ProfileController::class, 'store'])->name('profiles.store');
            Route::post('/top_one_hundred', [App\Http\Controllers\ProfileController::class, 'topOneHundredStore'])->name('profiles.top100');
            Route::post('/update-order', [App\Http\Controllers\ProfileController::class, 'updateOrder'])->name('profiles.updateOrder');
            Route::post('/update-top-one-hundrer', [App\Http\Controllers\ProfileController::class, 'updateTopOneHundred'])->name('profiles.updateTopOneHundred');
            Route::get('/{profile}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profiles.show');
            Route::get('/{profile}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit');
            Route::put('/{profile}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profiles.update');
            Route::delete('/{profile}', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profiles.destroy');
            Route::put('/{profile}/cancel', [App\Http\Controllers\StripeController::class, 'cancelSubscription'])->name('profiles.update');
            Route::put('/{profile}/delete-top-one-hundred', [App\Http\Controllers\ProfileController::class, 'deleteTopOneHundred'])->name('profiles.deleteTopOneHundred');
            Route::post('/{profile}/resend', [App\Http\Controllers\FrontendController::class, 'sendConfirmationEmail'])->name('profiles.resend');
            Route::get('/{profile}/upgrade', [App\Http\Controllers\ProfileController::class, 'upgradeMembership'])->name('profiles.upgrade');
            Route::put('/{profile}/upgrade', [App\Http\Controllers\StripeController::class, 'upgradeMembershipPost'])->name('profiles.upgrade');
            Route::get('/{profile}/upgrade-paid', [App\Http\Controllers\ProfileController::class, 'upgradeMembership'])->name('profiles.upgrade-paid');
            Route::get('/{profile}/user-notification', [App\Http\Controllers\ProfileController::class, 'userNotificationForDelete'])->name('profiles.user-notification');
            Route::post('/send-all-confirmation-emails', [App\Http\Controllers\FrontendController::class, 'sendAllConfirmationEmails'])->name('profiles.send-all-confirmation-emails');
        });

        //Add prefix membership to all routes
        Route::group(['prefix' => 'memberships'], function () {
            Route::get('/', [App\Http\Controllers\MembershipController::class, 'index'])->name('memberships.index');
            Route::get('/create', [App\Http\Controllers\MembershipController::class, 'create'])->name('memberships.create');
            Route::post('/', [App\Http\Controllers\MembershipController::class, 'store'])->name('memberships.store');
            Route::get('/{membership}', [App\Http\Controllers\MembershipController::class, 'show'])->name('memberships.show');
            Route::get('/{membership}/edit', [App\Http\Controllers\MembershipController::class, 'edit'])->name('memberships.edit');
            Route::put('/{membership}', [App\Http\Controllers\MembershipController::class, 'update'])->name('memberships.update');
            Route::delete('/{membership}', [App\Http\Controllers\MembershipController::class, 'destroy'])->name('memberships.destroy');
        });

        //Add prefix benefit to all routes
        Route::group(['prefix' => 'benefits'], function () {
            Route::get('/', [App\Http\Controllers\BenefitController::class, 'index'])->name('benefits.index');
            Route::get('/create', [App\Http\Controllers\BenefitController::class, 'create'])->name('benefits.create');
            Route::post('/', [App\Http\Controllers\BenefitController::class, 'store'])->name('benefits.store');
            Route::get('/{benefit}', [App\Http\Controllers\BenefitController::class, 'show'])->name('benefits.show');
            Route::get('/{benefit}/edit', [App\Http\Controllers\BenefitController::class, 'edit'])->name('benefits.edit');
            Route::put('/{benefit}', [App\Http\Controllers\BenefitController::class, 'update'])->name('benefits.update');
            Route::delete('/{benefit}', [App\Http\Controllers\BenefitController::class, 'destroy'])->name('benefits.destroy');
        });

        //Add prefix faq to all routes
        Route::group(['prefix' => 'faqs'], function () {
            Route::get('/', [App\Http\Controllers\FaqsController::class, 'index'])->name('faqs.index');
            Route::get('/create', [App\Http\Controllers\FaqsController::class, 'create'])->name('faqs.create');
            Route::post('/', [App\Http\Controllers\FaqsController::class, 'store'])->name('faqs.store');
            Route::get('/{faq}', [App\Http\Controllers\FaqsController::class, 'show'])->name('faqs.show');
            Route::get('/{faq}/edit', [App\Http\Controllers\FaqsController::class, 'edit'])->name('faqs.edit');
            Route::put('/{faq}', [App\Http\Controllers\FaqsController::class, 'update'])->name('faqs.update');
            Route::delete('/{faq}', [App\Http\Controllers\FaqsController::class, 'destroy'])->name('faqs.destroy');
        });

        //Add prefix payment to all routes
        Route::group(['prefix' => 'payments'], function () {
            Route::get('/profiles', [App\Http\Controllers\PaymentController::class, 'indexProfiles'])->name('payments.profiles');
            Route::get('/', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
            Route::get('/live-stripe', [App\Http\Controllers\PaymentController::class, 'paymentsStripe'])->name('payments.live-stripe');
        });

        //Add prefix settings to all routes
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
            Route::get('/social-media', [App\Http\Controllers\SettingController::class, 'socialMedia'])->name('settings.social-media');
            Route::get('/social-media/{setting}/edit', [App\Http\Controllers\SettingController::class, 'socialMediaEdit'])->name('settings.social-media.edit');
            Route::put('/social-media/{setting}', [App\Http\Controllers\SettingController::class, 'socialMediaUpdate'])->name('settings.social-media.update');
            Route::get('/contact-form', [App\Http\Controllers\SettingController::class, 'contactForm'])->name('settings.contact-form');
            Route::get('/contact-form/{setting}/edit', [App\Http\Controllers\SettingController::class, 'contactFormEdit'])->name('settings.contact-form.edit');
            Route::put('/contact-form/{setting}', [App\Http\Controllers\SettingController::class, 'contactFormUpdate'])->name('settings.contact-form.update');
        });

        //Add prefix profile to all routes
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('profile.change-password');
            Route::put('/change-password', [App\Http\Controllers\HomeController::class, 'changePasswordUpdate'])->name('profile.change-password.update');
            Route::get('/update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update-profile');
            Route::put('/update-profile', [App\Http\Controllers\HomeController::class, 'updateProfileUpdate'])->name('profile.update-profile.update');
            Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('profile.index');
        });

        //Add prefix universties to all routes
        Route::group(['prefix' => 'universities'], function () {
            Route::get('/', [App\Http\Controllers\UniversityController::class, 'index'])->name('universities.index');
            Route::get('/create', [App\Http\Controllers\UniversityController::class, 'create'])->name('universities.create');
            Route::post('/', [App\Http\Controllers\UniversityController::class, 'store'])->name('universities.store');
            Route::get('/{university}', [App\Http\Controllers\UniversityController::class, 'show'])->name('universities.show');
            Route::get('/{university}/edit', [App\Http\Controllers\UniversityController::class, 'edit'])->name('universities.edit');
            Route::put('/{university}', [App\Http\Controllers\UniversityController::class, 'update'])->name('universities.update');
            Route::delete('/{university}', [App\Http\Controllers\UniversityController::class, 'destroy'])->name('universities.destroy');
        });


    });
});


//Stripe Routes
Route::get('/stripe', [App\Http\Controllers\StripeController::class, 'index'])->name('stripe.index');

//Frontend Routes
Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('frontend.home');
Route::get('/ada', [App\Http\Controllers\FrontendController::class, 'ada'])->name('frontend.ada');
Route::get('/privacy-policy', [App\Http\Controllers\FrontendController::class, 'privacyPolicy'])->name('frontend.privacy-policy');
Route::get('/sign-in', [App\Http\Controllers\FrontendController::class, 'loginFrontEnd'])->name('frontend.login');
Route::post('/sign-in', [App\Http\Controllers\FrontendController::class, 'loginProfile'])->name('frontend.login.profile');
Route::get('/redirect-profile', [App\Http\Controllers\FrontendController::class, 'redirectToProfile'])->name('frontend.redirect-profile');
Route::get('/profiles', [App\Http\Controllers\FrontendController::class, 'profiles'])->name('frontend.profiles');
// Route::get('/top-100-qb', [App\Http\Controllers\FrontendController::class, 'topOneHundredProfiles'])->name('frontend.top-100-profiles');
Route::get('/search-profiles', [App\Http\Controllers\FrontendController::class, 'searchProfiles'])->name('frontend.search-profiles');
Route::get('/memberships', [App\Http\Controllers\FrontendController::class, 'memberships'])->name('frontend.memberships');
Route::get('/coaches', [App\Http\Controllers\FrontendController::class, 'coaches'])->name('frontend.coaches');
Route::get('/coach/{id}', [App\Http\Controllers\FrontendController::class, 'coach'])->name('frontend.coach');
Route::get('/search-coach', [App\Http\Controllers\CoachController::class, 'searchCoaches'])->name('frontend.search-coach');
Route::get('/tour', [App\Http\Controllers\FrontendController::class, 'tour'])->name('frontend.tour');
Route::get('/contactus', [App\Http\Controllers\FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contactus', [App\Http\Controllers\FrontendController::class, 'sendMailContactForm'])->middleware(ProtectAgainstSpam::class);
Route::get('/faqs', [App\Http\Controllers\FrontendController::class, 'faqs'])->name('frontend.faqs');
Route::get('/sign-up', [App\Http\Controllers\FrontendController::class, 'signUp'])->name('frontend.signup');
Route::post('/sign-up', [App\Http\Controllers\StripeController::class, 'completedPaymentFree'])->name('frontend.signup.post')->middleware(ProtectAgainstSpam::class);
Route::get('/log-out', [App\Http\Controllers\FrontendController::class, 'logOutProfile'])->name('frontend.logout');
Route::get('/log-out-admin', [App\Http\Controllers\FrontendController::class, 'logOutAdmin'])->name('frontend.logout-admin');
Route::get('/get-social-media', [App\Http\Controllers\FrontendController::class, 'socialMedia'])->name('frontend.social-media');
Route::get('/reset-password', [App\Http\Controllers\FrontendController::class, 'resetPassword'])->name('frontend.reset-password');
Route::post('/reset-password', [App\Http\Controllers\FrontendController::class, 'resetPasswordPost'])->name('frontend.reset-password.post');
Route::get('/reset-password-profile/{password_token}', [App\Http\Controllers\FrontendController::class, 'changePasswordWithToken'])->name('frontend.reset-password-profile');
Route::post('/reset-password-profile', [App\Http\Controllers\FrontendController::class, 'changePasswordWithTokenPost'])->name('frontend.reset-password.post');

//Profile Routes
Route::get('/profile/{slug}', [App\Http\Controllers\ProfileController::class, 'userProfile'])->name('profile.index');
Route::get('/profile-about/{slug}', [App\Http\Controllers\ProfileController::class, 'profileAbout'])->name('profile.about');
Route::post('/profile-about', [App\Http\Controllers\ProfileController::class, 'profileAboutSave'])->name('profile.about.save');
Route::post('/profile-update', [App\Http\Controllers\ProfileController::class, 'profileUpdate'])->name('profile.update');
Route::get('/profile-performance/{slug}', [App\Http\Controllers\ProfileController::class, 'profilePerformance'])->name('profile.performance');
Route::post('/profile-performance', [App\Http\Controllers\ProfileController::class, 'profilePerformanceSave']);
Route::get('/profile-academic/{slug}', [App\Http\Controllers\ProfileController::class, 'profileAcademic'])->name('profile.academic');
Route::post('/profile-academic', [App\Http\Controllers\ProfileController::class, 'profileAcademicSave']);
Route::get('/profile-media/{slug}', [App\Http\Controllers\ProfileController::class, 'profileMedia'])->name('profile.media');
Route::post('/profile-media', [App\Http\Controllers\ProfileController::class, 'profileMediaSave'])->name('profile.media.save');
Route::post('/profile-media-data', [App\Http\Controllers\ProfileController::class, 'profileMediaSaveData'])->name('profile.media.save.data');
Route::post('/validate-password-profile', [App\Http\Controllers\FrontendController::class, 'validatePasswordProfile'])->name('profile.validate.password');
Route::get('/get-profile-media/{id}', [App\Http\Controllers\ProfileController::class, 'getProfileMedia'])->name('profile.media.get');
Route::post('/delete-profile-media/{image_name}', [App\Http\Controllers\ProfileController::class, 'profileMediaDelete'])->name('profile.media.delete');
Route::post('/sort-profile-media', [App\Http\Controllers\ProfileController::class, 'orderMedia'])->name('profile.media.order');
Route::get('/confirm-email', [App\Http\Controllers\FrontendController::class, 'confirmEmail'])->name('frontend.confirm-email');
Route::get('/send-confirmation-email/{id}', [App\Http\Controllers\FrontendController::class, 'sendConfirmationEmail'])->name('frontend.send-confirmation-email');
Route::get('/confirm-email-save/{id}', [App\Http\Controllers\FrontendController::class, 'confirmEmailSave'])->name('frontend.confirm-email-save');
Route::post('/profile-academic-remove-test', [App\Http\Controllers\ProfileController::class, 'removeAcademicTest'])->name('profile.academic.remove-test');
//Route to get membership information and payment
Route::get('/complete-payment/{membership}', [App\Http\Controllers\StripeController::class, 'completePayment'])->name('stripe.complete-payment');
Route::get('/upgrade-membership/{membership}', [App\Http\Controllers\StripeController::class, 'upgradeMembershipTest'])->name('stripe.upgrade-membership');
Route::get('/complete-payment-free/{membership}', [App\Http\Controllers\StripeController::class, 'completePaymentFree'])->name('stripe.complete-payment-free');
Route::get('/complete-payment-logged-free/{membership}', [App\Http\Controllers\StripeController::class, 'completePaymentLoggedFree'])->name('stripe.complete-payment-logged-free');
Route::get('/complete-payment-logged/{membership}', [App\Http\Controllers\StripeController::class, 'completePaymentLogged'])->name('stripe.complete-payment-logged');
Route::post('/complete-payment', [App\Http\Controllers\StripeController::class, 'completedPayment'])->name('stripe.completed-payment');
Route::post('/complete-upgrade', [App\Http\Controllers\StripeController::class, 'completedUpgrade'])->name('stripe.completed-upgrade');
Route::post('/complete-payment-free', [App\Http\Controllers\StripeController::class, 'completedPaymentFree'])->name('stripe.completed-payment-free');
Route::post('/complete-payment-logged', [App\Http\Controllers\StripeController::class, 'completedPaymentLogged'])->name('stripe.complete-payment-logged');
Route::get('/upgrade-data-payment/{profile}', [App\Http\Controllers\StripeController::class, 'upgradeDataPayment'])->name('stripe.upgrade-data-payment');
Route::post('/upgrade-data-payment', [App\Http\Controllers\StripeController::class, 'upgradeDataPaymentPost'])->name('stripe.upgrade-data-payment-post');
Route::get('/stripes', [App\Http\Controllers\StripeController::class, 'viewStripe']);
Route::post('/stripes', [App\Http\Controllers\StripeController::class, 'buyAStripePlan']);

//Test Routes
Route::get('/fill-slugs', [App\Http\Controllers\StripeController::class, 'generateAndSaveSlugs'])->name('stripe.fill-slugs');
Route::get('/fill-academic-stats', [App\Http\Controllers\ProfileController::class, 'fillAcademicStats'])->name('profile.fill-academic-stats');
Route::get('/fix-social-media-users', [App\Http\Controllers\ProfileController::class, 'fixSocialMediaUsers'])->name('profile.fix-social-media-users');
Route::get('/fix-profile-country', [App\Http\Controllers\ProfileController::class, 'fixCountryProfile'])->name('profile.fix-profile-country');
Route::get('/check-memberships', [App\Http\Controllers\StripeController::class, 'checkMemberships'])->name('stripe.check-memberships');
Route::get('/fix-phone-numbers', [App\Http\Controllers\ProfileController::class, 'fixPhoneNumbers'])->name('profile.get-school-names');
Route::get('/fix-coach-phone', [App\Http\Controllers\FrontendController::class, 'fixCoachPhone'])->name('frontend.fix-coach-email');
Route::get('/fix-parents-email', [App\Http\Controllers\ProfileController::class, 'fixParentsEmail'])->name('frontend.fix-parents-email');
Route::get('/confirm-email-view', [App\Http\Controllers\FrontendController::class, 'confirmEmailView'])->name('frontend.confirm-email-view');
Route::get('/get-profiles-test', [App\Http\Controllers\FrontendController::class, 'profilesTest'])->name('profile.get-profiles-test');
Route::get('/fix-top-profiles', [App\Http\Controllers\FrontendController::class, 'fixTopProfiles'])->name('frontend.fix-top-profiles');