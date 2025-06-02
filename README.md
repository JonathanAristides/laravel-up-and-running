### **MVC (Model-View-Controller)**

* A design pattern that separates concerns:

    * **Model**: Handles data logic and database interactions (e.g., Eloquent models).
    * **View**: Displays the UI (e.g., Blade templates).
    * **Controller**: Processes requests, invokes business logic, and returns responses.

---

### **The HTTP Verbs**

* Standard methods used in web communication:

    * `GET`: Retrieve a resource.
    * `POST`: Create a new resource.
    * `PUT/PATCH`: Update an existing resource.
    * `DELETE`: Remove a resource.
* Laravel maps these verbs to routes using `Route::get()`, etc.

---

### **What is REST**

* REST (Representational State Transfer) is an architecture style for APIs:

    * Uses URIs to access resources.
    * Pairs them with HTTP verbs for actions.
* Example:

    * `GET /posts` → list posts
    * `POST /posts` → create post
    * `DELETE /posts/1` → delete post with ID 1

---

### **Route Verbs**

* Route definitions are tied to HTTP methods:

    * `Route::get()`, `Route::post()`, `Route::put()`, `Route::delete()`, etc.
    * `Route::match(['get', 'post'], ...)` for multi-method routes.
    * `Route::any()` accepts all HTTP verbs.

---

### **Route Handling**

* Routes map URLs to closures or controller methods.
* You can define logic inline (closure) or use controller actions.
* Example:

  ```php
  Route::get('/', function () {
      return view('welcome');
  });
  ```

---

### **Route Parameters**

* **Required**: `{id}` — must be included in the URI.
* **Optional**: `{id?}` — must be handled with a default value.
* Passed as arguments into closure or controller methods.

---

### **Route Names**

* Use `->name('profile')` to assign a name to a route.

#### **Route Naming Conventions**

* Follow a consistent dot-based structure:

    * `resource.action` (e.g. `users.edit`, `admin.dashboard`)

#### **Passing Route Parameters to the route() Helper**

* Syntax:
  `route('users.show', ['user' => 1])`
* Laravel substitutes the parameters into the route URI.

---

### **Route Groups**

* Allows grouping routes that share middleware, prefixes, or name prefixes.
* Reduces repetition and improves structure.
* Example:

  ```php
  Route::middleware('auth')->group(function () {
      Route::get('/dashboard', ...);
  });
  ```

---

### **Middleware**

* Acts as a filter for HTTP requests.
* Examples:

    * `auth`: check if user is logged in.
    * `throttle`: limit request frequency.
* Can be applied to single routes or route groups.

#### **Very Short Intro to Eloquent**

* Laravel’s ORM for working with databases via models.
* Example:

  ```php
  $user = User::where('email', $email)->first();
  ```

---

### **Path Prefixes**

* Add a URI prefix to grouped routes:

  ```php
  Route::prefix('admin')->group(function () {
      Route::get('/dashboard', ...); // Becomes /admin/dashboard
  });
  ```

---

### **Subdomain Routing**

* Define routes tied to subdomains:

  ```php
  Route::domain('{account}.example.com')->group(function () {
      Route::get('/dashboard', ...);
  });
  ```

---

### **Name Prefixes**

* Add a name prefix to all routes in a group:

  ```php
  Route::name('admin.')->group(function () {
      Route::get('/users', ...)->name('users'); // admin.users
  });
  ```

---

### **Route Group Controllers**

* Group all routes of a controller:

  ```php
  Route::controller(UserController::class)->group(function () {
      Route::get('/users', 'index');
      Route::post('/users', 'store');
  });
  ```

---

### **Fallback Routes**

* A catch-all route for unmatched requests.
* Defined using:

  ```php
  Route::fallback(function () {
      return response()->view('errors.404', [], 404);
  });
  ```

---

### **Signed Routes**

* Generate tamper-proof URLs (e.g., for email verification).

#### **Signing a Route**

* Create with:

  ```php
  URL::signedRoute('route.name', ['user' => 1]);
  ```

#### **Modifying Routes to Allow Signed Links**

* Apply the `signed` middleware to the route:

  ```php
  Route::get('/invite', ...)->middleware('signed');
  ```

---

### **Views**

* Return a Blade template or view:

  ```php
  return view('home');
  ```
* Use `Route::view()` for simple static routes:

  ```php
  Route::view('/about', 'about');
  ```

---

### **Controllers**

* Classes that handle multiple related route actions.
* Use `php artisan make:controller MyController`.

#### **What is CRUD**

* Stands for:

    * **Create** (POST)
    * **Read** (GET)
    * **Update** (PUT/PATCH)
    * **Delete** (DELETE)
* Each action maps to a controller method in a resource controller:

    * `index()`, `show()`, `store()`, `update()`, `destroy()`, etc.

---

### **Artisan and Artisan Generator**

* Artisan is Laravel’s CLI tool.
* Use it to:

    * Generate code: `php artisan make:controller`, `make:model`, `make:migration`
    * Run tasks: `php artisan migrate`, `route:list`, etc.
* Saves time and ensures consistency in boilerplate code.

