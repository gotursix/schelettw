//INSTRUCTION PAGE EXAMPLE
let dificulty = 1;
let correct_answer = document.getElementById("correct-answer");
let wrong_answer1 = document.getElementById("wrong-answer1");

document.getElementById("easy").addEventListener("click", resetDiff)
document.getElementById("medium").addEventListener("click", changeDiff);
document.getElementById("hard").addEventListener("click", changeDiff);


function changeHandlers(){
    if (dificulty === 1){
        console.log("difficulty is 1");
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1);
        document.getElementById("wrong-answer2").addEventListener("click", wrongAsnwer2);
        document.getElementById("wrong-answer3").addEventListener("click", wrongAsnwer3);
    }
    else  {
        console.log(dificulty);
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1_hard);
        document.getElementById("wrong-answer2").addEventListener("click", wrongAsnwer2_hard);
        document.getElementById("wrong-answer3").addEventListener("click", wrongAsnwer3_hard);
    }
}

function changeDiff(){
    dificulty = 2;
    changeHandlers();
}
function correctHelper(){
    correct_answer.classList.add("buttonGreen");
    correct_answer.classList.remove("buttonPurple");
}
function correctAnswer(){
    correctHelper();
    wrong_answer1.classList.remove("buttonPurple");
    document.getElementById("wrong-answer2").classList.remove("buttonPurple");
    document.getElementById("wrong-answer3").classList.remove("buttonPurple");
    wrong_answer1.classList.add("buttonRed");
    document.getElementById("wrong-answer2").classList.add("buttonRed");
    document.getElementById("wrong-answer3").classList.add("buttonRed");

}
function wrongAsnwer1(){
    wrong_answer1.classList.remove("buttonPurple");
    wrong_answer1.classList.add("buttonRed");
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
    dificulty = 1;
    changeHandlers();
}