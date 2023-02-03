<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['publish'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $status = 'active';
   
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_image = $conn->prepare("SELECT * FROM `posts` WHERE image = ? AND admin_id = ?");
   $select_image->execute([$image, $admin_id]);

   if(isset($image)){
      if($select_image->rowCount() > 0 AND $image != ''){
         $message[] = 'nome da imagem repetido!
         ';
      }elseif($image_size > 2000000){
         $message[] = '
         o tamanho das imagens é muito grande!';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   }else{
      $image = '';
   }

   if($select_image->rowCount() > 0 AND $image != ''){
      $message[] = '
      por favor renomeie sua imagem!';
   }else{
      $insert_post = $conn->prepare("INSERT INTO `posts`(admin_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
      $insert_post->execute([$admin_id, $name, $title, $content, $category, $image, $status]);
      $message[] = 'post publicado!!';
   }
   
}

if(isset($_POST['draft'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $status = 'deactive';
   
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_image = $conn->prepare("SELECT * FROM `posts` WHERE image = ? AND admin_id = ?");
   $select_image->execute([$image, $admin_id]); 

   if(isset($image)){
      if($select_image->rowCount() > 0 AND $image != ''){
         $message[] = 'nome da imagem repetido!';
      }elseif($image_size > 2000000){
         $message[] = ' o tamanho das imagens é muito grande!';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   }else{
      $image = '';
   }

   if($select_image->rowCount() > 0 AND $image != ''){
      $message[] = ' por favor renomeie sua imagem!';
   }else{
      $insert_post = $conn->prepare("INSERT INTO `posts`(admin_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
      $insert_post->execute([$admin_id, $name, $title, $content, $category, $image, $status]);
      $message[] = '
      rascunho salvo!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>posts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<?php include '../components/admin_header.php' ?>

<section class="post-editor">

   <h1 class="heading">adicionar novo post</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="name" value="<?= $fetch_profile['name']; ?>">
      <p>Título <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="adicione um título" class="box">
      <p>Conteúdo <span>*</span></p>
      <textarea name="content" class="box" required maxlength="10000" placeholder="escreva seu conteúdo..." cols="30" rows="10"></textarea>
      <p>Categoria <span>*</span></p>
      <select name="category" class="box" required>
         <option value="" selected disabled>-- selecionar categoria* </option>
         <option value="nature">natureza</option>
         <option value="education">educação</option>
         <option value="pets and animals">animais de estimação</option>
         <option value="technology">tecnologia</option>
         <option value="fashion">moda</option>
         <option value="entertainment">entretenimento</option>
         <option value="movies and animations">filmes</option>
         <option value="gaming">jogos</option>
         <option value="music">música</option>
         <option value="sports">esportes</option>
         <option value="news">novidades</option>
         <option value="travel">negócios</option>
         <option value="comedy">comédia</option>
         <option value="design and development">design e desenvolvimento</option>
         <option value="food and drinks">bebidas e comidas</option>
         <option value="lifestyle">estilo de vida</option>
         <option value="personal">profissão</option>
         <option value="health and fitness">vida fitness</option>
         <option value="business">viagens</option>
         <option value="shopping">compras</option>
         <option value="animations">animações</option>
      </select>
      <p>adicionar imagem</p>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <div class="flex-btn">
         <input type="submit" value="publicar postagem" name="publish" class="btn">
         <input type="submit" value="salvar rascunho" name="draft" class="option-btn">
      </div>
   </form>

</section>










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>