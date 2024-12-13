<?php require "views/partials/head.php" ?>
        <h2 class="mx-auto font-bold text-xl w-fit mt-10">JS Packages</h2>
        <div class="max-w-[1200px] mx-auto mt-10 grid grid-cols-3 gap-6 px-8 packages-cnt">
        
            <?php foreach($packages as $package) :?>
               <div class="bg-green-500 rounded-md shadow-md  px-4 py-2 cursor-pointer hover:bg-green-300 transition-colors package-item" data-id="<?=$package['id']?>">
                <h2 class="text-center font-bold text-lg bg-green-600 rounded-md"><?=$package['name']?></h2>
               </div>
            <?php endforeach ?>  
        </div>

<?php require "views/partials/footer.php"?>           
