    <header class="p-2 bg-dark text-white">
        <h1 class="text-center"><i class="fas fa-feather-alt mr-2" aria-hidden="true"></i> <?= $h1 ?></h1>
    </header>

    <section class="widgets">
        <div class="d-flex justify-content-around flex-wrap cards p-3">
            <div class="d-flex carte">
                <div class="w_users d-flex align-items-center justify-content-around bg-success">
                    <a class="text-white" role="button" href="index.php?action=member_list">
                        <i class="fas fa-users" title="liste des membres" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="m-3">
                    <p> <?= $membersTitle ?> </p>
                    <?php
                        while($data = $totalMembers->fetch()){
                            if($data == null){
                                echo '0';
                            }else{
                    ?>
                    <p class="text-center"> <?= $data['nbre_members'] ?> </p>
                    <?php
                            }
                        }
                        $totalMembers->closeCursor();
                    ?>
                </div>
            </div>
            <div class="d-flex carte">
                <div class="w_comments d-flex align-items-center justify-content-around bg-warning">
                    <a class="text-white" role="button" href="index.php?action=comments_awaiting">
                        <i class="fas fa-comments" title="commentaires en attente de publication" aria-hidden="true"></i>
                    </a>
                    
                </div>
                <div class="m-3">
                    <p> <?= $commentsTitle ?> </p>
                    <?php
                        while($data = $totalCommentsAwaiting->fetch()){
                            if($data == null){
                                echo '0';
                            }else{
                    ?>
                    <p class="text-center"> <?= $data['nbre_comments'] ?> </p>
                    <?php
                            }
                        }
                        $totalCommentsAwaiting->closeCursor();
                    ?>
                </div>
            </div>
            <div class="d-flex carte">
                <div class="w_reports d-flex align-items-center justify-content-around bg-danger">
                    <a class="text-white" role="button" href="index.php?action=show_reports">
                        <i class="far fa-bell" title="commentaires signalés" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="m-3">
                    <p> <?= $reportsTitle ?> </p>
                    <?php
                        while($data = $totalReports->fetch()){
                            if($data == null){
                                echo '0';
                            }else{
                    ?>
                    <p class="text-center"> <?= $data['nbre_reports'] ?> </p>
                    <?php
                            }
                        }
                        $totalReports->closeCursor();
                    ?>
                </div>
            </div>
        </div>
        <div class="container mt-3 p-3 text-center billets">
            <section>
                <h2 class="p-2 text-dark font-weight-bold border-bottom"> <?= $h2 ?>
                <?php
                    while($data = $totalPostsAwaiting->fetch()){
                        if($data == null){
                            echo ' : ' . '0';
                        }else{
                            echo ' : ' . $data['nbre_posts'];
                        }
                    }
                    $totalPostsAwaiting->closeCursor();
                ?>
                </h2>
                <ul class="list-group list-group-flush m-4">
                    <?php
                        while($data = $showPostsAwaiting->fetch()){
                    ?>
                    <li class="list-group-item d-flex align-items-center justify-content-between shadow">
                        <i class="far fa-circle"> <?= $data['title'] ?> le <?= $data['creation_date_fr'] ?></i>
                        <a class="btn btn-info ml-3" href="index.php?action=view_post_dashboard&id=<?= $data['id'] ?>"> <?= $linkSeePostAwaiting ?> </a>
                    </li>
                    <?php
                        }
                        $showPostsAwaiting->closeCursor();
                    ?>
                </ul>
            </section>
            <section>
                <h3 class="mt-2 p-2 text-dark font-weight-bold border-bottom"> <?= $h3 ?>
                <?php
                    while($data = $totalPosts->fetch()){
                        if($data == null){
                            echo ' : ' . '0';
                        }else{
                            echo ' : ' . $data['nbre_posts'];
                        }
                    }
                    $totalPosts->closeCursor();
                ?>
                </h3>
                <ul class="list-group list-group-flush m-4">
                    <?php 
                        while($data = $showPostsList->fetch()){
                    ?>
                    <li class="list-group-item d-flex align-items-center justify-content-between shadow"> 
                        <i class="fas fa-circle"> <?= $data['title'] ?> le <?= $data['creation_date_fr'] ?></i> 
                        <a class="btn btn-info ml-3" href="index.php?action=view_post_dashboard&id=<?= $data['id'] ?>"> <?= $linkSeePost ?> </a>
                    </li>
                    <?php 
                        }
                        $showPostsList->closeCursor();
                    ?>
                </ul>
            </section>
        </div>
        <a id="backToTop" title="retour en haut de page" class="btn"><i class="fas fa-arrow-circle-up"></i></a>
    </section>
<!-- end div container-fluid -->
</div>