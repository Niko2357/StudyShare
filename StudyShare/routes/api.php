use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AuthController;

Route::get('/materials', [MaterialController::class, 'index']);
Route::post('/materials', [MaterialController::class, 'store']);
Route::get('/materials/{id}', [MaterialController::class, 'show']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
