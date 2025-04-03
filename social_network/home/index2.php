<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link href="css/font.css" rel="stylesheet">
    <link href="css/HomeStyle.css" rel="stylesheet">
    <title>Лента</title>
</head>

<body>
  <nav class="nav-buttons">
    <button type="button"><img src="images/home.svg" alt="Перейти к ленте" width="40"></button>
    <button type="button"><img src="images/profile.svg" alt="Мой профиль" width="40"></button>
    <button type="button"><img src="images/plus.svg" alt="Создать новый пост" width="40"></button>
  </nav>
  <?php
    $content = file_get_contents("../posts.json");
    $data = json_decode($content, true);
    $posts = $data['posts'];
    foreach($posts as $post):
    ?>
  <div class="publication">
    <div class="headpost">
      <img src=<?php echo $post['user']['user-icon']?> alt="Мини-фото профиля" width="48">
      <span class="post-header-author"><?php echo $post['user']['name']?></span>
      <?php if ($post['user']['id'] == 1): ?>
        <img src="images/edit.svg" alt="Редактировать публикацию" width="24" class="post-header-right">
      <?php endif; ?>
    </div>
      
    <img src=<?php echo $post['publication']['img-source'] ?> alt="Фотография" width="500" class="content-main-photo">
      
    <div class="like">
      <button type="button">❤</button>
      <span class="like-count"><?php echo $post['publication']['likes'] ?></span>
    </div>
      
    <div class="post-description">
      <p class="text-description"><?php echo $post['publication']['post-description'] ?>...</p>
      <p class="pubtime"><?php echo $post['publication']['publication-time'] ?></p>
    </div>
  </div>
  <?php endforeach; ?>
</body>
</html>