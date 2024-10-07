<main class=" bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-light-blue-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
            <div class="max-w-md mx-auto">
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <h2 class="text-3xl font-extrabold text-gray-900">Pending Todos</h2>
                    </div>
                    <div class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7">
                        <ul class="space-y-4">
                            <?php foreach (get_incomplete_todo() as $todo) : ?>
                                <li class="flex items-center justify-between bg-white p-2 rounded-md shadow-sm">
                                    <div class="flex items-center">
                                        <div class="display-todo-part flex items-center">
                                            <input id="todo<?= $todo['id'] ?>" name="status" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" <?= $todo["completed"] ? "checked" : "" ?> disabled>
                                            <label for="todo<?= $todo['id'] ?>" class="ml-3 block text-sm font-medium text-gray-700 <?= $todo["completed"] ? "line-through" : "" ?>">
                                                <?= htmlspecialchars($todo['task']) ?>
                                            </label>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>