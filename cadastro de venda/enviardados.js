function enviarDados(form, url, callback) {
    const dados = new FormData(form);
  
    fetch(url, {
      method: 'POST',
      body: dados
    })
    .then(res => res.text())
    .then(response => {
      alert(response);
      if (callback) callback();
    })
    .catch(err => {
      console.error('Erro:', err);
      alert('Erro ao enviar dados!');
    });
  
    return false;
  }
  