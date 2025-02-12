<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\IndexController@index')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'resident', 'as' => 'resident.', 'middleware' => ['auth', 'can:resident']], function () {
    Route::get('/', 'App\Http\Controllers\resident\IndexController@index')->name('index.index');
    Route::get('/index/initial', 'App\Http\Controllers\resident\IndexController@initial')->name('index.initial');
    Route::get('/resident', 'App\Http\Controllers\resident\ResidentController@index')->name('resident.index');
    Route::post('/resident/exec', 'App\Http\Controllers\resident\ResidentController@exec')->name('resident.exec');
    Route::get('/risk', 'App\Http\Controllers\resident\RiskController@index')->name('risk.index');
    Route::post('/risk/exec', 'App\Http\Controllers\resident\RiskController@exec')->name('risk.exec');
    Route::get('/evacuation', 'App\Http\Controllers\resident\EvacuationController@index')->name('evacuation.index');
    Route::post('/evacuation/exec', 'App\Http\Controllers\resident\EvacuationController@exec')->name('evacuation.exec');
    Route::get('/route', 'App\Http\Controllers\resident\RouteController@index')->name('route.index');
    Route::post('/route/exec', 'App\Http\Controllers\resident\RouteController@exec')->name('route.exec');
    Route::get('/timeline', 'App\Http\Controllers\resident\TimelineController@index')->name('timeline.index');
    Route::post('/timeline/exec', 'App\Http\Controllers\resident\TimelineController@exec')->name('timeline.exec');
    Route::get('/carry', 'App\Http\Controllers\resident\CarryController@index')->name('carry.index');
    Route::post('/carry/exec', 'App\Http\Controllers\resident\CarryController@exec')->name('carry.exec');
    Route::get('/myplan', 'App\Http\Controllers\resident\MyplanController@index')->name('myplan.index');
    Route::get('/myplan/exec', 'App\Http\Controllers\resident\MyplanController@exec')->name('myplan.exec');
    Route::get('/myplan/download/{id}', 'App\Http\Controllers\resident\MyplanController@download')->name('myplan.download');
    Route::get('/myplan/download2/{id}', 'App\Http\Controllers\resident\MyplanController@download2')->name('myplan.download2');
    Route::get('/report', 'App\Http\Controllers\resident\ReportController@index')->name('report.index');
    Route::get('/report/create', 'App\Http\Controllers\resident\ReportController@create')->name('report.create');
    Route::post('/report/create', 'App\Http\Controllers\resident\ReportController@create')->name('report.create');
    Route::post('/report/exec', 'App\Http\Controllers\resident\ReportController@exec')->name('report.exec');
});

