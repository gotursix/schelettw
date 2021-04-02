//INSTRUCTION PAGE EXAMPLE
let dificulty = 0;
count = 0;
let correct_answer = document.getElementById("correct-answer");
let wrong_answer1 = document.getElementById("wrong-answer1");
let wrong_answer2 = document.getElementById("wrong-answer2");
let wrong_answer3 = document.getElementById("wrong-answer3");
let diff_buttons = document.getElementById("diff-buttons");

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

document.getElementById("easy").addEventListener("click", resetDiff)
document.getElementById("medium").addEventListener("click", changeDiff);
document.getElementById("hard").addEventListener("click", changeDiff);

//if the difficulty is not set we want to display a pop-out
document.querySelectorAll(".buttonPurple").forEach(item => {
    count++;
    item.addEventListener("click", diffNotSelected =>{
        if (count<=4)
        {
            const modal = document.querySelector(item.dataset.modalTarget)
            openModal(modal,overlay);
        }
        if (dificulty === 0){
            popUpHandler();
        }

    })
});

function popUpHandler(){
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
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1);
        wrong_answer2.addEventListener("click", wrongAsnwer2);
        wrong_answer3.addEventListener("click", wrongAsnwer3);
    }
    else  {
        console.log(dificulty);
        correct_answer.addEventListener("click", correctAnswer);
        wrong_answer1.addEventListener("click", wrongAsnwer1_hard);
        wrong_answer2.addEventListener("click", wrongAsnwer2_hard);
        wrong_answer3.addEventListener("click", wrongAsnwer3_hard);
    }
}

function changeDiff(){
    dificulty = 2;
    diff_buttons.remove();
    document.querySelectorAll('[data-remove]').forEach(item => item.remove());

    //removing all the event listeners that I currenlty have on the buttons
    correct_answer.replaceWith(correct_answer.cloneNode(true));
    wrong_answer1.replaceWith(wrong_answer1.cloneNode(true));
    wrong_answer2.replaceWith(wrong_answer2.cloneNode(true));
    wrong_answer3.replaceWith(wrong_answer3.cloneNode(true));


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