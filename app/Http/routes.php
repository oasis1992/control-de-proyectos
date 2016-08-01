<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' =>['web' /*,'auth'*/],'prefix'=>'admin'], function(){ 

    Route::resource('proyectos','ProjectsController');
    Route::get('proyectos/{id}/eliminar',[
        'uses' =>   'ProjectsController@destroy',
        'as'   =>   'admin.projects.destroy'
    ]);

    // panel

    Route::get('proyectos/{id}/panel',[
        'uses' =>   'ProjectsController@panel',
        'as'   =>   'admin.projects.panel'
    ]);

    Route::get('proyectos/{project_id}/panel/edit/colaboradores',[
        'uses' =>   'ProjectsController@edit_collaboratores',
        'as'   =>   'admin.projects.panel.edit.contributors'
    ]);

    Route::post('proyectos/panel/update/colaboradores',[
        'uses' =>   'ProjectsController@update_collaboratores',
        'as'   =>   'admin.projects.panel.update.contributors'
    ]);

    Route::resource('colaboradores','ContributorController');

    Route::post('colaboradores/add',[
        'uses' =>   'ContributorController@add',
        'as'   =>   'admin.contributors.add'
    ]);

    Route::get('colaboradores/{id}/eliminar',[
        'uses' =>   'ContributorController@destroy',
        'as'   =>   'admin.contributors.destroy'
    ]);


    // institutions
    Route::get('institucion/create',[
        'uses' =>   'InstitutionController@create',
        'as'   =>   'admin.institution.create'
    ]);
    
    Route::post('institucion/store',[
        'uses' =>   'InstitutionController@store',
        'as'   =>   'admin.institution.store'
    ]);

    Route::get('institucion/edit/{id}',[
        'uses' =>   'InstitutionController@edit',
        'as'   =>   'admin.institution.edit'
    ]);

    Route::get('institucion/destroy/{id}',[
        'uses' =>   'InstitutionController@destroy',
        'as'   =>   'admin.institution.destroy'
    ]);

    Route::get('institucion',[
        'uses' =>   'InstitutionController@index',
        'as'   =>   'admin.institution.index'
    ]);

    Route::put('institucion/update/{id}',[
        'uses' =>   'InstitutionController@update',
        'as'   =>   'admin.institution.update'
    ]);
    
    // financiamiento

    Route::get('financing/create/{id}',[
        'uses' =>   'FinancingController@create',
        'as'   =>   'admin.financing.create'
    ]);

    Route::post('financing/store',[
        'uses' =>   'FinancingController@store',
        'as'   =>   'admin.financing.store'
    ]);

    Route::get('financing/destroy/{id}/{project_id}',[
        'uses' =>   'FinancingController@destroy',
        'as'   =>   'admin.financing.destroy'
    ]);

    //status

    Route::post('status/change/proyecto/{project_id}',[
        'uses' =>   'StatusController@change_status',
        'as'   =>   'admin.projects.change_status'
    ]);

});


Route::group(['middleware' => 'web'], function () {
    Route::get('logout',[
        'uses' => 'AuthController@logout',
        'as'   => 'logout'
    ]);

    Route::get('login',[
        'uses' => 'AuthController@login',
        'as'   => 'login'
    ]);

    Route::post('login',[
        'uses' => 'AuthController@loginPost',
        'as'   => 'login'
    ]);
});
