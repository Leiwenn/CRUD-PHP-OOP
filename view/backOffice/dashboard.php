<header class="p-2 bg-dark text-white">
    <h1 class="text-center"> <?= $titleh1 ?></h1>
</header>

<section class="widgets p-3">
    <div class="d-flex justify-content-around">
        <div class="d-flex carte">
            <div class="w_users d-flex align-items-center justify-content-around bg-success">
                <i class="fas fa-users"></i>
            </div>
            <div class="m-3">
                <p>Membres</p>
                <?php
                    while($data = $totalMembers->fetch()){
                        if($data == null){
                            echo '0';
                        }else{
                ?>
                            <p class="text-center"> <?= htmlspecialchars($data['nbre_members']) ?> </p>
                <?php
                        }
                    }
                    $totalMembers->closeCursor();
                ?>
            </div>
        </div>
        <div class="d-flex carte">
            <div class="w_comments d-flex align-items-center justify-content-around bg-warning">
                <i class="fas fa-comments"></i>
            </div>
            <div class="m-3">
                <p>Commentaires à publier</p>
                <?php
                    while($data = $totalCommentsAwaiting->fetch()){
                        if($data == null){
                            echo '0';
                        }else{
                ?>
                            <p class="text-center"> <?= htmlspecialchars($data['nbre_comments']) ?> </p>
                <?php
                        }
                    }
                    $totalCommentsAwaiting->closeCursor();
                ?>
            </div>
        </div>
        <div class="d-flex carte">
            <div class="w_reports d-flex align-items-center justify-content-around bg-danger">
                <i class="far fa-bell"></i>
            </div>
            <div class="m-3">
                <p>Demandes de modération</p>
                <?php
                    while($data = $totalReports->fetch()){
                        if($data == null){
                            echo '0';
                        }else{
                ?>
                            <p class="text-center"> <?= htmlspecialchars($data['nbre_reports']) ?> </p>
                <?php
                        }
                    }
                    $totalReports->closeCursor();
                ?>
            </div>
        </div>
    </div>
    <div class="mt-3 p-2 text-center billets">
        <section>
            <h2 class="p-2 ombre text-white"> <?= $titleh2 ?>
                    <?php
                        while($data = $totalPostsAwaiting->fetch()){
                            if($data == null){
                                echo ' : ' . '0';
                            }else{
                                echo ' : ' . htmlspecialchars($data['nbre_posts']);
                            }
                        }
                        $totalPostsAwaiting->closeCursor();
                    ?>
            </h2>
                <ul class="list-group list-group-flush">
                    <?php
                        while($data = $showPostsAwaiting->fetch()){
                            if($data == null){
                                echo '0';
                            }else{
                    ?>
                                <li class="list-group-item d-flex align-items-center justify-content-between"> <?= $data['title'] ?> le <?= htmlspecialchars($data['creation_date_fr']) ?> <a class="btn btn-outline-info ml-3" href="index.php?action=view_Post_Awaiting&id=<?= htmlspecialchars($data['id']) ?>">Voir le billet</a></li>
                    <?php
                            }
                        }
                        $showPostsAwaiting->closeCursor();
                    ?>
                </ul>
        </section>
        <section>
                <h3 class="mt-2 p-2 ombre text-white"> <?= $titleh3 ?>
                    <?php
                        while($data = $totalPosts->fetch()){
                            if($data == null){
                                echo ' : ' . '0';
                            }else{
                                echo ' : ' . htmlspecialchars($data['nbre_posts']);
                            }
                        }
                        $totalPosts->closeCursor();
                    ?>
                </h3>
                <ul class="list-group list-group-flush">
                    <?php 
                        while($data = $showPostsList->fetch()){
                    ?>
                        <li class="list-group-item d-flex align-items-center justify-content-between"> <?= htmlspecialchars($data['title']) ?> le <?= htmlspecialchars($data['creation_date_fr']) ?> <a class="btn btn-outline-info ml-3" href="index.php?action=view_Post_Dashboard&id=<?= htmlspecialchars($data['id']) ?>">Voir le billet</a></li>
                    <?php 
                        }
                        $showPostsList->closeCursor();
                    ?>
                </ul>
        </section>
    </div>
</section>