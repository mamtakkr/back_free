<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('public/css/app.css')); ?>">
        
        <!-- Scripts -->
        <script src="<?php echo e(asset('public/js/app.js')); ?>" defer></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <?php echo e($slot); ?>

        </div>
    </body>
    </html>
    
<script>
    $('#is_paid').change(function (e){
        e.preventDefault();
        var is_checked = $('#is_paid').prop('checked');
        // alert(is_checked);
        if(is_checked){
            $('#parent_cat_div').css('display','block');
            $('#parent_cat_div').val('');
        }else{
            $('#parent_cat_div').css('display','none');
        }
    })

    // $('#is_not_paid').change(function (e){
    //     e.preventDefault();
    //     var is_checked = $('#is_not_paid').prop('checked');
    //     // alert(is_checked);
    //     if(is_checked){
    //         $('#parent_cat_div').css('display','none');
    //         $('#parent_cat_div').val('');
    //     }else{
    //         $('#parent_cat_div').css('display','block');
    //     }
    // })

</script><?php /**PATH /home/demogswebtech/public_html/freely/resources/views/layouts/guest.blade.php ENDPATH**/ ?>