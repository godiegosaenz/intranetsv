<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\configuracion\UserController;
use App\Http\Controllers\admin\configuracion\RolesController;
use App\Http\Controllers\admin\configuracion\UserRolesController;
use App\Http\Controllers\admin\configuracion\UserPermissionsController;
use App\Http\Controllers\admin\administracion\PeopleEntitiesController;
use App\Http\Controllers\admin\gestorcultural\CulturalManagerController;
use App\Http\Controllers\admin\configuracion\ProvincesController;
use App\Http\Controllers\admin\configuracion\CantonController;
use App\Http\Controllers\admin\configuracion\ParishController;
use App\Http\Controllers\admin\establecimientosturisticos\EstablishmentController;
use App\Http\Controllers\admin\establecimientosturisticos\EstablishmentClassificationController;
use App\Http\Controllers\admin\establecimientosturisticos\EstablishmentCategoryController;
use App\Http\Controllers\admin\establecimientosturisticos\EstablishmentRequirementController;
use App\Http\Controllers\admin\establecimientosturisticos\EstablismentServicesController;
use App\Http\Controllers\admin\liquidacion\EmisionController;
use App\Http\Controllers\admin\liquidacion\LiquidationController;
use App\Http\Controllers\admin\luaf\LuafTableController;
use App\Models\EstablishmentCategory;
use App\Models\Requirement;
use App\Models\Establishments;
use App\Models\TouristActivity;
use App\Models\Liquidation;
use App\Models\Interes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\admin\establecimientosturisticos\TravelHotelsDetailController;
use Illuminate\Support\Collection;

Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('guest');