Route::group(['prefix' => 'org', 'as' => 'org.', 'middleware' => ['auth', 'can:org']], function() {
    Route::get('/', 'App\Http\Controllers\org\IndexController@index')->name('index.index');
    Route::get('/areachar', 'App\Http\Controllers\org\AreacharController@index')->name('areachar.index');
    Route::get('/areachar/create', 'App\Http\Controllers\org\AreacharController@create')->name('areachar.create');
    Route::post('/areachar/create', 'App\Http\Controllers\org\AreacharController@create')->name('areachar.create');
    Route::post('/areachar/exec', 'App\Http\Controllers\org\AreacharController@exec')->name('areachar.exec');
    Route::post('/areachar/delete', 'App\Http\Controllers\org\AreacharController@delete')->name('areachar.delete');
    Route::get('/stock/warehouse', 'App\Http\Controllers\org\StockController@warehouse')->name('stock.warehouse');
    Route::get('/stock/supply', 'App\Http\Controllers\org\StockController@supply')->name('stock.supply');
    Route::get('/stock/stock', 'App\Http\Controllers\org\StockController@stock')->name('stock.stock');
    Route::post('/stock/stock', 'App\Http\Controllers\org\StockController@stock')->name('stock.stock');
    Route::get('/stock/item', 'App\Http\Controllers\org\StockController@item')->name('stock.item');
    Route::post('/stock/item', 'App\Http\Controllers\org\StockController@item')->name('stock.item');
    Route::post('/stock/exec', 'App\Http\Controllers\org\StockController@exec')->name('stock.exec');
    Route::post('/stock/exec2', 'App\Http\Controllers\org\StockController@exec2')->name('stock.exec2');
    Route::post('/stock/delete', 'App\Http\Controllers\org\StockController@delete')->name('stock.delete');
    Route::post('/stock/delete2', 'App\Http\Controllers\org\StockController@delete2')->name('stock.delete2');
    Route::get('/shelter', 'App\Http\Controllers\org\ShelterController@index')->name('shelter.index');
    Route::get('/shelter/create', 'App\Http\Controllers\org\ShelterController@create')->name('shelter.create');
    Route::post('/shelter/create', 'App\Http\Controllers\org\ShelterController@create')->name('shelter.create');
    Route::post('/shelter/exec', 'App\Http\Controllers\org\ShelterController@exec')->name('shelter.exec');
    Route::post('/shelter/delete', 'App\Http\Controllers\org\ShelterController@delete')->name('shelter.delete');
    Route::get('/human', 'App\Http\Controllers\org\HumanController@index')->name('human.index');
    Route::get('/human/create', 'App\Http\Controllers\org\HumanController@create')->name('human.create');
    Route::post('/human/create', 'App\Http\Controllers\org\HumanController@create')->name('human.create');
    Route::post('/human/exec', 'App\Http\Controllers\org\HumanController@exec')->name('human.exec');
    Route::post('/human/delete', 'App\Http\Controllers\org\HumanController@delete')->name('human.delete');
    Route::get('/contact', 'App\Http\Controllers\org\ContactController@index')->name('contact.index');
    Route::get('/contact/edit', 'App\Http\Controllers\org\ContactController@edit')->name('contact.edit');
    Route::post('/contact/edit', 'App\Http\Controllers\org\ContactController@edit')->name('contact.edit');
    Route::post('/contact/exec', 'App\Http\Controllers\org\ContactController@exec')->name('contact.exec');
    Route::post('/contact/capture', 'App\Http\Controllers\org\ContactController@capture')->name('contact.capture');
    Route::get('/emergency', 'App\Http\Controllers\org\EmergencyController@index')->name('emergency.index');
    Route::get('/emergency/create', 'App\Http\Controllers\org\EmergencyController@create')->name('emergency.create');
    Route::post('/emergency/create', 'App\Http\Controllers\org\EmergencyController@create')->name('emergency.create');
    Route::post('/emergency/exec', 'App\Http\Controllers\org\EmergencyController@exec')->name('emergency.exec');
    Route::post('/emergency/delete', 'App\Http\Controllers\org\EmergencyController@delete')->name('emergency.delete');
    Route::get('/specific', 'App\Http\Controllers\org\SpecificController@index')->name('specific.index');
    Route::get('/specific/create', 'App\Http\Controllers\org\SpecificController@create')->name('specific.create');
    Route::post('/specific/create', 'App\Http\Controllers\org\SpecificController@create')->name('specific.create');
    Route::post('/specific/exec', 'App\Http\Controllers\org\SpecificController@exec')->name('specific.exec');
    Route::post('/specific/delete', 'App\Http\Controllers\org\SpecificController@delete')->name('specific.delete');
    Route::get('/hall', 'App\Http\Controllers\org\HallController@index')->name('hall.index');
    Route::get('/hall/create', 'App\Http\Controllers\org\HallController@create')->name('hall.create');
    Route::post('/hall/create', 'App\Http\Controllers\org\HallController@create')->name('hall.create');
    Route::post('/hall/exec', 'App\Http\Controllers\org\HallController@exec')->name('hall.exec');
    Route::post('/hall/delete', 'App\Http\Controllers\org\HallController@delete')->name('hall.delete');
    Route::get('/training', 'App\Http\Controllers\org\TrainingController@index')->name('training.index');
    Route::get('/training/cont1', 'App\Http\Controllers\org\TrainingController@cont1')->name('training.cont1');
    Route::post('/training/cont1', 'App\Http\Controllers\org\TrainingController@cont1')->name('training.cont1');
    Route::get('/training/cont2', 'App\Http\Controllers\org\TrainingController@cont2')->name('training.cont2');
    Route::post('/training/cont2', 'App\Http\Controllers\org\TrainingController@cont2')->name('training.cont2');
    Route::get('/training/cont3', 'App\Http\Controllers\org\TrainingController@cont3')->name('training.cont3');
    Route::post('/training/cont3', 'App\Http\Controllers\org\TrainingController@cont3')->name('training.cont3');
    Route::post('/training/exec', 'App\Http\Controllers\org\TrainingController@exec')->name('training.exec');
    Route::post('/training/delete', 'App\Http\Controllers\org\TrainingController@delete')->name('training.delete');
    Route::get('/dpp', 'App\Http\Controllers\org\DppController@index')->name('dpp.index');
    Route::get('/dpp/exec', 'App\Http\Controllers\org\DppController@exec')->name('dpp.exec');
    Route::get('/dpp/download/{id}', 'App\Http\Controllers\org\DppController@download')->name('dpp.download');
    Route::get('/dpp/download2/{id}', 'App\Http\Controllers\org\DppController@download2')->name('dpp.download2');
    Route::get('/map', 'App\Http\Controllers\org\MapController@index')->name('map.index');
    Route::get('/map/map/{type}', 'App\Http\Controllers\org\MapController@map')->name('map.map');
    Route::post('/map/exec', 'App\Http\Controllers\org\MapController@exec')->name('map.exec');
    Route::get('/master/supply1', 'App\Http\Controllers\org\MasterController@supply1')->name('master.supply1');
    Route::get('/master/supply2', 'App\Http\Controllers\org\MasterController@supply2')->name('master.supply2');
    Route::get('/master/skill', 'App\Http\Controllers\org\MasterController@skill')->name('master.skill');
    Route::get('/master/area', 'App\Http\Controllers\org\MasterController@area')->name('master.area');
    Route::post('/master/create', 'App\Http\Controllers\org\MasterController@create')->name('master.create');
    Route::post('/master/exec', 'App\Http\Controllers\org\MasterController@exec')->name('master.exec');
    Route::post('/master/delete', 'App\Http\Controllers\org\MasterController@delete')->name('master.delete');
});

Route::group(['prefix' => 'gov', 'as' => 'gov.', 'middleware' => ['auth', 'can:gov']], function() {
    Route::get('/', 'App\Http\Controllers\gov\IndexController@index')->name('index.index');
    Route::get('/map', 'App\Http\Controllers\gov\IndexController@map')->name('index.map');
    Route::get('/download/{id}', 'App\Http\Controllers\gov\IndexController@download')->name('index.download');
});


require __DIR__.'/auth.php';
