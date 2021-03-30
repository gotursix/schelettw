//INSTRUCTION PAGE EXAMPLE
var dificulty = 1;
window.onload=function (){

    dificulty = document.getElementById("easy").addEventListener("click", resetDiff)
    dificulty = document.getElementById("medium").addEventListener("click", changeDiff);
    dificulty= document.getElementById("hard").addEventListener("click", changeDiff);

    if (dificulty == 1){
        document.getElementById("correct-answer").addEventListener("click", correctAnswer);
        document.getElementById("wrong-answer1").addEventListener("click", wrongAsnwer1);
        document.getElementById("wrong-answer2").addEventListener("click", wrongAsnwer2);
        document.getElementById("wrong-answer3").addEventListener("click", wrongAsnwer3);
    }
    else  {
        console.log(dificulty);
        document.getElementById("correct-answer").addEventListener("click", correctAnswer);
        document.getElementById("wrong-answer1").addEventListener("click", wrongAsnwer1_hard);
        document.getElementById("wrong-answer2").addEventListener("click", wrongAsnwer2_hard);
        document.getElementById("wrong-answer3").addEventListener("click", wrongAsnwer3_hard);
    }



}
function changeDiff(){
    this.dificulty++;
    return dificulty;
}
function correctHelper(){
    document.getElementById("correct-answer").classList.add("buttonGreen");
    document.getElementById("correct-answer").classList.remove("buttonPurple");
}
function correctAnswer(){
    correctHelper();
    document.getElementById("wrong-answer1").classList.remove("buttonPurple");
    document.getElementById("wrong-answer2").classList.remove("buttonPurple");
    document.getElementById("wrong-answer3").classList.remove("buttonPurple");
    document.getElementById("wrong-answer1").classList.add("buttonRed");
    document.getElementById("wrong-answer2").classList.add("buttonRed");
    document.getElementById("wrong-answer3").classList.add("buttonRed");

}
function wrongAsnwer1(){
    document.getElementById("wrong-answer1").classList.remove("buttonPurple");
    document.getElementById("wrong-answer1").classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer2(){
    document.getElementById("wrong-answer2").classList.remove("buttonPurple");
    document.getElementById("wrong-answer2").classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer3(){
    document.getElementById("wrong-answer3").classList.remove("buttonPurple");
    document.getElementById("wrong-answer3").classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer1_hard(){
    document.getElementById("wrong-answer1").classList.remove("buttonPurple");
    document.getElementById("wrong-answer1").classList.add("buttonRed");
}
function wrongAsnwer2_hard(){
    document.getElementById("wrong-answer2").classList.remove("buttonPurple");
    document.getElementById("wrong-answer2").classList.add("buttonRed");
}
function wrongAsnwer3_hard(){
    document.getElementById("wrong-answer3").classList.remove("buttonPurple");
    document.getElementById("wrong-answer3").classList.add("buttonRed");
}

function resetDiff(){
    this.dificulty = 1;
}