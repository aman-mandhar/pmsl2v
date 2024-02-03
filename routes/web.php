<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransferController;
use Illuminate\Contracts\Cache\Store;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\SubwarehouseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\VariationController;
use App\Http\Controllers\BpController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SubwarehouseStockController;
use App\Http\Controllers\RetailStockController;







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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware(['auth', 'isAdmins'])->group(function () 
    {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admindashboard');
    });

Route::prefix('stores')->middleware(['auth', 'isStores'])->group(function () 
    {
    Route::get('dashboard', [App\Http\Controllers\Store\DashboardController::class, 'index'])->name('storedashboard');
    });

Route::prefix('employees')->middleware(['auth', 'isEmployees'])->group(function () 
    {
    Route::get('dashboard', [App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('employeedashboard');
    });

Route::prefix('warehouses')->middleware(['auth', 'isWarehouses'])->group(function () 
    {
    Route::get('dashboard', [App\Http\Controllers\Warehouse\DashboardController::class, 'index'])->name('warehousedashboard');
    });

Route::prefix('subwarehouses')->middleware(['auth', 'isSubwarehouses'])->group(function () 
    {
    Route::get('dashboard', [App\Http\Controllers\Subwarehouse\DashboardController::class, 'index'])->name('subwarehousedashboard');
    });

Route::prefix('users')->middleware(['auth', 'isCustomers'])->group(function () 
    {
    Route::get('dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'index'])->name('customerdashboard');
    });




 // Users
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/roles/{id}', [App\Http\Controllers\UserController::class, 'roles'])->name('users.roles');
Route::put('/users/roles/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/users/show/{id}',[App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users/delete-user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
Route::get('/getReferralName', [UserController::class, 'getReferralName'])->name('getReferralName');

// subwarehouses
Route::get('/subwarehouses', [SubwarehouseController::class, 'index'])->name('subwarehouses.index');
Route::get('/subwarehouses/create', [SubwarehouseController::class, 'create'])->name('subwarehouses.create');
Route::post('/subwarehouses', [SubwarehouseController::class, 'store'])->name('subwarehouses.store');
Route::get('/subwarehouses/{subwarehouse}', [SubwarehouseController::class, 'show'])->name('subwarehouses.show');
Route::get('/subwarehouses/{subwarehouse}/edit', [SubwarehouseController::class, 'edit'])->name('subwarehouses.edit');
Route::put('/subwarehouses/{subwarehouse}', [SubwarehouseController::class, 'update'])->name('subwarehouses.update');
Route::delete('/subwarehouses/{subwarehouse}', [SubwarehouseController::class, 'destroy'])->name('subwarehouses.destroy');

// Business promoters
Route::get('/bps', [App\Http\Controllers\BpController::class, 'index'])->name('bps.index');
Route::get('/bps/create', [App\Http\Controllers\BpController::class, 'create'])->name('bps.create');
Route::post('/bps', [App\Http\Controllers\BpController::class, 'store'])->name('bps.store');
Route::get('/bps/{bp}/edit', [App\Http\Controllers\BpController::class, 'edit'])->name('bps.edit');
Route::put('/bps/{bp}', [App\Http\Controllers\BpController::class, 'update'])->name('bps.update');
Route::delete('/bps/{bp}', [App\Http\Controllers\BpController::class, 'destroy'])->name('bps.destroy');
Route::get('/bps/search', 'BpController@search');

// Retailers
Route::get('/retails', [RetailController::class, 'index'])->name('retails.index');
Route::get('/retails/create', [RetailController::class, 'create'])->name('retails.create');
Route::post('/retails', [RetailController::class, 'store'])->name('retails.store');
Route::get('/retails/{retail}', [RetailController::class, 'show'])->name('retails.show');
Route::get('/retails/{retail}/edit', [RetailController::class, 'edit'])->name('retails.edit');
Route::put('/retails/{retail}', [RetailController::class, 'update'])->name('retails.update');
Route::delete('/retails/{retail}', [RetailController::class, 'destroy'])->name('retails.destroy');

// Tokens
Route::get('/tokens', [App\Http\Controllers\TokenController::class, 'index'])->name('tokens.index');
Route::get('/tokens/create', [App\Http\Controllers\TokenController::class, 'create'])->name('tokens.create');
Route::post('/tokens', [App\Http\Controllers\TokenController::class, 'store'])->name('tokens.store');
Route::get('/tokens/{token}/edit', [App\Http\Controllers\TokenController::class, 'edit'])->name('tokens.edit');
Route::put('/tokens/{token}', [App\Http\Controllers\TokenController::class, 'update'])->name('tokens.update');
Route::delete('/tokens/{token}', [App\Http\Controllers\TokenController::class, 'destroy'])->name('tokens.destroy');
Route::get('/tokens/show/{token}',[App\Http\Controllers\TokenController::class, 'show'])->name('tokens.show');
Route::get('/tokens/search', 'TokenController@search')->name('tokens.search');

// Items
Route::get('/products/items', [ProductController::class, 'index'])->name('products.items.index');
Route::get('/products/items/create', [ProductController::class, 'create'])->name('products.items.create');
// Route to get subcategories based on the selected category
Route::get('/get-subcategories/{category}', [ProductController::class, 'getSubcategories'])->name('get-subcategories');
// Route to get variations based on the selected subcategory
Route::get('/get-variations/{subcategory}', [ProductController::class, 'getVariations'])->name('get-variations');
Route::post('/products/items', [ProductController::class, 'store'])->name('products.items.store');
Route::get('/products/items/{item}/edit', [ProductController::class, 'edit'])->name('products.items.edit');
Route::put('/products/items/{item}', [ProductController::class, 'update'])->name('products.items.update');
Route::delete('/products/items/{id}', [ProductController::class, 'destroy'])->name('products.items.destroy');
Route::get('/products/search', [CategoryController::class, 'search'])->name('products.search');


// Categories
Route::get('/products/categories', [CategoryController::class, 'index'])->name('products.categories.index');
Route::get('/products/categories/create', [CategoryController::class, 'create'])->name('products.categories.create');
Route::post('/products/categories', [CategoryController::class, 'store'])->name('products.categories.store');
Route::get('/products/categories/{category}/edit', [CategoryController::class, 'edit'])->name('products.categories.edit');
Route::put('/products/categories/{category}', [CategoryController::class, 'update'])->name('products.categories.update');
Route::delete('/products/categories/{category}', [CategoryController::class, 'destroy'])->name('products.categories.destroy');
Route::get('/products/categories/search', [CategoryController::class, 'search'])->name('products.categories.search');



// Subcategories

Route::get('/products/subcategories/create', [SubcategoryController::class, 'create'])->name('products.subcategories.create');
Route::post('/products/subcategories', [SubcategoryController::class, 'store'])->name('products.subcategories.store');
Route::get('/products/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('products.subcategories.edit');
Route::put('/products/subcategories{subcategory}', [SubcategoryController::class, 'update'])->name('products.subcategories.update');
Route::delete('/products/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('products.subcategories.destroy');
Route::get('/products/subcategories/search', [SubcategoryController::class, 'search'])->name('products.subcategories.search');

// Variations
Route::get('/products/variations', [VariationController::class, 'index'])->name('products.variations.index');
Route::get('/products/variations/create', [VariationController::class, 'create'])->name('products.variations.create');
Route::post('/products/variations', [VariationController::class, 'store'])->name('products.variations.store');
Route::get('/products/variations/{id}/edit', [VariationController::class, 'edit'])->name('products.variations.edit');
Route::put('/products/variations/{id}', [VariationController::class, 'update'])->name('products.variations.update');
Route::delete('/products/variations/{id}', [VariationController::class, 'destroy'])->name('products.variations.destroy');


// Show all categories, subcategories, variations
Route::get('/products/all', [ProductController::class, 'showAllData'])->name('products.all');

// Stocks
Route::get('/stocks', [App\Http\Controllers\StockController::class, 'index'])->name('stocks.index');
Route::get('/stocks/add/{item}', [App\Http\Controllers\StockController::class, 'add'])->name('stocks.add');
Route::post('/stocks', [App\Http\Controllers\StockController::class, 'store'])->name('stocks.store');
Route::get('/stocks/{stock}', [App\Http\Controllers\StockController::class, 'show'])->name('stocks.show');
Route::get('/stocks/{stock}/edit', [App\Http\Controllers\StockController::class, 'edit'])->name('stocks.edit');
Route::put('/stocks/{stock}', [App\Http\Controllers\StockController::class, 'update'])->name('stocks.update');
Route::delete('/stocks/{stock}', [App\Http\Controllers\StockController::class, 'destroy'])->name('stocks.destroy');
Route::get('/stocks/search', [App\Http\Controllers\StockController::class, 'search'])->name('stocks.search');

// Subwarehouse Stocks
Route::get('/subwarehouses/stocks', [App\Http\Controllers\SubwarehouseStockController::class, 'index'])->name('subwarehouses.stocks.index');
Route::get('/subwarehouses/stocks/add/{stockId}', [App\Http\Controllers\SubwarehouseStockController::class, 'add'])->name('subwarehouses.stocks.add');
Route::post('/subwarehouses/stocks', [App\Http\Controllers\SubwarehouseStockController::class, 'store'])->name('subwarehouses.stocks.store');
Route::get('/subwarehouses/stocks/{subwarehouseStock}', [App\Http\Controllers\SubwarehouseStockController::class, 'show'])->name('subwarehouses.stocks.show');
Route::get('/subwarehouses/stocks/{subwarehouseStock}/edit', [App\Http\Controllers\SubwarehouseStockController::class, 'edit'])->name('subwarehouses.stocks.edit');
Route::put('/subwarehouses/stocks/{subwarehouseStock}', [App\Http\Controllers\SubwarehouseStockController::class, 'update'])->name('subwarehouses.stocks.update');

// Retailer Stocks
Route::get('/retails/stocks', [App\Http\Controllers\RetailerStockController::class, 'index'])->name('retails.stocks.index');
Route::get('/retails/stocks/add/{itemId}', [App\Http\Controllers\RetailerStockController::class, 'add'])->name('retails.stocks.add');
Route::post('/retails/stocks', [App\Http\Controllers\RetailerStockController::class, 'store'])->name('retails.stocks.store');
Route::get('/retails/stocks/{retailStock}', [App\Http\Controllers\RetailerStockController::class, 'show'])->name('retails.stocks.show');
Route::get('/retails/stocks/{retailStock}/edit', [App\Http\Controllers\RetailerStockController::class, 'edit'])->name('retails.stocks.edit');
Route::put('/retails/stocks/{retailStock}', [App\Http\Controllers\RetailerStockController::class, 'update'])->name('retails.stocks.update');
Route::delete('/retails/stocks/{retailStock}', [App\Http\Controllers\RetailerStockController::class, 'destroy'])->name('retails.stocks.destroy');
Route::get('/retails/stocks/search', 'RetailStockController@search')->name('retails.stocks.search');



Route::get('/stocks/bill', [App\Http\Controllers\StockController::class, 'bill'])->name('stocks.bill');


Route::get('/wallets', [App\Http\Controllers\WalletController::class, 'index'])->name('wallets.index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
