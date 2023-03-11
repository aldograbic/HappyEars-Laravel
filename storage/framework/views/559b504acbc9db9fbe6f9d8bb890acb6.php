<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>HappyEars</title>
</head>
<body>
    <div class="stage login position-absolute top-50 start-50 translate-middle">
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

            </div>
        <?php elseif(session()->has('error')): ?>
            <div class="alert alert-danger">
            <?php echo e(session()->get('error')); ?>

            </div>
        <?php endif; ?>
        <h1>Login</h1>
        <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo csrf_field(); ?>
            <div class="form-floating mb-4 mt-4">
                <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="mb-5">
                <input type="submit" class="btn btn-outline-warning" value="Jump right in!">
            </div>
            <div>
                <p>Oops! I don't have an account...<a href="<?php echo e(route('registration-page')); ?>" style="color: #FED24D; text-decoration: none;">Sign me up!</a></p>
            </div>
        </form>   
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>   
</body>
</html><?php /**PATH C:\Users\Korisnik\OneDrive\Dokumenti\projekti\HappyEars (Laravel)\resources\views/login.blade.php ENDPATH**/ ?>