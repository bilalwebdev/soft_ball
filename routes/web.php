<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\UniController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('test', [TestController::class, 'test']);
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/tournament/{slug}', [HomeController::class, 'tournament'])->name('show.tournament');
Route::get('team/{slug}', [HomeController::class, 'team'])->name('show.team');
Route::get('player/{slug}', [HomeController::class, 'player'])->name('show.player');
//admin

Route::middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //profile

    Route::view('profile', 'admin.profile.profile-edit')->name('profile.edit');
    Route::view('password-reset', 'admin.profile.password-edit')->name('profile.password');

    //admins
    Route::get('admin-edit/{id}', [AdminController::class, 'editAdmin'])->name('edit.admin');
    Route::view('admin-list', 'admin.users.admin.admin-list')->name('all.admins');
    Route::view('add-admin', 'admin.users.admin.add-admin')->name('add.admin');

    //players

    Route::get('player-edit/{id}', [PlayerController::class, 'editPlayer'])->name('edit.player');
    Route::view('players-list', 'admin.users.players.players-list')->name('all.players');
    Route::view('add-player', 'admin.users.players.add-player')->name('add.player');
    Route::get('player/reference-edit/{id}', [PlayerController::class, 'editReference'])->name('player.reference.edit');
    Route::get('player/reference/{id}', [PlayerController::class, 'reference'])->name('player.reference');
    Route::get('player/gallery/{id}', [PlayerController::class, 'gallery'])->name('player.gallery');
    Route::get('player/password-reset/{id}', [PlayerController::class, 'resetPassword'])->name('player.reset-password');
    //team

    Route::get('team-edit/{slug}', [TeamController::class, 'editTeam'])->name('edit.team');
    Route::view('all-teams', 'admin.teams.all-teams')->name('all.teams');
    Route::get('team-players/{id}',  [TeamController::class, 'teamPlayers'])->name('team.players');
    Route::view('add-team', 'admin.teams.add-team')->name('add.team')->middleware('role:super-admin');

    //tournaments
    Route::get('tournament-edit/{slug}', [TournamentController::class, 'editTournament'])->name('edit.tournament');
    Route::view('all-tournaments', 'admin.tournaments.all-tournaments')->name('all.tournaments');
    Route::view('add-tournament', 'admin.tournaments.add-tournament')->name('add.tournament');
    Route::get('tournament/gallery/{slug}', [TournamentController::class, 'gallery'])->name('tournament.gallery');
    Route::get('tournament/content/{slug}', [TournamentController::class, 'content'])->name('tournament.content');

    //games

    Route::view('add-game', 'admin.games.add-game')->name('add.game');
    Route::view('all-games', 'admin.games.all-games')->name('all.games');
    Route::get('edit-game/{id}', [GameController::class, 'editGame'])->name('edit.game');

    //Site Settings

    Route::get('slider', [SiteController::class, 'slider'])->name('site.slider');
    Route::get('site-settings', [SiteController::class, 'siteSettings'])->name('site.settings');

    Route::post('/pre-signed-url', [UniController::class, 'presignedUploadUrl'])->name('preurl');
});

require __DIR__ . '/auth.php';
