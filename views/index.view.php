<?php require "views/partials/head.php" ?>
    <div class="flex flex-col mx-auto my-10 w-fit items-center">
        <h2 class=" font-bold text-xl w-fit ">JS Packages</h2>
            <form class="">
                <input  type="text" placeholder="search package" class=" w-64 px-5 py-2 outline-none rounded-md my-2 bg-green-200 text-black search-package">
            </form>
    </div>
        <div class="searched-package max-w-[1200px] mx-auto flex flex-col gap-4 mb-10">


        </div>
        <div class="  mx-auto mt-10 grid grid-cols-3 gap-6 px-8 packages-cnt">

        <?= 
         isset($_SESSION['user_id']) ?
         "<div class='bg-green-500 rounded-md shadow-md  px-4 py-2 cursor-pointer hover:bg-green-300 transition-colors btn_add-package' >
          <h2 class='text-center font-bold text-lg bg-green-600 rounded-md'>+</h2>
          </div>"
          :
          "";
        ?>
            <?php foreach($packages as $package) :?>
               <div class="bg-green-500 rounded-md shadow-md  px-4 py-2 cursor-pointer hover:bg-green-300 transition-colors package-item" data-id="<?=$package['id']?>">
                <h2 class="text-center font-bold text-lg bg-green-600 rounded-md"><?=$package['name']?></h2>
               </div>
            <?php endforeach ?>
        </div>
        <div class="mx-auto max-w-[500px] absolute left-1/2 top-10 translate-x-[-50%]">
    <form action="/dashboard" method="POST" class="form_add space-y-4 bg-green-800 rounded-md p-5 hidden">
        <div>
            <label for="name" class="block text-sm font-medium ">Package name</label>
            <input 
            type="text" 
            id="name" 
            name="name" 
            required 
            class="w-full px-4 py-2 mt-2 outline-none  bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500 "
            placeholder="package name"
            />
        </div>
        <div>
            <label for="description" class="block text-sm font-medium">Description</label>
            <input 
            type="text" 
            id="description" 
            name="description" 
            required 
            class="w-full px-4 py-2 mt-2 outline-none bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500"
            placeholder="description"
            />
        </div>

        <button 
        type="submit" 
        class="w-full px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Add
    </button>
        <button  
        class="btn_close-add w-full px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Cancel
    </button>
</form>
</div>
<?php require "views/partials/footer.php"?>        
<script>
    const packages = <?=json_encode($packages)?>;
    const searchPackage = document.querySelector('.search-package');
    const searchedPackage = document.querySelector('.searched-package');

    searchPackage.addEventListener('input',e=>{
        const value = e.target.value;
        if(value.length<3) {
            searchedPackage.innerHTML="";
            
            return;
        }
        const filteredPackages = packages.filter(package=>package.name.toLowerCase().includes(value.toLowerCase()));
        let html=""
        if(filteredPackages.length)
        filteredPackages.forEach(p=>{
            html+= `<div class="bg-green-500 rounded-md shadow-md  px-4 py-2 cursor-pointer hover:bg-green-300 transition-colors package-item" data-id="${p.id}">
                <h2 class="text-center font-bold text-lg bg-green-600 rounded-md">${p.name}</h2>
               </div>`
        }) 
        else html= `<h2 class="text-lg w-fit mx-auto">No results found :(</h2>`;
        searchedPackage.innerHTML = html;

    })
</script>