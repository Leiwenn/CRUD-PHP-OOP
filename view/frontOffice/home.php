    <section class="last w-75 mx-auto home_article pt-4">
        <h2 class="font-weight-bold mt-2 p-3 text-center text-white ombre bg-dark rounded"><i class="fas fa-feather-alt mr-2" aria-hidden="true"></i> <?= $h2 ?> </h2>
        <?php
            while($data = $showLastPost->fetch()){
        ?>
            <article class="rounded card col-12 col-md-8 mx-auto">
                <img src="public/img/<?= $data['file_name'] ?>" class="img-fluid card-img-top rounded" alt="<?= $data['file_description'] ?>" />
                <div class="card-body">
                    <h3 class="card-title text-center"> <?= $data['title'] ?> </h3>
                    <p class="card-text text-left">
                        <?= substr(html_entity_decode($data['content']), 0, 1000) . '...' ?>
                    </p>
                    <a href="index.php?action=viewPost&id=<?= $data['id'] ?>" class="ml-2 btn btn-info btn-sm">Lire la suite</a>
                </div>
            </article>
        <?php  
            }
            $showLastPost->closeCursor();
        ?>
    </section>
        
    <section class="p-3 mt-4 mx-auto home">
        <div>
            <img class="img-fluid jean" src="public/img/jean.jpg" alt="Photo en noir et blanc de Jean Forteroche lisant sous un parapluie" />
        </div>
        <h4 class="cinzel font-weight-bold"> <?= $h4 ?> </h4>
        <p class="font-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, autem perferendis obcaecati perspiciatis expedita, voluptate quod mollitia omnis exercitationem enim esse illum porro asperiores architecto! Velit corporis cum facere aliquid, fugit dolorum quos nisi! Explicabo, reiciendis? Earum vel nam expedita maxime quos fugit sapiente eligendi, quis quisquam? Ut cupiditate voluptas, natus et repudiandae ipsa magni dolor deserunt corporis, tempora in necessitatibus quis, temporibus labore! Beatae, tenetur ex consectetur nihil atque eveniet pariatur possimus sapiente, ducimus ipsam quos architecto?</p>
        <p class="cinzelD font-weight-bold">JEAN FORTEROCHE</p>
    </section>
    <a id="backToTop" class="btn" role="btn"><i class="fas fa-arrow-circle-up"></i></a>
