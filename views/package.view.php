
<?php require "views/partials/head.php" ?>
<div class="max-w-[1200px] mx-auto mt-10 px-8">

<div class="bg-green-500 rounded-md shadow-md px-4 py-2  transition-colors package relative">
   <?=isset($_SESSION['user_id'])?
   "<button class='btn_delete-package absolute top-0 right-5 text-lg font-bold hover:text-green-400 transition-colors'>...</button>"
   :
   ""?>
   <h2 class="text-center font-bold text-lg bg-green-600 rounded-md"><?=$package['name']?></h2>
   <div class=" px-10 mt-5">
      <p class="font-semibold text-xl"><?=$package['description']?></p>
      <h3>versions :</h3>
      <ul class="flex flex-col gap-2">
        <?php foreach($versions as $version) :?>
            <li class=" bg-green-800 px-5 flex items-center gap-3 justify-between">
                <p><?=$version['name']?></p>
                <?php 
                if(isset($_SESSION['user_id'])) 
                echo "<form action='' method='POST'>
                <input type='hidden' id='hidden' name='hidden' value='delete_version'>
                    <input type='hidden' name='version_id' value='{$version['id']}'/>
                    <button type='submit' class='bg-red-600 w-3 h-3 flex justify-center items-center rounded-full hover:bg-red-400 transition-colors'>-</button>
                </form>"
                ?>
            </li>
            <?php endforeach?>   
            <?= isset($_SESSION['user_id']) ?
        "<li class='btn_add-version bg-green-800 pl-5 hover:bg-green-950 cursor-pointer transition-colors'>+</li>"
        : "";
        ?>
      </ul>
      <h2 class="  mt-4">authors :</h2>
      <div class="flex items-center gap-4 ">
          <ul class="flex flex-wrap gap-x-6 mt-1">
              <?php foreach($authors as $author) :?>
                <li class="flex items-center gap-2">
                <?php 
                if(isset($_SESSION['user_id']))
                echo "<form action='' method='POST'>
                      <input type='hidden' id='hidden' name='hidden' value='delete_author'>
                      <input type='hidden' name='author_id' value='{$author['id']}'/>    
                      <button type='submit' class='bg-red-600 w-3 h-3 inline-flex justify-center items-center rounded-full hover:bg-red-400 transition-colors' >-</button>                
                      </form>"
                ?>
                <span><?=$author['name']?></span>
            </li>
        <?php endforeach?>   
      </ul>
      </div>
      <?= isset($_SESSION['user_id']) ?
        "<button class='btn_add-author mt-4 text-lg font-bold w-5 h-5 rounded-full flex justify-center items-center bg-green-800 hover:bg-green-950 transition-colors'>&#43;</button>"
        : "";
        ?>
   </div>
</div>
<div class="mx-auto max-w-[500px] absolute left-1/2 top-10 translate-x-[-50%]">
    <form action="" method="POST" class="form_add space-y-4 bg-green-800 rounded-md p-5 hidden">
    <input type="hidden" id="hidden" name="hidden" value="version">
        <div>
            <label for="name" class="block text-sm font-medium ">version :</label>
            <input 
            type="text" 
            id="version" 
            name="version" 
            required 
            class="w-full px-4 py-2 mt-2 outline-none  bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500 "
            placeholder="version"
            />
        </div>
        <div>
            <label for="name" class="block text-sm font-medium ">Release date :</label>
            <input 
            type="date" 
            id="date" 
            name="date" 
            required 
            class="w-full px-4 py-2 mt-2 outline-none  bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500 "
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
    <form action="" method="POST" class="form_add-author space-y-4 bg-green-800 rounded-md p-5 hidden">
        <input type="hidden" id="hidden" name="hidden" value="author">
        <div>
            <label for="author" class="block text-sm font-medium ">author :</label>

            <select name="author" id="author" class="w-full px-4 py-2 mt-2 outline-none  bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500 ">
                <option value="" class="hidden">select author</option>
                <?php foreach($allAuthors as $a) : ?>
                    <option value="<?=$a['id']?>"><?=$a['name']?></option>
                <?php endforeach ?>
            </select>
        </div>

    <button 
        type="submit" 
        class="w-full px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Add
    </button>
    <button  
        class="w-full btn_add-new-author px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Add new author
    </button>
        <button  
        class="btn_close-add w-full px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Cancel
    </button>
</form>
</form>
    <form action="" method="POST" class="form_add-new-author space-y-4 bg-green-800 rounded-md p-5 hidden">
        <input type="hidden" id="hidden" name="hidden" value="new_author">
        <div>
            <label for="author" class="block text-sm font-medium ">name :</label>
            <input 
            type="text" 
            id="new-auth" 
            name="new-auth" 
            required 
            class="w-full px-4 py-2 mt-2 outline-none  bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500 "
            />
        </div>
        <div>
            <label for="author" class="block text-sm font-medium ">email :</label>
            <input 
            type="email" 
            id="new-email" 
            name="new-email" 
            required 
            class="w-full px-4 py-2 mt-2 outline-none  bg-green-950 border rounded-md focus:ring-2 focus:ring-green-500 "
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
<form action="" method="POST" class="form_delete-package space-y-4 bg-green-800 rounded-md p-5 hidden">
    <input type="hidden" name="hidden" id="hidden" value="delete_package">
<button type="submit" 
        class="w-full px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Delete this package
    </button>

        <button  
        class="btn_close-add w-full px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Cancel
    </button>
</form>
</div>
<?php require "views/partials/footer.php"?>        
