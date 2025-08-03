    <?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Drives\driveController;
    use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
    
    Auth::routes();
    
    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/',function(){
        return view('home.home');
    });     
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Blog
    Route::resource('blog',PostController::class);
    //Route::get('/blog', [PostController::class, 'index'])->name('post.index');
   // Route::get('/blog/create',[PostController::class,'create']);
    //Route::delete('/blog/{id}', [PostController::class, 'delete']);  // on Delete Cascade 

    Route::resource('comment',CommentController::class);
    //Route::get('/comment/{id}', [CommentController::class, 'index'])->name('post.comments');
    //Route::get('/comment/create',[CommentController::class,'create']);
     
    Route::resource('tags',TagController::class);
    //Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
    //Route::get('/tags/test', [TagController::class, 'testManytoMany']);

    Route::get('/about',AboutController::class);
    Route::get('/contact',ContactController::class);





    Route::get('/home', [homeController::class ,'index']);

    Route::get('/showDrives',[driveController::class,'index'])->name('drive.showDrive');
    Route::get('/showFile/{id}',[driveController::class,'showFile'])->name('drive.show');

    Route::get('/addDrive',[driveController::class,'showAddDrive'])->name('drive.addDrive');
    Route::post('/addDrive',[driveController::class,'store'])->name('drive.add');
    Route::get('/destroy/{id}',[driveController::class,'destroy'])->name('drive.destroy');
