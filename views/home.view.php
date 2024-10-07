<main class=" bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <h2 class="text-3xl font-extrabold text-gray-900">Todo List</h2>
                        <form class="mt-8 space-y-6" action="/" method="POST">
                            <div class="rounded-md shadow-sm -space-y-px">
                                <div>
                                    <input id="task" name="task" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Enter new task">
                                    <input type="hidden" name="key" value="add_todo">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                        <ul class="space-y-4">
                            <?php foreach (get_all_todo() as $todo) : ?>
                                <li class="flex items-center justify-between bg-white p-2 rounded-md shadow-sm">
                                    <div class="flex items-center">
                                        <form action="/" method="post" id="todoForm<?= $todo['id'] ?>">
                                            <div class="display-todo-part flex items-center">
                                                <input id="todo<?= $todo['id'] ?>" <?= $todo["completed"] ? "checked" : "" ?> name="status" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" onchange="this.form.submit()">
                                                <label for="todo<?= $todo['id'] ?>" class="ml-3 block text-sm font-medium text-gray-700 <?= $todo["completed"] ? "line-through" : "" ?>">
                                                    <?= htmlspecialchars($todo['task']) ?>
                                                </label>
                                            </div>

                                            <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                                            <input type="hidden" name="key" value="update_todo_status">
                                        </form>
                                    </div>

                                    <form action="/" method="post" style="display: inline;">
                                        <input type="hidden" name="key" value="remove_todo">
                                        <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </li>

                            <?php endforeach; ?>

                            <!-- <li class="flex items-center justify-between bg-gray-100 p-2 rounded-md shadow-sm">
                                <div class="flex items-center">
                                    <input id="todo3" name="todo3" type="checkbox" checked class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="todo3" class="ml-3 block text-sm font-medium text-gray-500 line-through">
                                        Completed Task
                                    </label>
                                </div>
                                <button class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>