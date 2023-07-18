const headerLinks = $("#header-links");
const headerSearchForm = $("#header-search-form");
const userOptions = $("#user-options");
const headerBars = $("#header-bars");
queEs = false;

$("#open-user-options").on("click", openUserOptions);
$("#header-bars").on("click", openHeaderMenu);
$("#header-ul-bars").on("click", openHeaderMenu);
$("#header-btns-search").on("click", openHeaderSearch);


function openHeaderSearch() {
    headerSearchForm.toggleClass("header-search-form-open");
    headerSearchForm.focus();
    headerSearchForm.select();
}
function openHeaderMenu() {
    if(queEs == false){
        $("#header-bars").html('<i class="fa-solid fa-x"></i>');
        queEs=true;
    }
    else{
        queEs=false;
        $("#header-bars").html('<i class="fa-solid fa-bars"></i>');
    }
    headerLinks.toggleClass("header-links-open");
}

function openUserOptions(){
    userOptions.toggleClass("user-options-open");
}
