const searchInput = document.getElementById('search-input');
const pokemonInfoDiv = document.getElementById('pokemon-info');

async function searchPokemon() {
  const searchTerm = searchInput.value.toLowerCase().trim();

  if (!searchTerm) {
    alert('Por favor, digite o nome ou número do Pokémon.');
    return;
  }

  try {
    const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${searchTerm}`);
    
    if (!response.ok) {
      throw new Error('Pokémon não encontrado.');
    }

    const pokemonData = await response.json();
    
    const pokemonDetails = `
      <h3>${pokemonData.name.charAt(0).toUpperCase() + pokemonData.name.slice(1)}</h3>
      <img src="${pokemonData.sprites.front_default}" alt="${pokemonData.name}" />
      <p><strong>ID:</strong> ${pokemonData.id}</p>
      <p><strong>Altura:</strong> ${pokemonData.height / 10} metros</p>
      <p><strong>Peso:</strong> ${pokemonData.weight / 10} kg</p>
      <p><strong>Tipos:</strong> ${pokemonData.types.map(type => type.type.name.charAt(0).toUpperCase() + type.type.name.slice(1)).join(', ')}</p>
    `;

    pokemonInfoDiv.innerHTML = pokemonDetails;
  } catch (error) {
    pokemonInfoDiv.innerHTML = `<p style="color: red;">Erro: ${error.message}</p>`;
  }
}
