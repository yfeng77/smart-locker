const form = document.getElementById("code");
const error = document.getElementById("error");

function formInput(str) {

    var formStr = form.value;

    //hide error label
    error.style.display = 'none';

    //check if backspace
    if (str == "C") {

        form.value = form.value.slice(0, -1);

    } else {

        //check length before adding number
        if (formStr.length < 6) {
            form.value = form.value + str;
        }
    }
}//end formInput


