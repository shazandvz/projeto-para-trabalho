const board = document.getElementById('board');
const cells = document.querySelectorAll('.cell');
const gameStatus = document.getElementById('game-status');
const resetButton = document.getElementById('reset-button');

let currentPlayer = 'X';
let gameBoard = ['', '', '', '', '', '', '', '', ''];
let gameActive = true;

// Função para verificar se há um vencedor
const checkWinner = () => {
  const winPatterns = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], // linhas
    [0, 3, 6], [1, 4, 7], [2, 5, 8], // colunas
    [0, 4, 8], [2, 4, 6]             // diagonais
  ];

  for (let pattern of winPatterns) {
    const [a, b, c] = pattern;
    if (gameBoard[a] && gameBoard[a] === gameBoard[b] && gameBoard[a] === gameBoard[c]) {
      gameStatus.textContent = `Jogador ${currentPlayer} venceu!`;
      gameActive = false;
      return;
    }
  }

  // Verificar se o jogo acabou em empate
  if (!gameBoard.includes('')) {
    gameStatus.textContent = 'Empate!';
    gameActive = false;
  }
};

// Função para alternar o jogador
const switchPlayer = () => {
  currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
  gameStatus.textContent = `Jogador ${currentPlayer}, é a sua vez!`;
};

// Função para tratar o clique na célula
const handleCellClick = (e) => {
  const index = e.target.dataset.index;

  if (gameBoard[index] !== '' || !gameActive) return;

  gameBoard[index] = currentPlayer;
  e.target.textContent = currentPlayer;

  checkWinner();
  if (gameActive) switchPlayer();
};

// Função para reiniciar o jogo
const resetGame = () => {
  gameActive = true;
  currentPlayer = 'X';
  gameBoard = ['', '', '', '', '', '', '', '', ''];
  gameStatus.textContent = `Jogador ${currentPlayer}, é a sua vez!`;

  cells.forEach(cell => cell.textContent = '');
};

// Adicionar os ouvintes de evento
cells.forEach(cell => cell.addEventListener('click', handleCellClick));
resetButton.addEventListener('click', resetGame);
