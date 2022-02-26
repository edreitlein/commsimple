function check(){
    var firstInput = document.getElementById("pass1").value;
    var secondInput = document.getElementById("pass2").value;

    if (firstInput === secondInput) {
        // do something here if inputs are same
        // alert("passwords are the same?");
        document.getElementById("createAccount").submit();

    } else {
        alert("not the same");
        // do something if the first input is less than the second
    }
}