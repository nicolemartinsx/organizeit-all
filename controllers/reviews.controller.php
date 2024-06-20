<?php



class ReviewsController
{

    function MostrarReviews($idUsuario)
    {

        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM reviews inner join filmes on reviews.idFilmes = filmes.id where idUsuarios = :idUsuario ");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        $reviews = $query->fetchAll(PDO::FETCH_CLASS, "reviews");

        require("views/reviews.view.php");
    }

    function DeletarReview($idUsuario, $idFilme)
    {
        $bd = Conexao::get();
        $query = $bd->prepare("DELETE FROM reviews WHERE idFilmes = :idFilme AND idUsuarios = :idUsuario");
        $query->bindParam(':idFilme', $idFilme);
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();

        header("Location: /reviews/" . urldecode($idUsuario));
    }
}
