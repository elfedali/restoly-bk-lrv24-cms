<?php

use App\Models\Node;
use Illuminate\Http\Request;
use App\Services\NodeService;
use App\Constants\RouteConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// group account routes
Route::prefix(
    RouteConstants::ADMIN_PREFIX,
    [
        'middleware' => 'auth',
    ]
)->group(function () {


    Route::any('/', function () {
        // check 
        return view('admin.dashboard.dashboard');
    })->name(RouteConstants::ADMIN_DASHBOARD);

    Route::any('/node', function (Request $request) {
        if ($request->isMethod('post')) {
            $nodeType = $request->get(RouteConstants::NODE_TYPE);
            $nodeService = new NodeService();
            return $nodeService->createNode($request, $nodeType);
        }
        if ($request->isMethod('delete')) {
            $nodeService = new NodeService();
            return $nodeService->deleteNode($request);
        }
        return view(
            'admin.node.node_index',
            [
                'node_type' => $request->get(RouteConstants::NODE_TYPE) ?? RouteConstants::NODE_TYPE_POST,
                'nodes' => \App\Models\Node::where('type', $request->get(RouteConstants::NODE_TYPE) ?? RouteConstants::NODE_TYPE_POST)->get()
            ]
        );
    })->name(RouteConstants::ADMIN_NODE);
    // node edit
    Route::any('/node/edit/{node}', function (Request $request, Node $node) {

        return view('admin.node.node_edit', ['node' => $node]);
    })->name(RouteConstants::ADMIN_NODE . '.edit');
    // node create
    Route::any('/node/create', function (Request $request) {
        return view('admin.node.node_create', ['node_type' => $request->get(RouteConstants::NODE_TYPE) ?? RouteConstants::NODE_TYPE_POST]);
    })->name(RouteConstants::ADMIN_NODE . '.create');


    Route::any('/comment', function () {
        return view('admin.comment.comment_index');
    })->name(RouteConstants::ADMIN_COMMENT);

    Route::any('/upload', function () {
        return view('admin.upload.upload_index');
    })->name(RouteConstants::ADMIN_UPLOAD);

    Route::any('/term', function () {
        return view('admin.term.term_index');
    })->name(RouteConstants::ADMIN_TERM);


    Route::any('/user', function () {
        return view('admin.user.user_index');
    })->name(RouteConstants::ADMIN_USER);

    Route::any('/option', function () {
        return view('admin.option.option_index');
    })->name(RouteConstants::ADMIN_OPTION);
});
