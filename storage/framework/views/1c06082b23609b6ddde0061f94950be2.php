<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>


<h1> lol lmao </h1>
<form action="<?php echo e(url('/submit')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="name">Meno:</label>
    <input type="text" id="name" name="name">
    <br>

    <label for="email">tvoj tatko:</label>
    <input type="email" id="email" name="email">
    <br>

    <label for="age">tvaja mama:</label>
    <input type="number" id="age" name="age">
    <br>


    <button type="submit">Odoslat</button>

</form>


</body>
</html>
<?php /**PATH D:\xampp\htdocs\myproject\resources\views/form.blade.php ENDPATH**/ ?>