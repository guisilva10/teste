<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/like_post.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Categorias</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->




<section class="categories">

   <h1 class="heading">Categorias</h1>

   <div class="box-container">
      <div class="box"><span>01</span><a href="category.php?category=nature">natureza</a></div>
      <div class="box"><span>02</span><a href="category.php?category=eduction">educação</a></div>
      <div class="box"><span>03</span><a href="category.php?category=pets and animals">animais de estimação</a></div>
      <div class="box"><span>04</span><a href="category.php?category=technology">tecnologia</a></div>
      <div class="box"><span>05</span><a href="category.php?category=fashion">Moda</a></div>
      <div class="box"><span>06</span><a href="category.php?category=entertainment">entretenimento</a></div>
      <div class="box"><span>07</span><a href="category.php?category=movies">filmes</a></div>
      <div class="box"><span>08</span><a href="category.php?category=gaming">jogos</a></div>
      <div class="box"><span>09</span><a href="category.php?category=music">musica</a></div>
      <div class="box"><span>10</span><a href="category.php?category=sports">esportes</a></div>
      <div class="box"><span>11</span><a href="category.php?category=news">novidades</a></div>
      <div class="box"><span>12</span><a href="category.php?category=travel">negócios</a></div>
      <div class="box"><span>13</span><a href="category.php?category=comedy">comedia</a></div>
      <div class="box"><span>14</span><a href="category.php?category=design and development">design e desenvolvimento</a></div>
      <div class="box"><span>15</span><a href="category.php?category=food and drinks">comidas e bebidas</a></div>
      <div class="box"><span>16</span><a href="category.php?category=lifestyle">estilo de vida</a></div>
      <div class="box"><span>17</span><a href="category.php?category=health and fitness">vida fitness</a></div>
      <div class="box"><span>18</span><a href="category.php?category=business">viagens</a></div>
      <div class="box"><span>19</span><a href="category.php?category=shopping">compras</a></div>
      <div class="box"><span>20</span><a href="category.php?category=animations">animações</a></div>
   </div>

</section>










<?php include 'components/footer.php'; ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>