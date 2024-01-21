let availableKeywords = [
'please',
'fail',
'computer',
'lab',
'no',];

const resultBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
let result = [];
let input = inputBox.value;
if(input.length){
result = availableKeywords.filter((keyword)=>{
return keyword.toLowerCase().include(input.toLowerCase());
});
console.log(result);
}
display(result);
}


function display(result){
const content = result.map((list)=>{
return "<li onclick=selectInput(this)>" + list + "</li>";});
resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
}

function selectInput(list){
inputBox.value = list.innerHTML;
resultBox.innerHTML = '';}