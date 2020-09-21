<header class="p-2 bg-dark text-white">
    <h1 class="text-center"> <?= $h1 ?></h1>
</header>

<section class="widgets p-3">
    <div class="d-flex justify-content-around">
        <div class="d-flex carte">
            <div class="w_users d-flex align-items-center justify-content-around bg-success">
                <a class="text-white" role="button" href="index.php?action=member_list">
                    <i class="fas fa-users"></i>
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
                    <i class="fas fa-comments"></i>
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
                    <i class="far fa-bell"></i>
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
    <div class="mt-3 p-2 text-center billets">
        <section>
            <h2 class="p-2 ombre text-white"> <?= $h2 ?>
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
            <ul class="list-group list-group-flush">
                <?php
                    while($data = $showPostsAwaiting->fetch()){
                ?>
                <li class="list-group-item d-flex align-items-center justify-content-between"> 
                    <?= $data['title'] ?> le <?= $data['creation_date_fr'] ?> 
                    <a class="btn btn-outline-info ml-3" href="index.php?action=view_post_dashboard&id=<?= $data['id'] ?>"> <?= $linkSeePostAwaiting ?> </a>
                </li>
                <?php
                    }
                    $showPostsAwaiting->closeCursor();
                ?>
            </ul>
        </section>
        <section>
            <h3 class="mt-2 p-2 ombre text-white"> <?= $h3 ?>
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
            <ul class="list-group list-group-flush">
                <?php 
                    while($data = $showPostsList->fetch()){
                ?>
                <li class="list-group-item d-flex align-items-center justify-content-between"> 
                    <?= $data['title'] ?> le <?= $data['creation_date_fr'] ?> 
                    <a class="btn btn-outline-info ml-3" href="index.php?action=view_post_dashboard&id=<?= $data['id'] ?>"> <?= $linkSeePost ?> </a>
                </li>
                <?php 
                    }
                    $showPostsList->closeCursor();
                ?>
            </ul>
        </section>
    </div>
</section>