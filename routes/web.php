<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AccountTypeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\SaleReportController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\Admin\GoalController;
use App\Http\Controllers\Admin\SupplyController;
use App\Http\Controllers\Admin\CuponCodeController;
use App\Http\Controllers\UpdateCodeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserOrderController;
use App\Http\Controllers\VIPRequestController;
use App\Http\Controllers\Auth\SocialAuthController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('product_categories', ProductCategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('account_types', AccountTypeController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('carts', CartController::class);
    Route::resource("sub_category",SubCategoryController::class);
    Route::resource("faq",FAQController::class);
    Route::resource("brand",BrandController::class);
    Route::resource("payment_method",PaymentMethodController::class);
    Route::resource('general_settings', GeneralSettingController::class);
    Route::resource("goal",GoalController::class);
    Route::resource("supply",SupplyController::class);
    Route::resource("cupon",CuponCodeController::class);
    /* Product Customzie */
    Route::get("/post/create/v2",[ProductController::class,"create_v2"])->name("products.create.varaint");
    Route::post("/admin/product/store/v2",[ProductController::class,"store_variant_product"])->name('store_variant_product');
    Route::get("/admin/product/{id}/detail/v1",[ProductController::class,"productDetail"])->name("product.detail.v1");
    Route::get("/admin/product/{id}/edit/v2",[ProductController::class,"productEditV2"])->name("product.edit.v2");
    Route::post("/admin/product/update/v2", [ProductController::class, "updateProductV2"])->name("product.update.v2");
    Route::post('/admin/product/update/v2/variant/{variant}', [ProductController::class, 'updateProductV2Varaint'])->name('product.update.v2.variant');
    Route::post('/product/update/v2/variant/add', [ProductController::class, 'addProductV2VaraintAdd'])->name('product.add.v2.variant.add');
    Route::delete('/admin/product/variant/{id}', [ProductController::class, 'deleteVariant'])->name('product.variant.delete');
    Route::put('admin/general_settings/update', [GeneralSettingController::class, 'update'])->name('general_settings.update');
    Route::get('/admin/customers/{id}', [OrderController::class, 'getCustomerDetails'])->name('admin.customers.details');
    Route::put('vip-request/{id}', [AccountTypeController::class, 'updateVIPRequest'])->name('vip.request.update');
    Route::get("/feedback",[DashboardController::class, 'feedback']);
    Route::get("/update",[UpdateCodeController::class,"index"]);
    Route::get("/sales",[SaleReportController::class,"index"]);
    Route::get("/sales/{data}",[SaleReportController::class,"detail"]);
    Route::get("/sales/order/{id}",[SaleReportController::class,"orderDetail"]);
    Route::post('/photos', [GeneralSettingController::class, 'Bannerstore'])->name('photos.store');
    Route::delete('/photos/{id}', [GeneralSettingController::class, 'Bannerdestroy'])->name('photos.delete');
    Route::post("/goal/updateData",[GoalController::class,"upgrade"]);
    /* Order Customzie */
    Route::get('/order/create/admin', [OrderController::class, 'orderCreateAdmin'])->name('order.create.admin');
    Route::post('/orders/cart/user', [OrderController::class, 'showUserCart'])->name('orders.cart.user');
    Route::post("/order/delete/hard",[OrderController::class,"deleteOrder"])->name("order.delete.hard");
    Route::post('/cart/update/{id}', [OrderController::class, 'updateData'])->name('cart.update');
    Route::post('/cart/remove/{id}', [OrderController::class, 'removeData'])->name('cart.remove');
    Route::post('/orders/cart/user.add', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::post("/orders/card/user/checkout",[OrderController::class, 'OrderCheckOut'])->name("cart.checkout");

});

Route::middleware(['auth', 'manager'])->prefix('admin')->name('admin.')->group(function () {

    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('carts', CartController::class);
    Route::resource("supply",SupplyController::class);
    /* Product Customzie */
    Route::get("/supply/managment/v1/{id}",[SupplyController::class,"managment_1"]);
    Route::get("/supply/managment/v2/{id}",[SupplyController::class,"managment_2"]);
    Route::post("/supply/managment/v1/post",[SupplyController::class,"managment_Post"]);
    Route::post("/supply/managment/v2/post",[SupplyController::class,"managment_Post"]);
    Route::get("/post/create/v2",[ProductController::class,"create_v2"])->name("products.create.varaint");
    Route::post("/admin/product/store/v2",[ProductController::class,"store_variant_product"])->name('store_variant_product');
    Route::get("/admin/product/{id}/detail/v1",[ProductController::class,"productDetail"])->name("product.detail.v1");
    Route::get("/admin/product/{id}/edit/v2",[ProductController::class,"productEditV2"])->name("product.edit.v2");
    Route::post("/admin/product/update/v2", [ProductController::class, "updateProductV2"])->name("product.update.v2");
    Route::post('/admin/product/update/v2/variant/{variant}', [ProductController::class, 'updateProductV2Varaint'])->name('product.update.v2.variant');
    Route::post('/product/update/v2/variant/add', [ProductController::class, 'addProductV2VaraintAdd'])->name('product.add.v2.variant.add');
    Route::delete('/admin/product/variant/{id}', [ProductController::class, 'deleteVariant'])->name('product.variant.delete');
    Route::put('admin/general_settings/update', [GeneralSettingController::class, 'update'])->name('general_settings.update');
    Route::get('/admin/customers/{id}', [OrderController::class, 'getCustomerDetails'])->name('admin.customers.details');
    Route::put('vip-request/{id}', [AccountTypeController::class, 'updateVIPRequest'])->name('vip.request.update');
    Route::get("/feedback",[DashboardController::class, 'feedback']);
    Route::get("/update",[UpdateCodeController::class,"index"]);
    Route::get("/sales",[SaleReportController::class,"index"]);
    Route::get("/sales/{data}",[SaleReportController::class,"detail"]);
    Route::get("/sales/order/{id}",[SaleReportController::class,"orderDetail"]);
    Route::post('/photos', [GeneralSettingController::class, 'Bannerstore'])->name('photos.store');
    Route::delete('/photos/{id}', [GeneralSettingController::class, 'Bannerdestroy'])->name('photos.delete');
    /* Order Customzie */
    Route::get('/order/create/admin', [OrderController::class, 'orderCreateAdmin'])->name('order.create.admin');
    Route::post('/orders/cart/user', [OrderController::class, 'showUserCart'])->name('orders.cart.user');
    Route::post('/cart/update/{id}', [OrderController::class, 'updateData'])->name('cart.update');
    Route::post('/cart/remove/{id}', [OrderController::class, 'removeData'])->name('cart.remove');
    Route::post('/orders/cart/user.add', [OrderController::class, 'addToCart'])->name('cart.add');
    Route::post("/orders/card/user/checkout",[OrderController::class, 'OrderCheckOut'])->name("cart.checkout");
});

Route::middleware(['auth', 'customer'])->prefix('/')->name('customer.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'customerDashboardr'])->name('dashboard');
    //profile
    Route::get('/auth/general_settings', [UserProfileController::class, 'index'])->name('profile.settings');
    Route::post('/auth/change-password', [UserProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/auth/change-email', [UserProfileController::class, 'changeEmail'])->name('profile.changeEmail');
    //order
    Route::get('/auth/order', [UserOrderController::class, 'orderIndex'])->name('order.index');
    Route::get('/auth/order/{id}', [UserOrderController::class, 'orderDetail'])->name('order.detail');
    //vip
    Route::get("/auth/vip",[UserProfileController::class, 'vip']);
    Route::post("/auth/vip/request",[VIPRequestController::class,"store"])->name("vip.request");
});



// Routes without auth middleware for guest users to interact with the cart
Route::middleware('web')->group(function () {
Route::post('/cart/add', [CartController::class, 'addToCard'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post("/card/update/direct/{id}",[CartController::class, 'update_direct'])->name("card.update.direct");
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clearAll', [CartController::class, 'clearAll'])->name('cart.clearAll');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post("/cart/cuppon/apply",[CartController::class,"cuponApply"])->name("cart.apply_coupon");
Route::post("/cart/coupon/remove", [CartController::class, "couponRemove"])->name("cart.coupon.remove");
/* Customize */
Route::post('/cart/check', [CartController::class, 'checkCart'])->name('cart.check');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});


Route::get("/auth",[PageController::class,"auth"]);

//Website
Route::get("/",[PageController::class,"index"]);
Route::get("/category/{id}",[PageController::class,"category"])->name("category");
// Route::get("/subcategory/{id}",[PageController::class,"subcategory"])->name("subcategory");
Route::get("/products",[PageController::class,"products"])->name("products");
Route::get("/products/{id}/detail",[PageController::class,"productDetail"]);
Route::get("/products/category/{id}",[PageController::class,"productsCategory"])->name("productsCategory");
Route::get("/brands",[PageController::class,"brands"])->name("brands");
Route::get("/products/{country}",[PageController::class,"productByCountry"]);
Route::get("/brands/{id}",[PageController::class,"brandDetail"])->name("brandDetail");
Route::get("/brands/{country}/{id}",[PageController::class,"brandCountryDetail"])->name("brandCountryDetail");
Route::get("/brand/{country}",[PageController::class,"brandCountry"])->name("brandCountry");
Route::Get("/goals/{name}",[PageController::class,"goalsPage"])->name("goalsPage");
Route::get("/faq",[PageController::class,"faq"])->name("faq");
Route::get("/sell-to-us",[PageController::class,"sellToUs"])->name("sell_to_us");
Route::get("/member",[PageController::class,"member"])->name("member");
Route::get("/contact-us",[PageController::class,"contactUs"])->name("contact_us");
Route::get("/checkout",[PageController::class,"checkout"]);
Route::get("/customer_feedback",[PageController::class,"customerFeedback"]);
Route::post("/customer_feedback",[PageController::class,"customerFeedbackStore"]);
Route::get("/privacy policy",[PageController::class,"privacyPolicy"]);
Route::get("/order_track", [PageController::class, "orderTrack"]);
Route::post("/order_track", [PageController::class, "searchOrder"]);
Route::post('/search', [PageController::class, 'search'])->name('search');
Route::get("/pre_order",[PageController::class,"preOrder"]);
Route::get('auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('auth.provider');
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('auth.callback');
