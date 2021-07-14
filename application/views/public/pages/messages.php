<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/public/style.css">
    
</head>
<body>
<?php if(isset($chat)): ?>
    <ul>
        <?php foreach($chat as $message): ?>
            <li class="shout"><span><?php echo $message->created_at; ?> - </span><strong><a style="text-decoration: none;" href="<?php echo base_url(); ?>User/view_profile/<?php echo $message->user_id; ?>" target="_blank"><?php echo $message->username; ?></a></strong>: <?php echo $message->text; ?> </li>
        <?php endforeach; ?>
     </ul>
<?php else: ?>
    <h1 style="text-align: center; margin-top: 150px;"><?php echo $no_chat; ?></h1>
<?php endif; ?>
</body>
</html>