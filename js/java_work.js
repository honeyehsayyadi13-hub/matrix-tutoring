//when the page is scrolling, this will run
window.onscroll = function () { scrollFunction() };

//this will show or hide the navigationbar depending on the scroll position
/*once the user scrolls down a certain amount of pixels, 10 being the amount, the navigation bar will slide down for the user to see 
otherwise it will be hidden above the page */
function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-50px";
    }
}
//used for buttons and will play a sound
function playClickSound() {
    const sound = document.getElementById("clickSound");
    sound.play();
}

//when a form is submitted, a success sound will play when the button is clicked
function playSuccessSound(event) {
    event.preventDefault();//prevents form from going to next page before the sound plays
    const sound = document.getElementById('submitSound');
    const form = event.target.closest('form');//locates the form the button is related to

    sound.play();

    // submits the form after the sound is played
    setTimeout(() => {
        form.submit();
    }, 400);
}

//function that changes the current style sheet to the one the user selects
function changeTheme(theme) {
    document.getElementById("theme-style").href = theme;

    //special case for the dark mode as the icon images must change to be presentable in a dark theme
    if (theme === "css/dark.css") {
        document.getElementById("eng").src = "img/dark/dark_stylus.svg";
        document.getElementById("stem").src = "img/dark/dark_stem.svg";
        document.getElementById("fr").src = "img/dark/dark_fr.svg";
        document.getElementById("book").src = "img/dark/dark_book.svg";
        document.getElementById("math").src = "img/dark/dark_superscript.svg";
        document.getElementById("code").src = "img/dark/dark_code.svg";

    } else {
        //otherwise it will be default white image
        document.getElementById("eng").src = "img/stylus.svg";
        document.getElementById("stem").src = "img/stem.svg";
        document.getElementById("fr").src = "img/fr.svg";
        document.getElementById("book").src = "img/book.svg";
        document.getElementById("math").src = "img/superscript.svg";
        document.getElementById("code").src = "img/code.svg";
    }
}