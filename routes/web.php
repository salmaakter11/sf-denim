<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Backend\DeleteTemporaryImageController;
use App\Http\Controllers\Backend\GeneralSettings;

use App\Http\Controllers\Backend\SitesettingsController;
use App\Http\Controllers\Backend\UploadTemporaryImageController;
use App\Http\Controllers\Frontend\GoogleController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\OrderList;

use App\Http\Controllers\Frontend\SocialController;
use App\Livewire\Backend\Career\CareerEdit;
use App\Livewire\Backend\People\PeopleEdit;
use App\Livewire\Backend\Rolepermission\Backuseredit;
use App\Livewire\Backend\Rolepermission\Permissionedit;
use App\Livewire\Backend\Rolepermission\Roleedit;
use App\Livewire\Backend\Story\ClientEdit;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::get('/policy', [IndexController::class, 'Policy'])->name('policy.page');
Route::get('/term', [IndexController::class, 'Term'])->name('term.page');
Route::get('/about', [IndexController::class, 'About'])->name('about.page');
Route::post('/tellus', [IndexController::class, 'Tellus'])->name('tellus');

Route::get('/story', [IndexController::class, 'Story'])->name('story');
Route::get('/people', [IndexController::class, 'People'])->name('people');
Route::get('/purpose', [IndexController::class, 'Purpose'])->name('purpose');
Route::get('/sustailability', [IndexController::class, 'Sustailability'])->name('sustailability');
Route::get('/facility', [IndexController::class, 'Facility'])->name('facility');
Route::get('/aboutus', [IndexController::class, 'Aboutus'])->name('aboutus');
Route::get('/gallery', [IndexController::class, 'Gallery'])->name('gallery');


Route::get('/blog', [IndexController::class, 'Blog'])->name('blog.page');
Route::get('/blog_detail/{id}', [IndexController::class, 'BlogDetail'])->name('blog.detail');

Route::get('/contact', [IndexController::class, 'Contact'])->name('contact');
Route::post('/contactpost', [IndexController::class, 'ContactPost'])->name('contactpost');
Route::get('/career', [IndexController::class, 'Career'])->name('career');
Route::post('/careerpost', [IndexController::class, 'CareerPost'])->name('careerpost');
// web guard start
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        
        return view('dashboard');
    })->name('dashboard');
    Route::get('/order', [OrderList::class, 'OrderListIndex'])->name('user.order');
});
Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

// web guard end

