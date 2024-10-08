<?php
$title = '404: Not Found!';
?>

<?php require_once '../views/partials/head.php' ?>
<?php require_once '../views/partials/nav.php' ?>

<div class="flex min-h-full flex-col justify-center px-6 py-4 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/login/store" method="POST">

            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" value="<?= $old['email'] ?? '' ?>" autocomplete="email" required class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <?php if (isset($errors['email'])): ?>
                    <span class="text-red-500 text-sm"><?= $errors['email']['error'] ?></span>
                <?php endif; ?>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-2 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <?php if (isset($errors['password'])): ?>
                    <span class="text-red-500 text-sm"><?= $errors['password']['error'] ?></span>
                <?php endif; ?>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            You do not have an account?
            <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Click here</a>
        </p>
    </div>
</div>



<?php require_once '../views/partials/footer.php' ?>