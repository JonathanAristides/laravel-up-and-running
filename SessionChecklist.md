### ✅ **MVC Basics (Model-View-Controller)**

* [ ] **Explanation**:
  Laravel uses the MVC architecture to separate different parts of your app:

    * **Model** handles data and communicates with the database (e.g. Eloquent models).
    * **View** is responsible for the user interface (usually Blade templates).
    * **Controller** processes user requests, updates models, and returns views or responses.

* [ ] **Example**:

  ```php
  // Model
  Task::all(); // fetches all tasks from DB

  // View
  return view('tasks.index'); // shows tasks

  // Controlle
  public function index() {
      return view('tasks.index', ['tasks' => Task::all()]);
  }
  ```

Here are the **basic Laravel Artisan commands** to generate the core components:

---

### ✅ **Create a Model**

```bash
php artisan make:model ModelName
```

➡️ Example:

```bash
php artisan make:model Task
```

---

### ✅ **Create a Controller**

```bash
php artisan make:controller ControllerName
```

➡️ Example:

```bash
php artisan make:controller TaskController
```

---

### ✅ **Create a Migration**

```bash
php artisan make:migration create_table_name
```

➡️ Example:

```bash
php artisan make:migration create_tasks_table
```

---

### ✅ **HTTP Verbs & REST**

* [ ] **Explanation**:
  Web communication is based on HTTP verbs:

    * `GET` = fetch data
    * `POST` = submit new data
    * `PUT`/`PATCH` = update data
    * `DELETE` = remove data
      RESTful APIs combine these verbs with URLs to represent actions on resources.

* [ ] **Example**:

  ```php
  Route::get('/posts', [PostController::class, 'index']);
  Route::post('/posts', [PostController::class, 'store']);
  Route::put('/posts/{id}', [PostController::class, 'update']);
  Route::delete('/posts/{id}', [PostController::class, 'destroy']);
  ```

---

### ✅ **Basic Route Definitions**

* [ ] **Explanation**:
  Define simple routes using anonymous functions or controller actions.

* [ ] **Example**:

  ```php
  Route::get('/welcome', function () {
      return view('welcome');
  });
  ```

---

### ✅ **Route Parameters**

* [ ] **Explanation**:
  Dynamic values in the URL like IDs or slugs can be captured and passed into your route logic.

* [ ] **Example**:

  ```php
  Route::get('/user/{id}', function ($id) {
      return "User ID: $id";
  });
  ```

---

### ✅ **Named Routes**

* [ ] **Explanation**:
  Assigning names to routes makes URL generation and redirection easier and more readable.

* [ ] **Example**:

  ```php
  Route::get('/profile', ...)->name('user.profile');
  return redirect()->route('user.profile');
  ```

---

### ✅ **Route Groups**

* [ ] **Explanation**:
  Group routes together to apply common middleware, prefixes (`/admin`) or name prefixes (`admin.`).

* [ ] **Example**:

  ```php
  Route::middleware('auth')->group(function () {
      Route::get('/dashboard', ...);
  });

  Route::prefix('admin')->group(function () {
      Route::get('/users', ...); // becomes /admin/users
  });
  ```

---

### ✅ **Middleware**

* [ ] **Explanation**:
  Middleware are classes that intercept requests (e.g., check if user is authenticated, throttle spam).

* [ ] **Example**:

  ```php
  Route::get('/admin', ...)->middleware('auth');
  ```

---

### ✅ **Fallback & Signed Routes**

* [ ] **Explanation**:

    * Fallback routes handle all 404 (not found) cases.
    * Signed routes ensure a link hasn’t been tampered with (commonly used for email verification or invitations).

* [ ] **Example**:

  ```php
  Route::fallback(function () {
      return view('errors.404');
  });

  // Generate a signed route:
  URL::signedRoute('invite', ['user' => 1]);

  // Verify it
  Route::get('/invite', ...)->middleware('signed');
  ```

---

### ✅ **Views & Static Routes**

* [ ] **Explanation**:
  If a route only needs to show a view (no logic), you can use `Route::view()`.

* [ ] **Example**:

  ```php
  Route::view('/about', 'about');
  ```

---

### ✅ **Controllers**

* [ ] **Explanation**:
  Controllers organize route logic into classes, helping you keep your code clean and structured.

* [ ] **Example**:

  ```php
  // Generate with Artisan
  php artisan make:controller TaskController

  // Use it in a route
  Route::get('/tasks', [TaskController::class, 'index']);
  ```

---

### ✅ **Resource & API Controllers**

* [ ] **Explanation**:
  Laravel can generate all standard CRUD routes and link them to your controller automatically.

    * `Route::resource()` → full CRUD including views
    * `Route::apiResource()` → API-only (no create/edit views)

* [ ] **Example**:

  ```php
  Route::resource('posts', PostController::class);
  Route::apiResource('comments', CommentController::class);
  ```

---

### ✅ **Route Model Binding**

* [ ] **Explanation**:
  Laravel can automatically fetch the model instance based on route parameters.

* [ ] **Example**:

  ```php
  Route::get('/user/{user}', function (User $user) {
      return $user->email;
  });
  ```

---

### ✅ **Getting Request Data**

* [ ] **Explanation**:
  Use helpers to retrieve user input from forms or query strings.

* [ ] **Example**:

  ```php
  $name = request('name'); // quick
  $email = $request->input('email'); // more explicit
  ```

---

### ✅ **Dependency Injection**

* [ ] **Explanation**:
  Laravel automatically gives you objects like `Request`, or services, if you type-hint them in controller methods.

* [ ] **Example**:

  ```php
  public function store(Request $request) {
      $validated = $request->validate([...]);
  }
  ```

---

### ✅ **Route Caching**

* [ ] **Explanation**:
  Compiles all route definitions into a single cached file for speed — essential in production.

* [ ] **Example**:

  ```bash
  php artisan route:cache
  ```

---

### ✅ **Method Spoofing in Forms**

* [ ] **Explanation**:
  Since HTML forms only support `GET` and `POST`, Laravel uses a hidden `_method` field to simulate `PUT`, `PATCH`, or `DELETE`.

* [ ] **Example**:

  ```blade
  <form method="POST" action="/post/1">
      @csrf
      @method('PUT')
  </form>
  ```

---

### ✅ **Redirects**

* [ ] **Explanation**:
  Easily redirect users to a specific page, a named route, or back with optional flash messages.

* [ ] **Example**:

  ```php
  return redirect()->route('dashboard');
  return redirect()->back()->with('success', 'Saved!');
  ```

---

### ✅ **Abort & Custom Responses**

* [ ] **Explanation**:
  Stop execution and return an error (e.g., 403/404) or return a structured response like JSON or a file download.

* [ ] **Example**:

  ```php
  abort(403);

  return response()->json(['message' => 'OK']);
  ```

---

### ✅ **Testing Routes & Controllers**

* [ ] **Explanation**:
  Use Laravel's built-in test tools (based on PHPUnit) to test routes, logic, and HTTP responses.

* [ ] **Example**:

  ```php
  public function test_dashboard_is_visible_to_authenticated_users() {
      $this->actingAs(User::factory()->create());
      $this->get('/dashboard')->assertStatus(200);
  }
  ```

