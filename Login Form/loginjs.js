
function otherpage()
{
    var un= document.forms["register"]["Uname"].value;
    var pw= document.forms["register"]["Pass"].value;
    var em= document.forms["register"]["email"].value;
    if (un=="ammar" && pw== "123" && em == "ammar@gmail.com")
    {
        window.location.href="htmlproject.html";

    }
    else
    {
        alert("This username or email must be already taken");
    }
} 
function loginpage()
{
    window.location.href="login2.html";

}
