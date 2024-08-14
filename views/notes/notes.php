<?php
$title = 'Notes';

?>

<?php require_once '../views/partials/head.php' ?>
<?php require_once '../views/partials/nav.php' ?>
<?php require_once '../views/partials/header.php' ?>

<main class="max-w-7xl mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">
    <ul class="space-y-4">
        <?php foreach ($notes as $note): ?>
            <li class="text-lg bg-slate-100 py-2 px-3 rounded-md">
                <a href="/note?id=<?= $note['id'] ?>" class="font-semibold text-blue-600 hover:text-blue-700 underline">
                    <?= $note['body'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="mt-8 flex justify-center">
        <a href="/notes/create" class="py-3 px-6 rounded-lg bg-blue-500 hover:bg-blue-600 text-white duration-150 transition-all shadow-md">
            Create Note
        </a>
    </div>
</main>


<?php require_once '../views/partials/footer.php' ?>