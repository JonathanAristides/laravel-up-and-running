<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $testVariable = "This is a test variable";
    $testBoolean = true;
    $testArray = ['item1', 'item2', 'item3'];
    $testArrayOfObjects = [
        (object)['name' => 'Object1', 'value' => 1],
        (object)['name' => 'Object2', 'value' => 2],
        (object)['name' => 'Object3', 'value' => 3],
    ];

    //    return view('index', compact('testVariable', 'testBoolean', 'testArray'));
    return view('index', [
        'testVariable' => $testVariable,
        'testBoolean' => $testBoolean,
        'testArray' => $testArray,
        'testArrayOfObjects' => $testArrayOfObjects,
    ]);
});

Route::get('/about', function () {
    $dummyTasks = [
        (object)['id' => 1, 'title' => 'Task 1', 'completed' => false],
        (object)['id' => 2, 'title' => 'Task 2', 'completed' => true],
        (object)['id' => 3, 'title' => 'Task 3', 'completed' => false],
    ];

//    #10
    return view('about', [
        'dummyTasks' => $dummyTasks,
    ]);
});

Route::post('/task-complete', function () {
    $taskId = request('task_id');
    $completed = request('completed');

    // Here you would typically update the task in the database.
    // For this example, we'll just return a success message.

    return response()->json([
        'success' => true,
        'message' => "Task {$taskId} marked as " . ($completed ? 'completed' : 'not completed'),
    ]);
})->name('task.complete');
