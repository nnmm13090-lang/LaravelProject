<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

$emptyPosts = function (Request $request) {
    return new LengthAwarePaginator(
        [],
        0,
        9,
        LengthAwarePaginator::resolveCurrentPage(),
        [
            'path' => $request->url(),
            'query' => $request->query(),
        ]
    );
};

Route::get('/', function () {
    return view('pages.home', [
        'featuredPost' => null,
        'recentPosts' => collect(),
        'categories' => collect(),
    ]);
})->name('home');

Route::get('/about', function () {
    return view('pages.about', [
        'categories' => collect(),
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/blog', function (Request $request) use ($emptyPosts) {
    return view('pages.blog', [
        'posts' => $emptyPosts($request),
        'categories' => collect(),
    ]);
})->name('blog');

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'subject' => ['required', 'string', 'max:255'],
        'reason' => ['nullable', 'string', 'max:100'],
        'message' => ['required', 'string', 'min:10'],
    ]);

    return redirect()
        ->route('contact')
        ->with('success', 'Your message was sent successfully.');
})->name('contact.send');

Route::post('/newsletter/subscribe', function () {
    return back()->with('subscribed', true);
})->name('newsletter.subscribe');

Route::middleware('guest')->group(function () {
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:6'],
    ]);

    if (! Auth::attempt($credentials, $request->boolean('remember'))) {
        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    $request->session()->regenerate();

    return redirect()
        ->intended(route('home'))
        ->with('status', 'Welcome back, ' . Auth::user()->name . '.');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()
        ->route('home')
        ->with('status', 'Account created successfully. Welcome to The Desk, ' . $user->name . '.');
});
});

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
})->middleware('auth')->name('logout');
