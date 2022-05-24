const gradeTypes = new Array ("Dist.", "Merit", "Pass", "Fail");
const awardTypes = new Array ("MSc in Computing Science", "PG Diploma in Computing", "No award was achieved");


const updateTable = () => {
  const elAverageCell = document.querySelector(".average-mark");
  const elTotalCell = document.querySelector(".total-credits");
  const elGradeCells = document.querySelectorAll(".grade-value");
  const elMarkCells = document.querySelectorAll(".input-mark");
  
      if(creditTotal()!==0){
        if(parseInt(weightedAvgMark())){
          elAverageCell.textContent = 'Average Mark: '+ weightedAvgMark().toFixed(2);
          elTotalCell.textContent = 'Total Credits: ' + creditTotal();
        }else{
          elTotalCell.textContent = 'Total Credits: ' + creditTotal();
        }
      }
    
    
  for(let i=0; i < elMarkCells.length; i++){
    const mark = elMarkCells[i].value;
    if(parseInt(mark)){
      if(elMarkCells[i].value >= 70){
        elGradeCells[i].textContent = gradeTypes[0];
      }else if(elMarkCells[i].value >= 60){
        elGradeCells[i].textContent = gradeTypes[1];
      }else if(elMarkCells[i].value >= 50){
        elGradeCells[i].textContent = gradeTypes[2];
      }else{
        elGradeCells[i].textContent = gradeTypes[3];
      }
      $(elGradeCells[i]).css({
        "font-weight": "bolder",
        "font-style": "italic"
      })
    }else{
      elGradeCells[i].textContent = "";
    }
  }
}


const generateAward = () => {
  const elAwardPara = document.querySelector(".award-text");
  const elMarkCells = document.querySelectorAll(".input-mark");
  let awardType = "", awardGrade = "";
  let distNum = 0, meritNum = 0, passNum = 0, failNum = 0;
  for (let i = 0; i < elMarkCells.length; i++) {
    const mark = elMarkCells[i].value;
    if(parseInt(mark)){
      if(mark >= 70){
        distNum++;
      }else if(mark >= 60){
        meritNum++;
      }else if(mark>=50){
        passNum++;
      }else{
        failNum++;
      }
    }
  }
  if(earnedCredits() === 180){
    awardType = awardTypes[0];
  }else if(earnedCredits() >= 120){
    awardType = awardTypes[1];
  }else{
    awardType = awardTypes[2]
  }
  if(weightedAvgMark() >= 70 && parseInt(elMarkCells[elMarkCells.length-1].value) >= 68){
    awardGrade = "Distinction";
  }else if(weightedAvgMark() >= 60 && parseInt(elMarkCells[elMarkCells.length-1].value) >= 58){
    awardGrade = gradeTypes[1];
  }else if(weightedAvgMark() >= 50){
    awardGrade = gradeTypes[2];
  }else{
    awardGrade = gradeTypes[3];
  }
  const awardString = `Having earned ${earnedCredits()} credits, you shall be awarded a ${awardType}.`;
  const failString = `Unfortunately you did not qualify for an award.\nYou achieved ${distNum} Distinction(s), ${meritNum} Merit(s), ${passNum} Pass(es), ${failNum} Fail(s).`;
  const gradeString = `\nWith a final average mark of ${weightedAvgMark().toFixed(2)} and a dissertation mark of ${elMarkCells[elMarkCells.length-1].value}, the classification of your award is a ${awardGrade}.`;
  const breakdown = `\nYou achieved ${distNum} Distinction(s), ${meritNum} Merit(s), ${passNum} Pass(es), ${failNum} Fail(s).`

  if(weightedAvgMark() < 50 || earnedCredits() <120){
    elAwardPara.textContent = (failString);
  }else if(awardType === awardTypes[0]){
    elAwardPara.textContent = (awardString + gradeString + breakdown);
  }else{
    elAwardPara.textContent = (awardString + breakdown);
  }
  
  $(elAwardPara).css({
    'background-color': '#FFFFF0',
    'color': 'Black',
    'border': '1px solid black',
  })
}


const creditTotal = () =>{
  const elCreditCells = document.querySelectorAll(".credit-value");
  let creditTotal = 0;
  for(let i = 0; i < elCreditCells.length; i++){
    if(parseInt(elCreditCells[i].value)){
      creditTotal+= parseInt(elCreditCells[i].value);
    }
  }
  return creditTotal;
}

const weightedAvgMark = () =>{
  const elMarkCells = document.querySelectorAll(".input-mark");
  const elCreditCells = document.querySelectorAll(".credit-value");
  let avgMark = 0;
  for (let i = 0; i < elMarkCells.length; i++) {
    const mark = elMarkCells[i].value;
    const credit = elCreditCells[i].value;
    if(parseInt(mark) && parseInt(credit)){
      avgMark += mark*credit;
    }
  }
  avgMark = avgMark/creditTotal();
  return avgMark;
}

const earnedCredits = () =>{
  const elMarkCells = document.querySelectorAll(".input-mark");
  const elCreditCells = document.querySelectorAll(".credit-value");
  let earnedCredits = 0;
  for (let i = 0; i < elMarkCells.length; i++) {
    const mark = elMarkCells[i].value;
    const credit = elCreditCells[i].value;
    if(parseInt(mark) && parseInt(credit) && elMarkCells[i].value >=50){
      earnedCredits += parseInt(credit);
    }
  }
  return earnedCredits;
}
//Saving user input
const getModuleCodes = () => {
  let modIDs = document.querySelectorAll(".module-code");
  modIDs = Array.from(modIDs);
  return modIDs;
}

const getCredits = () => {
  let credits = document.querySelectorAll(".credit-value");
  credits = Array.from(credits);
  return credits;
}

const getMarks = () => {
  let marks = document.querySelectorAll(".input-mark");
  marks = Array.from(marks);
  return marks;
}
//jquery to send the js arrays to php.
const moveData = () => {
  $.ajax({
    type: "POST",
    url: "includes/results.inc.php",
    data: "mod_ids=" + getModuleCodes()
});
  $.ajax({
    type: "POST",
    url: "includes/results.inc.php",
    data: "credits=" + getCredits()
  });
  $.ajax({
    type: "POST",
    url: "includes/results.inc.php",
    data: "marks=" + getMarks()
  });
}