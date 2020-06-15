<header>
    <h1 class="ml-5">Dashboard</h1>
</header>

        <section class="bg-white widgets">

            <div class="mt-5 mb-5 d-flex justify-content-around">
                <div class="d-flex carte">
                    <div class="users d-flex align-items-center justify-content-around">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="ml-3">
                        <p>Membres du blog</p>

                        <?php while($data = $totalMembers->fetch()){ ?>
                        <p class="text-center"> <?= $data['nbre_members'] ?> </p>
                        <?php } ?>

                    </div>
                </div>

                <div class="d-flex carte">
                    <div class="autre d-flex align-items-center justify-content-around">
                        <i class="far fa-thumbs-up"></i>
                    </div>
                    <div class="ml-3">
                        <p>une autre carte</p>
                        <p class="text-center"> autre data </p>
                    </div>
                </div>

            </div>

        </section>