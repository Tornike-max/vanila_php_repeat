<?php
$title = 'Note';

?>

<?php require_once '../views/partials/head.php' ?>
<?php require_once '../views/partials/nav.php' ?>
<?php require_once '../views/partials/header.php' ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-500 underline font-semibold">Go Back</a>
        <div class="max-w-xl m-auto py-6 px-8 w-full flex justify-center items-center bg-slate-200 shaddow-lg rounded-lg">
            <h1><?= $note['body'] ?></h1>
        </div>
        <form method="post" action="/notes/delete?id=<?= $note['id'] ?>" class="w-full">
            <input type="hidden" name="_method" value="DELETE" />
            <button class="text-red-500 text-lg font-semibold">Delete</button>
        </form>
    </div>
</main>

<?php require_once '../views/partials/footer.php' ?>