Route::prefix('admin')->group(function (){
    //Rutas de inicio de sesion
    Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Rutas de home de administracion
    Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
    //Rutas de usuarios
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/users/create/{id?}', [UserController::class, 'create'])->name('users.create')->middleware('auth');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    Route::post('/users/datatables', [UserController::class, 'datatables'])->name('users.datatables');
    //Rutas de Roles
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index')->middleware('auth');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create')->middleware('auth');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RolesController::class, 'show'])->name('roles.show')->middleware('auth');
    Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit')->middleware('auth');
    Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RolesController::class, 'delete'])->name('roles.delete');
    Route::post('/roles/datatables', [RolesController::class, 'datatables'])->name('roles.datatable');

    Route::post('/usersroles/{user}', [UserRolesController::class, 'store'])->name('usersroles.store');
    Route::post('/userspermissions/{user}', [UserPermissionsController::class, 'store'])->name('userpermissions.store');

    Route::get('/peopleentities', [PeopleEntitiesController::class, 'index'])->name('peopleentities.index')->middleware('auth');
    Route::get('/peopleentities/create', [PeopleEntitiesController::class, 'create'])->name('peopleentities.create')->middleware('auth');
    Route::get('/peopleentities/{PersonEntity}', [PeopleEntitiesController::class, 'show'])->name('peopleentities.show')->middleware('auth');
    Route::get('/peopleentities/{PersonEntity}/edit', [PeopleEntitiesController::class, 'edit'])->name('peopleentities.edit')->middleware('auth');
    Route::post('/peopleentities/datatables', [PeopleEntitiesController::class, 'datatables'])->name('peopleentities.datatables');
    Route::post('/peopleentities', [PeopleEntitiesController::class, 'store'])->name('peopleentities.store');
    Route::put('/peopleentities/{PersonEntity}', [PeopleEntitiesController::class, 'update'])->name('peopleentities.update');
    Route::post('/peopleentities/{id}/get', [PeopleEntitiesController::class, 'getPersonEntity'])->name('peopleentities.get');
    Route::post('/peopleentities/datatablesPersonas', [PeopleEntitiesController::class, 'datatablesPersonas'])->name('peopleentities.datatablesPersonas');

    Route::post('/provinces/{id}', [ProvincesController::class, 'show'])->name('provinces.show')->middleware('auth');
    Route::post('/cantons/{id}', [CantonController::class, 'show'])->name('cantons.show')->middleware('auth');
    Route::post('/parishes/{id}', [ParishController::class, 'show'])->name('parishes.show')->middleware('auth');

    Route::get('/culturalmanagers', [CulturalManagerController::class, 'index'])->name('culturalmanagers.index')->middleware('auth');
    Route::get('/culturalmanagers/create/{id?}', [CulturalManagerController::class, 'create'])->name('culturalmanagers.create')->middleware('auth');
    Route::get('/culturalmanagers/{CulturalManager}', [CulturalManagerController::class, 'show'])->name('culturalmanagers.show')->middleware('auth');
    Route::get('/culturalmanagers/{CulturalManager}/edit', [CulturalManagerController::class, 'edit'])->name('culturalmanagers.edit')->middleware('auth');
    Route::put('/culturalmanagers/{CulturalManager}', [CulturalManagerController::class, 'update'])->name('culturalmanagers.update');

    Route::post('/culturalmanagers', [CulturalManagerController::class, 'store'])->name('culturalmanagers.store')->middleware('auth');

    Route::get('/establishments', [EstablishmentController::class, 'index'])->name('establishments.index')->middleware('auth');
    Route::get('/establishments/create/{id?}', [EstablishmentController::class, 'create'])->name('establishments.create')->middleware('auth');
    Route::get('/establishments/{id}/edit', [EstablishmentController::class, 'edit'])->name('establishments.edit')->middleware('auth');
    Route::get('/establishments/{Establishment}', [EstablishmentController::class, 'show'])->name('establishments.show')->middleware('auth');
    Route::post('/establishments', [EstablishmentController::class, 'store'])->name('establishments.store');
    Route::put('/establishments/{Establishments}', [EstablishmentController::class, 'update'])->name('establishments.update');
    Route::put('/establishment/updateTab2/{id?}', [EstablishmentController::class, 'updateTab2'])->name('establishments.updateTab2');
    Route::post('/establishments/datatablesPersonas', [EstablishmentController::class, 'datatablesPersonas'])->name('establishments.datatablesPersonas');
    Route::post('/establishments/datatables', [EstablishmentController::class, 'datatables'])->name('establishments.datatables');
    Route::post('/establishments/datatablesEstablishmentLiquidation', [EstablishmentController::class, 'datatablesEstablishmentLiquidation'])->name('establishments.datatablesEstablishmentLiquidation');

    Route::post('/travelhotelsdetail/{id?}', [TravelHotelsDetailController::class, 'store'])->name('travelhotelsdetail.store');
    Route::delete('/travelhotelsdetail/{id}', [TravelHotelsDetailController::class, 'destroy'])->name('travelhotelsdetail.destroy');

    Route::post('/establishmentservices/{id?}', [EstablismentServicesController::class, 'store'])->name('establishmentservices.store');
    Route::delete('/establishmentservices/{id?}', [EstablismentServicesController::class, 'destroy'])->name('establishmentservices.destroy');

    Route::post('/establishmentclassification/{id}', [EstablishmentClassificationController::class, 'show'])->name('establishmentclassification.show')->middleware('auth');
    Route::post('/establishmentcategory/{id}', [EstablishmentCategoryController::class, 'show'])->name('establishmentcategory.show')->middleware('auth');

    Route::post('/establishmentrequirement', [EstablishmentRequirementController::class, 'store'])->name('establishmentrequirement.store');
    Route::post('/establishmentrequirement/datatables/{id?}', [EstablishmentRequirementController::class, 'datatables'])->name('establishmentrequirement.datatables');

    Route::get('/establishmentrequirement/downloadfile/{requeriment_id}/{establishment_id}', [EstablishmentRequirementController::class, 'downloadFile'])->name('establishmentrequirement.downloadfile');

    Route::get('/emision', [EmisionController::class, 'index'])->name('emision.index')->middleware('auth');
    Route::post('/emision', [EmisionController::class, 'store'])->name('emision.store');
    Route::get('/emision/reporte/{year}', [EmisionController::class, 'report'])->name('emision.report')->middleware('auth');

    Route::get('/liquidation', [LiquidationController::class, 'index'])->name('liquidation.index')->middleware('auth');
    Route::post('/liquidation', [LiquidationController::class, 'getLiquidation'])->name('liquidation.get');

    Route::get('/luaf', [LuafTableController::class, 'index'])->name('luaf.index')->middleware('auth');
    Route::post('/luaf', [LuafTableController::class, 'store'])->name('luaf.store');
    Route::get('/luaf/documentation', [LuafTableController::class, 'documentation'])->name('luaf.documentation');

    Route::get('/countries', function(){
        $Liquidation = Liquidation::with(['establishment'])->where('establishment_id',1)->get();
        $resultado = $Liquidation->map(function ($liq) {
            $valorinteres = App\Models\Interes::all();
            $data[$liq->id]['id'] = $liq->id;
            $data[$liq->id]['liquidation_number'] = $liq->liquidation_number;
            $data[$liq->id]['liquidation_code'] = $liq->liquidation_code;
            $data[$liq->id]['total_payment'] = $liq->total_payment;
            $data[$liq->id]['status'] = $liq->status;
            $data[$liq->id]['year'] = $liq->year;
            $data[$liq->id]['propietario'] = $liq->establishment->people_entities_owner->name;
            $data[$liq->id]['establisment_name'] = $liq->establishment->name;
            foreach($valorinteres as $vi){
                if($vi->year == $data[$liq->id]['year']){
                    $data[$liq->id]['interes'] = round($liq->total_payment * $vi->percentage, 2);
                }
            }
            $data[$liq->id]['total'] = round($liq->total_payment + $data[$liq->id]['interes'],2);
            return $data;
        });

        return $resultado;
        //return EstablishmentCategory::find(2)->establishments_classifications()->orderBy('id')->get();
        //return Establishments::with(['tourist_activities','establishments_classifications','people_entities_establishment','people_entities_owner','people_entities_legal_representative'])->get();
        //return TouristActivity::with(['requirements'])->get();
        //return Requirement::with(['tourist_activities'])->get();
        //return EstablishmentCategory::with(['establishments_classifications'])->find(1)->get();
        //return EstablishmentClassification::find(2)->establishments_categories;

    });
});

Route::prefix('document')->group(function () {

});
