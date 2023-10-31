<?php



class ReviewsController{

    function MostrarReviews($id){

        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM reviews inner join filmes on reviews.idFilmes = filmes.id where idUsuarios = :idUsuario ");
        $query->bindParam(':idUsuario', $id);
        $query->execute();
        $reviews= $query->fetchAll(PDO::FETCH_CLASS, "reviews");

        //select * from reviews inner join filmes on reviews.idFilmes = filmes.id where idUsuarios = 1; 
   
        require("views/reviews.view.php");
    }

}