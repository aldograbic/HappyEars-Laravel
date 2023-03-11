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
        <h1>Registration</h1>
        <form action="<?php echo e(route('registration')); ?>" method="post">
        <?php echo csrf_field(); ?>
            <div id="stage1">
                <div class="position-relative m-5">
                    <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn-sm btn-primary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn-sm btn-primary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn-sm btn-secondary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">3</button>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" required>
                    <label for="first_name">First name</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" required>
                    <label for="last_name">Last name</label>
                </div>
                <button type="button" class="btn" id="next-stage">Next</button>
            </div>

            <div id="stage2" style="display: none;">
                <div class="position-relative m-5">
                    <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn-sm btn-primary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn-sm btn-primary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn-sm btn-secondary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">3</button>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-floating mb-4 mt-4">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
                    <label for="password_confirmation">Confirm password</label>
                </div>
                <button type="button" class="btn" id="next-stage2">Next</button>
            </div>

            <div id="stage3" style="display: none;">
                <div class="position-relative m-5">
                    <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                        <div class="progress-bar" style="width: 75%;"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn-sm btn-primary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn-sm btn-primary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn-sm btn-secondary rounded-pill" style="width: 3rem; height:3rem; background-color: #FED24D;">3</button>
                </div>
                <img src="img\agrabic_minimalist_cartoon_happy_bunny_with_headphones_b087ebac-2d49-4aff-9349-4d1b1be247f9-removebg-preview.png" width="300px" style="top: 20%; left: 52%; position: absolute">
                <div class="form-floating mb-4 mt-4">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    <label for="username">Username</label>
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-outline-warning" value="Register">
                </div>
            </div>
        </form>   
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#stage1').show();

			$('#next-stage').click(function() {
				$('#stage1').hide();
				$('#stage2').show();
			});

            $('#next-stage2').click(function() {
				$('#stage2').hide();
				$('#stage3').show();
            });
		});
	</script>
</body>
</html><?php /**PATH C:\Users\Korisnik\OneDrive\Dokumenti\projekti\HappyEars (Laravel)\resources\views/registration.blade.php ENDPATH**/ ?>