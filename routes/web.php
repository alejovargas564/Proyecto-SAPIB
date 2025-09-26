    <?php

    use App\Http\Controllers\CategoriaDonacion\CategoriaDonacionController;
    use App\Http\Controllers\categoriataller\CategoriaTallerController;
    use App\Http\Controllers\donacion\DonacionController;
    use App\Http\Controllers\HistorialVisitas\HistorialVisitasController;
    use App\Http\Controllers\taller\TallerController;
    use App\Models\CategoriaDonacion;
    use Illuminate\Support\Facades\Route;
    
    


    Route::get('/', function () {
        return view('bienvenido');
    });

    Route::resource('donacion', DonacionController::class);

    Route::resource('categoriadonacion', CategoriaDonacionController::class);
    
    Route::resource('categoriataller', CategoriaTallerController::class);
    
    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
    ->resource('categoriataller', CategoriaTallerController::class)
    ->names('categoriataller');

    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
    ->resource('categoriadonacion', CategoriaDonacionController::class)
    ->names('categoriadonacion');

    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
    ->resource('donacion', DonacionController::class)
    ->names('donacion');

    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
    ->resource('historialvisitas', HistorialVisitasController::class)
    ->names('historialvisitas');

    Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
    ->resource('taller', TallerController::class)
    ->names('taller');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
