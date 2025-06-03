#  Laravel TaskBoard – Step-by-Step Session Guide

---

## 🧱 1. Setup the Project

* [ ] Create project

  ```bash
  laravel new taskboard
  cd taskboard
  ```

* [ ] Create Task model + migration

  ```bash
  php artisan make:model Task -m
  ```

* [ ] In the migration file, define:

  ```php
  $table->string('title');
  $table->text('description')->nullable();
  ```

* [ ] Migrate the DB

  ```bash
  php artisan migrate
  ```

---

## 🧩 2. Create Controller & Seeder

* [ ] Create a resource controller

  ```bash
  php artisan make:controller TaskController --resource
  ```

* [ ] Create a seeder

  ```bash
  php artisan make:seeder TaskSeeder
  ```

* [ ] In `TaskSeeder.php`, add 2–3 sample tasks.

* [ ] Register in `DatabaseSeeder.php` and run:

  ```bash
  php artisan migrate:fresh --seed
  ```

---

## 🌐 3. Define Routes Manually in `routes/web.php`

```php
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
```

---

## 🛠️ 4. Implement Controller Methods

In `TaskController.php`, implement:

* [ ] `index()` – show all tasks
* [ ] `create()` – return view
* [ ] `store(Request $request)` – validate and save
* [ ] `show(Task $task)` – show one
* [ ] `edit(Task $task)` – return edit form
* [ ] `update(Request $request, Task $task)` – update
* [ ] `destroy(Task $task)` – delete

Use:

```php
$request->validate([...]);
$request->input('title');
return redirect()->route('tasks.index');
```

---

## 🖼️ 5. Build Views (in `resources/views/tasks/`)

Create these files and style simply:

* [ ] `index.blade.php` – loop all tasks + links
* [ ] `create.blade.php` – form to add task
* [ ] `edit.blade.php` – form to edit task (with `@method('PUT')`)
* [ ] `show.blade.php` – display task

Use:

```blade
@csrf
@method('DELETE')
route('tasks.edit', $task)
```

---

## 🧬 6. Add Bonus Route Features

* [ ] Add fallback route:

  ```php
  Route::fallback(function () {
      return response()->view('errors.404', [], 404);
  });
  ```

* [ ] Add static view:

  ```php
  Route::view('/about', 'about')->name('about');
  ```

* [ ] Add redirect:

  ```php
  Route::redirect('/', '/tasks');
  ```

* [ ] (Optional) Add signed route:

  ```php
  Route::get('/invite', function () {
      return view('invite');
  })->middleware('signed')->name('invite');
  ```

---

## 🔚 7. Wrap-Up

* [ ] Run:

  ```bash
  php artisan route:list
  ```
* [ ] Click through the browser and test all routes
* [ ] Confirm all CRUD works
* [ ] Confirm fallback and redirect work
* ✅ Done!
