
# ✅ Laravel Routing & Controllers Chapter – Project

---

## 🧱 1. Setup the Base (MVC)

* [ ] `laravel new taskboard`
* [ ] `php artisan make:model Task -m`
* [ ] Add `title` and `description` to migration
* [ ] `php artisan migrate`
* [ ] `php artisan make:controller TaskController --resource`
* [ ] Create Blade views: `index`, `show`, `create`, `edit`
* [ ] Seed 2–3 sample tasks (via seeder or `Tinker`)
* 🔍 **Topic: MVC Pattern**

---

## 🌐 2. Define RESTful Routes Manually

* [ ] Define all 7 CRUD routes manually using:

  ```php
  Route::get('/tasks', ...)->name('tasks.index');
  Route::post('/tasks', ...)->name('tasks.store');
  ...etc.
  ```
* [ ] Make sure route names follow `resource.action` pattern
* 🔍 **Topics: REST, HTTP Verbs, Route Verbs, Route Naming**

---

## 🛠️ 3. Implement Controller Logic (CRUD)

* [ ] In `TaskController`, implement:

    * `index()`, `create()`, `store()`
    * `show()`, `edit()`, `update()`, `destroy()`
* [ ] Use dependency injection: `store(Request $request)`
* [ ] Use `$request->input(...)` or `request('title')`
* 🔍 **Topics: Controllers, CRUD, Dependency Injection, Getting Input**

---

## 🖼️ 4. Connect Views (Blade)

* [ ] `index.blade.php`: list tasks
* [ ] `create.blade.php`: form with `@csrf`
* [ ] `edit.blade.php`: form with `@csrf` + `@method('PUT')`
* [ ] `show.blade.php`: display task
* 🔍 **Topics: Views, CSRF, Method Spoofing, Blade Forms**

---

## 🧬 5. Route Parameters & Model Binding

* [ ] Use route model binding in `show(Task $task)` etc.
* [ ] Test passing a route param like `route('tasks.show', $task)`
* 🔍 **Topics: Route Parameters, Implicit Model Binding**

---

## 🗂️ 6. Route Handling and Routing Variants

* [ ] Add a closure route like:

  ```php
  Route::get('/', function () {
      return view('welcome');
  });
  ```
* [ ] Add an optional parameter: `/hello/{name?}`
* [ ] Add a `Route::match(['get', 'post'], '/multi', ...)`
* [ ] Add a `Route::any('/any', ...)`
* 🔍 **Topics: Route Handling, Optional Params, match(), any()**

---

## 🛣️ 7. Route Groups, Prefixes, and Naming

* [ ] Create a route group:

  ```php
  Route::prefix('admin')->name('admin.')->group(function () {
      Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
  });
  ```
* [ ] Access via `/admin/dashboard` and `route('admin.dashboard')`
* 🔍 **Topics: Route Groups, Prefix, Name Prefix**

---

## 🧩 8. Route::controller() Syntax

* [ ] Try defining routes like:

  ```php
  Route::controller(TaskController::class)->group(function () {
      Route::get('/tasks', 'index');
      Route::post('/tasks', 'store');
  });
  ```
* 🔍 **Topic: Route Group Controllers**

---

## ❌ 9. Fallback Route

* [ ] Add a fallback route:

  ```php
  Route::fallback(function () {
      return response()->view('errors.404', [], 404);
  });
  ```
* 🔍 **Topic: Fallback Routes**

---

## 🔐 10. Signed Routes

* [ ] Add:

  ```php
  Route::get('/invite', function () {
      return view('invite');
  })->middleware('signed')->name('invite');
  ```
* [ ] Generate signed URL in web.php or a controller:

  ```php
  URL::signedRoute('invite');
  ```
* [ ] Try accessing with/without signature
* 🔍 **Topics: Signed Routes, signed middleware**

---

## 🧾 11. Static Views and View Routes

* [ ] Add a simple static route:

  ```php
  Route::view('/about', 'about')->name('about');
  ```
* 🔍 **Topics: Route::view, Blade Views**

---

## 🚦 12. Redirects & Aborts

* [ ] Use `redirect()->route('tasks.index')` after store/update
* [ ] Try `abort(403)` or `abort(404)` inside a controller
* 🔍 **Topics: Redirects, Aborting Requests**

---

## 🧪 13. Custom Responses (Optional)

* [ ] Try:

  ```php
  return response()->make('Manual response');
  return response()->json(['message' => 'hello']);
  ```
* 🔍 **Topic: Custom Responses**

---

## 🚀 14. Artisan Routing Tools

* [ ] Run:

    * `php artisan route:list`
    * `php artisan route:cache`
    * `php artisan route:clear`
* 🔍 **Topic: Artisan & Route Caching**

---

## ✅ Wrap-Up

* [ ] Double-check each route is working
* [ ] Click through all links
* [ ] Confirm you covered every topic above
* [ ] Celebrate — you've now built a Laravel app that covers the full chapter 👏

---

Would you like this exported as a printable checklist, or shall I generate a Markdown file for your project folder?
