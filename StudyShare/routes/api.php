use App\Http\Controllers\MaterialController;

Route::get('/materials', [MaterialController::class, 'index']);
Route::post('/materials', [MaterialController::class, 'store']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);