//INSTRUCTION PAGE EXAMPLE

count = 0;
let correct_answer = document.getElementById("correct-answer");
let wrong_answer1 = document.getElementById("wrong-answer1");
let wrong_answer2 = document.getElementById("wrong-answer2");
let wrong_answer3 = document.getElementById("wrong-answer3");

let diff_buttons = document.getElementById("diff-buttons");

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')


if (dificulty === 0){
    resetDiff();
}else{
    changeDiff()
}

function changeHandlers(){
    if (dificulty === 1){
        correct_answer.addEventListener("click", correctAnswer);
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1);
        wrong_answer2.addEventListener("click", wrongAsnwer2);
        wrong_answer3.addEventListener("click", wrongAsnwer3);
    }
    else  {
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1_hard);
        wrong_answer2.addEventListener("click", wrongAsnwer2_hard);
        wrong_answer3.addEventListener("click", wrongAsnwer3_hard);
    }
}

function changeDiff(){
    dificulty = 2;
    changeHandlers();

}
function resetDiff(){
    dificulty = 1;
    changeHandlers();
}

function correctHelper(){
    correct_answer.classList.remove("buttonPurple");
    correct_answer.classList.add("buttonGreen");
}
function correctAnswer(){
    correctHelper();
    wrong_answer1.classList.remove("buttonPurple");
    wrong_answer2.classList.remove("buttonPurple");
    wrong_answer3.classList.remove("buttonPurple");
    wrong_answer1.classList.add("buttonRed");
    wrong_answer2.classList.add("buttonRed");
    wrong_answer3.classList.add("buttonRed");

}
function wrongAsnwer1(){
    wrong_answer1.classList.remove("buttonPurple");
    wrong_answer1.classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer2(){
    wrong_answer2.classList.remove("buttonPurple");
    wrong_answer2.classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer3(){
    wrong_answer3.classList.remove("buttonPurple");
    wrong_answer3.classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer1_hard(){
    document.getElementById("wrong-answer1").classList.remove("buttonPurple");
    document.getElementById("wrong-answer1").classList.add("buttonRed");
}
function wrongAsnwer2_hard(){
    wrong_answer2.classList.remove("buttonPurple");
    wrong_answer2.classList.add("buttonRed");
}
function wrongAsnwer3_hard(){
    wrong_answer3.classList.remove("buttonPurple");
    wrong_answer3.classList.add("buttonRed");
}



function openModal(modal,overlay) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal,overlay) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}