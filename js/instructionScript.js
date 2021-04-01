//INSTRUCTION PAGE EXAMPLE
let dificulty = 0;
let correct_answer = document.getElementById("correct-answer");
let wrong_answer1 = document.getElementById("wrong-answer1");
let wrong_asnwer2 = document.getElementById("wrong-answer2");
let wrong_asnwer3 = document.getElementById("wrong-answer3");
let diff_buttons = document.getElementById("diff-buttons");

document.getElementById("easy").addEventListener("click", resetDiff)
document.getElementById("medium").addEventListener("click", changeDiff);
document.getElementById("hard").addEventListener("click", changeDiff);

//if the difficulty is not set we want to display a pop-out
document.querySelectorAll(".buttonPurple").forEach(item => {
    item.addEventListener("click", diffNotSelected =>{
        if (dificulty === 0){
            popUpHandler();
        }
    })
});

function popUpHandler(){
    const openModalButtons = document.querySelectorAll('[data-modal-target]')
    const closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModal(modal,overlay)
        })
    })

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active')
        modals.forEach(modal => {
            closeModal(modal,overlay)
        })
    })

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModal(modal,overlay)
        })
    })
}
function changeHandlers(){
    if (dificulty === 1){
        console.log("difficulty is 1");
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1);
        wrong_asnwer2.addEventListener("click", wrongAsnwer2);
        wrong_asnwer3.addEventListener("click", wrongAsnwer3);
    }
    else  {
        console.log(dificulty);
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1_hard);
        wrong_asnwer2.addEventListener("click", wrongAsnwer2_hard);
        wrong_asnwer3.addEventListener("click", wrongAsnwer3_hard);
    }
}

function changeDiff(){
    dificulty = 2;
    diff_buttons.remove();
    document.querySelectorAll('[data-remove]').forEach(item => item.remove());
    changeHandlers();
    document.getElementById('modal').classList.remove('active')
    document.getElementById('overlay').classList.remove('active')
}
function resetDiff(){
    dificulty = 1;
    diff_buttons.remove();
    document.querySelectorAll('[data-remove]').forEach(item => item.remove());
    changeHandlers();

    document.getElementById('modal').classList.remove('active')
    document.getElementById('overlay').classList.remove('active')
}
function correctHelper(){
    correct_answer.classList.remove("buttonPurple");
    correct_answer.classList.add("buttonGreen");
}
function correctAnswer(){
    correctHelper();
    wrong_answer1.classList.remove("buttonPurple");
    wrong_asnwer2.classList.remove("buttonPurple");
    wrong_asnwer3.classList.remove("buttonPurple");
    wrong_answer1.classList.add("buttonRed");
    wrong_asnwer2.classList.add("buttonRed");
    wrong_asnwer3.classList.add("buttonRed");

}
function wrongAsnwer1(){
    wrong_answer1.classList.remove("buttonPurple");
    wrong_answer1.classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer2(){
    wrong_asnwer2.classList.remove("buttonPurple");
    wrong_asnwer2.classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer3(){
    wrong_asnwer3.classList.remove("buttonPurple");
    wrong_asnwer3.classList.add("buttonRed");
    correctHelper();
}
function wrongAsnwer1_hard(){
    document.getElementById("wrong-answer1").classList.remove("buttonPurple");
    document.getElementById("wrong-answer1").classList.add("buttonRed");
}
function wrongAsnwer2_hard(){
    wrong_asnwer2.classList.remove("buttonPurple");
    wrong_asnwer2.classList.add("buttonRed");
}
function wrongAsnwer3_hard(){
    wrong_asnwer3.classList.remove("buttonPurple");
    wrong_asnwer3.classList.add("buttonRed");
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