// admin guard start
Route::middleware(['auth:admin',config('jetstream.auth_session'),'verified',])->prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })
    Route::get('/profile',[AdminController::class,'profileshow'])->name('profile.admin');
    Route::POST('/logout',[AdminController::class,'destroy'])->name('admin.logout');
    // ->middleware('permission:all_user')
    // 
    Route::prefix('rolepermission')->middleware('permission:rolePermission')->group(function () {
        Route::get('/roules', [RoleController::class, 'index'])->name('roles.index');
        Route::post('/roules/store', [RoleController::class, 'store'])->name('roles.store');

        Route::get('/roules/edit/{role}', Roleedit::class)->name('role.edit');  

        Route::post('/roules/update/{role}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/roules/delete/{role}', [RoleController::class, 'destroy'])->name('role.delete');

        Route::get('/permissions', [PermissionController::class,'index'])->name('permission.index');
        Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('/permissions/edit/{permission}', Permissionedit::class)->name('permissions.edit');
        Route::post('/permissions/update/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
        Route::get('/permissions/delete/{permission}', [PermissionController::class, 'destroy'])->name('permissions.delete');

        
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        
        Route::get('/adminuser/users', [AdminUserController::class, 'index'])->name('adminuser.index');
        Route::get('/adminuser/{user}', [AdminUserController::class, 'show'])->name('adminuser.show');
        Route::post('/adminuser/store', [AdminUserController::class, 'store'])->name('adminuser.store');

        Route::get('/adminuser/edit/{id}', Backuseredit::class)->name('adminuser.edit');

        Route::post('/adminuser/update/{user}', [AdminUserController::class, 'Update'])->name('adminuser.update');
        Route::get('/adminuser/destroy/{user}', [AdminUserController::class, 'destroy'])->name('adminuser.destroy');
        Route::post('/adminuser/{user}/roles', [AdminUserController::class, 'assignRole'])->name('adminuser.roles');
        Route::delete('/adminuser/{user}/roles/{role}', [AdminUserController::class, 'removeRole'])->name('adminuser.roles.remove');
        Route::post('/adminuser/{user}/permissions', [AdminUserController::class, 'givePermission'])->name('adminuser.permissions');
        Route::delete('/adminuser/{user}/permissions/{permission}', [AdminUserController::class, 'revokePermission'])->name('adminuser.permissions.revoke');
    });
    Route::prefix('generalsettings')->middleware('permission:generalsettings')->group(function () {
        Route::post('/temporary/image/upload',UploadTemporaryImageController::class);
        Route::delete('/temporary/image/delete',DeleteTemporaryImageController::class);
        Route::get('/banner', [GeneralSettings::class, 'BannerIndex'])->name('banner.index');
    });
    Route::prefix('story')->group(function () {
        Route::get('/content', [GeneralSettings::class, 'StoryIndex'])->name('story.index');
        Route::get('/client', [GeneralSettings::class, 'ClientIndex'])->name('story.client');
        Route::get('/client/edit/{id}', ClientEdit::class)->name('client.edit');
    });
    Route::prefix('sustailability')->group(function () {
        Route::get('/content', [GeneralSettings::class, 'SustailabilityIndex'])->name('sustailability.index');
        
    });
    Route::prefix('purpose')->group(function () {
        Route::get('/content', [GeneralSettings::class, 'PurposeIndex'])->name('purpose.index');
    });
    Route::prefix('facility')->group(function () {
        Route::get('/content', [GeneralSettings::class, 'FacilityIndex'])->name('facility.index');
    });
    Route::prefix('people')->group(function () {
        Route::get('/content', [GeneralSettings::class, 'PeopleIndex'])->name('people.index');
        Route::get('/people/edit/{id}', PeopleEdit::class)->name('people.edit');
    });
    Route::prefix('career')->group(function () {
        Route::get('/index', [GeneralSettings::class, 'CareerIndex'])->name('career.index');
        Route::get('/edit/{id}', CareerEdit::class)->name('career.edit');
    });
    Route::prefix('gallery')->group(function () {
        Route::get('/index', [GeneralSettings::class, 'GalleryIndex'])->name('gallery.index');
    });
    Route::prefix('contact')->group(function () {
        Route::get('/index', [GeneralSettings::class, 'ContactIndex'])->name('contact.index');
    });

    Route::prefix('sitesettings')->group(function () {
        Route::get('/index', [SitesettingsController::class, 'Index'])->name('sitesettings.index')->middleware('permission:siteIndex');
        Route::get('/policy', [SitesettingsController::class, 'Policy'])->name('policy.index')->middleware('permission:policy');
        Route::get('/term', [SitesettingsController::class, 'Term'])->name('term.index')->middleware('permission:term');
        Route::get('/aboutus', [SitesettingsController::class, 'Aboutus'])->name('aboutus.index')->middleware('permission:aboutus');
        
    });
});

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login',[AdminController::class,'loginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});
// admin guard start
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     echo "clear-cache";
// });
// Route::get('/route-clear', function() {
//     $exitCode = Artisan::call('route:clear');
//     echo "route-clear";
// });

Route::get('/storage', function () {
    // Artisan::call('storage:link');
    $target = '/home/watchgho/public_html/storage';
    $link = '/home/watchgho/public_html/watchshop/storage/app/public';
    echo symlink($link, $target);
    // echo readlink($link);
});
// Route::get('/storage', function () {
//     $target = '/home/homerestu/public_html/storage';
//     $link = '/home/homerestu/public_html/restu/storage/app/public';
//     // Check if the symbolic link already exists
//     if (!file_exists($target)) {
//         // Create a symbolic link
//         $result = symlink($link, $target);

//         if ($result) {
//             return 'Symbolic link created successfully!';
//         } else {
//             return 'Failed to create symbolic link.';
//         }
//     } else {
//         return 'Symbolic link already exists.';
//     }
// });
// // Clear application cache:

// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return 'Application cache has been cleared';
// });
// //Clear route cache:

// Route::get('/route-cache', function() {
//     Artisan::call('route:cache');
//     return 'Routes cache has been cleared';
// });
// //Clear config cache:

// Route::get('/config-cache', function() {
//   Artisan::call('config:cache');
//   return 'Config cache has been cleared';
// }); 
// // Clear view cache:

// Route::get('/view-clear', function() {
//     Artisan::call('view:clear');
//     return 'View cache has been cleared';
// });

