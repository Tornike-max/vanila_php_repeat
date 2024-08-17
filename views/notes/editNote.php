<?php
$title = 'Update Note';

?>

<?php require_once '../views/partials/head.php' ?>
<?php require_once '../views/partials/nav.php' ?>
<?php require_once '../views/partials/header.php' ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-500 underline font-semibold">Go Back</a>
        <div class="max-w-xl m-auto py-6 px-8 w-full flex justify-center items-center bg-slate-200 shadow-lg rounded-lg">
            <form action="/notes/update?id=<?= $data['id'] ?>" method="POST" class="w-full">

                <input type="hidden" name="_method" value="PATCH" />
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Note Body</label>
                    <textarea id="body" name="body" rows="4" class="mt-1 block w-full px-3 py-2 text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?= $data['body'] ?></textarea>
                    <span class="text-red-500 text-sm pt-2"><?= $errors['error'] ?? null ?></span>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="py-2 px-4 rounded-md bg-blue-500 hover:bg-blue-600 text-white shadow-md transition duration-150">
                        Update Note
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>


<?php require_once '../views/partials/footer.php' ?>