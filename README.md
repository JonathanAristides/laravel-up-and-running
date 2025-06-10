### **Blade Templating — Full Session Structure**

---

#### #1: Echoing Data

* **Explanation**: Blade uses `{{ }}` to safely echo data (HTML escaped).
* **Example**: `{{ $username }}`

#### #2: Control Structures

* **Explanation**: Blade supports PHP control structures with a cleaner syntax.
* **Example**:

  ```blade
  @if($user->isAdmin())
    Welcome, Admin!
  @endif
  ```

#### #3: Conditionals

* **Explanation**: Use `@if`, `@elseif`, `@else`, `@unless`, `@isset`, `@empty`.
* **Example**:

  ```blade
  @unless($tasks->isEmpty())
    You have tasks!
  @endunless
  ```

#### #4: Loops

* **Explanation**: Blade supports `@foreach`, `@for`, `@while`, `@forelse`.
* **Example**:

  ```blade
  @foreach($tasks as $task)
    <li>{{ $task->name }}</li>
  @endforeach
  ```

---

### Template Inheritance

#### #5: Defining Sections with @section/@show and @yield

* **Explanation**: Define blocks in child templates, fill them in parent layout.
* **Example**:

  ```blade
  @section('content')
    <p>This is the content</p>
  @show
  ```

#### #6: @extends

* **Explanation**: Extends a layout template.
* **Example**:

  ```blade
  @extends('layouts.master')
  ```

#### #7: @section and @endsection

* **Explanation**: Defines a named section to be injected into layout.
* **Example**:

  ```blade
  @section('title', 'Dashboard')
  ```

#### #8: @parent

* **Explanation**: Appends to content defined in the parent layout.
* **Example**:

  ```blade
  @section('scripts')
    @parent
    <script src="extra.js"></script>
  @endsection
  ```

---

### View Partials

#### #9: @include

* **Explanation**: Includes a Blade partial (reusable file).
* **Example**:

  ```blade
  @include('partials.navbar')
  ```

#### #10: @each

* **Explanation**: Renders a view for each item in a collection.
* **Example**:

  ```blade
  @each('view.name', $items, 'item')
  ```

---

### Using Components

#### #11: Creating Components

* **Explanation**: Artisan command: `php artisan make:component Alert`
* **Creates**: `resources/views/components/alert.blade.php` and `app/View/Components/Alert.php`

#### #12: Passing data into components

* **Example**:

  ```blade
  <x-alert type="error" :message="$errorMessage" />
  ```

#### #13: Passing data via attributes

* **Explanation**: HTML-like attributes are automatically passed.
* **Example**:

  ```blade
  <x-button class="btn-primary" />
  ```

#### #14: Passing data via slots

* **Explanation**: Slots allow child content.
* **Example**:

  ```blade
  <x-card>
    <p>This is the content</p>
  </x-card>
  ```

#### #15: Component Methods

* **Explanation**: Logic can be defined in the component class file.

#### #16: Attributes grab bag (`$attributes`)

* **Explanation**: Allows passing of extra HTML attributes.
* **Example**:

  ```blade
  <div {{ $attributes->merge(['class' => 'alert']) }}></div>
  ```

---

### #17: Using Stacks

* **Explanation**: Push scripts/styles to a specific section from child views.
* **Example**:

  ```blade
  @push('scripts')
    <script src="app.js"></script>
  @endpush

  @stack('scripts')
  ```

---

### View Composers & Service Injection

#### #18: Binding Data Using View Composers

* **Explanation**: Bind data to views globally or per view.

#### #19: Sharing a variable globally

* **Example**:

  ```php
  View::share('appName', 'LaravelApp');
  ```

#### #20: View-scoped view composers with closures

* **Example**:

  ```php
  View::composer('profile', function ($view) {
      $view->with('count', User::count());
  });
  ```

#### #21: View composers for multiple views

* **Example**:

  ```php
  View::composer(['profile', 'dashboard'], ...);
  ```

#### #22: View-scoped composers with classes

* **Example**:

  ```php
  View::composer('profile', ProfileComposer::class);
  ```

---

### #23: Blade Service Injection

* **Explanation**: Inject services directly into a view.
* **Example**:

  ```blade
  @inject('metrics', 'App\Services\MetricsService')
  {{ $metrics->monthlyUsers() }}
  ```

---

### Custom Blade Directives

#### #24: Custom Blade Directives

* **Example**:

  ```php
  Blade::directive('datetime', function ($expression) {
      return "<?php echo ($expression)->format('m/d/Y'); ?>";
  });
  ```

#### #25: Parameters in Custom Directives

* **Explanation**: Pass and parse arguments in custom directives.

#### #26: Easier Custom Directives for “if” Statements

* **Example**:

  ```php
  Blade::if('admin', fn() => auth()->check() && auth()->user()->isAdmin());
  ```

  ```blade
  @admin
    <p>Only admins see this</p>
  @endadmin
  ```

---

### #27: Testing

* **Explanation**: Test views and Blade output using PHPUnit or Pest.

---

### #28: TL;DR Summary (End of Session Recap)

* Blade simplifies templating with readable syntax.
* Supports inheritance, components, and logic separation.
* Encourages reusable and organized frontend structure in Laravel.

