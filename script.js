const packagesCnt = document.querySelector('.packages-cnt');
const searchedPackages = document.querySelector('.searched-package');
const btnAddPackage = document.querySelector('.btn_add-package');
const btnAddVersion = document.querySelector('.btn_add-version');
const btnAddAuthor = document.querySelector('.btn_add-author');
const btnAddNewAuthor = document.querySelector('.btn_add-new-author');
const formAdd = document.querySelector('.form_add');
const formAddAuthor = document.querySelector('.form_add-author');
const formAddNewAuthor = document.querySelector('.form_add-new-author');
const btnDeletePackage = document.querySelector('.btn_delete-package');
const formDeletePackage = document.querySelector('.form_delete-package');
const btnCloseAdd = document.querySelectorAll('.btn_close-add');



packagesCnt?.addEventListener('click',(e)=>{
    if(!e.target.closest('.package-item')) return;
    window.location = `package?id=${e.target.closest('.package-item').dataset.id}`;
})
searchedPackages?.addEventListener('click',(e)=>{
    if(!e.target.closest('.package-item')) return;
    window.location = `package?id=${e.target.closest('.package-item').dataset.id}`;
})

btnAddPackage?.addEventListener('click',e=>{
    formAdd.classList.remove('hidden');
})
btnAddAuthor?.addEventListener('click',e=>{

    formAdd.classList.add('hidden');
    formAddAuthor.classList.remove('hidden');
})

btnAddVersion?.addEventListener('click',e=>{
    formAddAuthor.classList.add('hidden')
    formAdd.classList.remove('hidden');
})

btnCloseAdd?.forEach(el=>el?.addEventListener('click',(e)=>{
    e.preventDefault();
    console.log("rrr");
    formAdd.classList.add('hidden');
    formAddAuthor.classList.add('hidden');
    formAddNewAuthor.classList.add('hidden');
    formDeletePackage.classList.add('hidden');
}))

btnAddNewAuthor?.addEventListener('click',(e)=>{
    e.preventDefault();
    formAddAuthor.classList.add('hidden');
    formAddNewAuthor.classList.remove('hidden');
})
btnDeletePackage?.addEventListener('click',e=>{
    formDeletePackage.classList.remove('hidden');
})