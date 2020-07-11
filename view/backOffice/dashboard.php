<header class="d-flex">
    <h1 class="ml-5"> <?= $titleh1 ?></h1>
</header>

        <section class="bg-white widgets p-3">

            <div class="d-flex justify-content-around">
                <div class="d-flex carte">
                    <div class="w_users d-flex align-items-center justify-content-around bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ml-3">
                        <p>Membres</p>

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
                        ?>

                    </div>
                </div>

                <div class="d-flex carte">
                    <div class="w_comments d-flex align-items-center justify-content-around bg-warning">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="ml-3">
                        <p>Commentaires à publier</p>

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
                        ?>
                    </div>
                </div>

                <div class="d-flex carte">
                    <div class="w_reports d-flex align-items-center justify-content-around bg-danger">
                        <i class="far fa-bell"></i>
                    </div>
                    <div class="ml-3">
                        <p>Demandes de modération</p>

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
                        ?>
                    </div>
                </div>

            </div>

            <div class="mt-4 border-top p-2 text-center billets">
                <h2> <?= $titleh2 ?></h2>
                <div class="d-flex">
                    <section class="border-left border-right">
                        <h3> 
                            <?= $titleh3 ?>
                            <?php
                                while($data = $totalPosts->fetch()){
                                    if($data == null){
                                        echo '0';
                                    }else{
                                        echo ' - ' . $data['nbre_posts'];
                                    }
                                }
                            ?>
                        </h3>
                            <ul class="list-group list-group-flush">
                                <?php while($data = $showPostsList->fetch()){ ?>
                                    <li class="list-group-item"> <?= $data['title'] ?> le <?= $data['creation_date_fr'] ?></li>
                                <?php } ?>
                            </ul>
                    </section>
                    <section class="border-left border-right">
                        <h4> <?= $titleh4 ?> </h4>
                            <ul class="list-group list-group-flush">
                                <?php
                                    while($data = $showPostsAwaiting->fetch()){
                                        if($data == null){
                                            echo '0';
                                        }else{
                                ?>
                                            <li class="list-group-item"> <?= $data['title'] ?> le <?= $data['creation_date_fr'] ?></li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                    </section>
                </div>
            </div>

        </section>