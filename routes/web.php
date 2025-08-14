    <?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Drives\driveController;
    use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
    
       
// Protected Route
Route::middleware('auth')->group(function(){
    // Blog
        Route::resource('blog',PostController::class);
        Route::resource('comment',CommentController::class);
        Route::resource('tags',controller: TagController::class);
    // Drive
    Route::get('/showDrives',[driveController::class,'index'])->name('drive.showDrive');
    Route::get('/showFile/{id}',[driveController::class,'showFile'])->name('drive.show');
    Route::get('/addDrive',[driveController::class,'showAddDrive'])->name('drive.addDrive');
    Route::post('/addDrive',[driveController::class,'store'])->name('drive.add');
    Route::get('/destroy/{id}',[driveController::class,'destroy'])->name('drive.destroy');
});
     
//Public Route
    Route::get('/about',AboutController::class);
    Route::get('/contact',ContactController::class);
    Route::get('/signup', [AuthController::class, 'ShowSignupForm']);
    Route::post('/signup', [AuthController::class, 'Signup']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'Login']);
    Route::post('/logout', [AuthController::class, 'Logout']);

    Route::get('/',function(){
        return view('home.home');
    });     
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




