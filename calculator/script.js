const display = document.querySelector('.display');
const buttons = document.querySelectorAll('.buttons button');

let currentInput = '';
let firstOperand = null;
let operator = null;

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const value = button.textContent;

        if (!isNaN(value) || value === '.') {
            currentInput += value;
            display.textContent = currentInput;
        } else if (value === 'C') {
            currentInput = '';
            firstOperand = null;
            operator = null;
            display.textContent = '0';
        } else if (value === '=') {
            if (firstOperand !== null && operator !== null) {
                const secondOperand = parseFloat(currentInput);
                let result;

                switch (operator) {
                    case '+':
                        result = firstOperand + secondOperand;
                        break;
                    case '-':
                        result = firstOperand - secondOperand;
                        break;
                    case '*':
                        result = firstOperand * secondOperand;
                        break;
                    case '/':
                        result = firstOperand / secondOperand;
                        break;
                }

                display.textContent = result;
                currentInput = result.toString();
                firstOperand = null;
                operator = null;
            }
        } else if (['+', '-', '*', '/'].includes(value)) {
            if (currentInput !== '') {
                firstOperand = parseFloat(currentInput);
                operator = value;
                currentInput = '';
            }
        }
    });
});