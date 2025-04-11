function calculate() {
    const num1 = document.getElementById('num1').value;
    const num2 = document.getElementById('num2').value;
    const operation = document.getElementById('operation').value;
  
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "calculate.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById('result').innerHTML = "Result: " + xhr.responseText;
      }
    };
  
    xhr.send(`num1=${num1}&num2=${num2}&operation=${operation}`);
  }
  