const addExpenseButton = document.getElementById('add-expense');
const resetButton = document.getElementById('reset-expenses');
const expenseList = document.getElementById('expense-list').getElementsByTagName('ul')[0];
const categoryInput = document.getElementById('category');
const amountInput = document.getElementById('amount');
const expenseChartCanvas = document.getElementById('expenseChart');

let expenses = [];

// Função para adicionar a despesa
const addExpense = () => {
  const category = categoryInput.value.trim();
  const amount = parseFloat(amountInput.value.trim());

  if (category && !isNaN(amount) && amount > 0) {
    expenses.push({ category, amount });
    updateExpenseList();
    updateChart();
    categoryInput.value = '';
    amountInput.value = '';
  } else {
    alert('Por favor, preencha os campos corretamente.');
  }
};

// Função para atualizar a lista de despesas
const updateExpenseList = () => {
  expenseList.innerHTML = '';

  expenses.forEach((expense, index) => {
    const listItem = document.createElement('li');
    listItem.textContent = `${expense.category}: R$ ${expense.amount.toFixed(2)}`;
    expenseList.appendChild(listItem);
  });
};

// Função para atualizar o gráfico
const updateChart = () => {
  const categories = [];
  const amounts = [];

  expenses.forEach(expense => {
    if (!categories.includes(expense.category)) {
      categories.push(expense.category);
      amounts.push(expense.amount);
    } else {
      const index = categories.indexOf(expense.category);
      amounts[index] += expense.amount;
    }
  });

  const chartData = {
    labels: categories,
    datasets: [{
      label: 'Despesas por Categoria',
      data: amounts,
      backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d', '#17a2b8'],
      borderColor: '#fff',
      borderWidth: 1
    }]
  };

  const chartOptions = {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      tooltip: {
        callbacks: {
          label: function(tooltipItem) {
            return 'R$ ' + tooltipItem.raw.toFixed(2);
          }
        }
      }
    },
    scales: {
      y: {
        beginAtZero: true
      }
    }
  };

  new Chart(expenseChartCanvas, {
    type: 'pie',
    data: chartData,
    options: chartOptions
  });
};

// Função para reiniciar as despesas
const resetExpenses = () => {
  expenses = [];
  updateExpenseList();
  updateChart();
};

// Adicionar eventos
addExpenseButton.addEventListener('click', addExpense);
resetButton.addEventListener('click', resetExpenses);

// Inicializar o gráfico
updateChart();
