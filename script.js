const productList = document.getElementById('product-list');
const searchInput = document.getElementById('search');

let produtos = [];

fetch('buscar.php')
  .then(res => res.json())
  .then(data => {
    produtos = data;
    renderProducts(produtos);
  });

function renderProducts(list) {
  productList.innerHTML = '';

  list.forEach((item, idx) => {
    const div = document.createElement('div');
    div.className = 'product';
    div.id = `produto-${idx}`;

    const imagem = item.imagem ? item.imagem : 'uploads/placeholder.png';

    div.innerHTML = `
      <img src="${imagem}" alt="${item.produto}" />
      <div class="product-info">
        <h3>${item.produto}</h3>
        <p><strong>Categoria:</strong> ${item.categoria}</p>
        <p>${item.descricao}</p>
        <p><strong>Contato:</strong> ${item.nome} - ${item.telefone}</p>
        ${item.link ? `<p><a href="${item.link}" target="_blank">Site/Rede Social</a></p>` : ''}
      </div>
    `;

    productList.appendChild(div);
  });
}

searchInput.addEventListener('input', () => {
  const term = searchInput.value.toLowerCase();

  const encontrado = produtos.findIndex(p =>
    p.nome.toLowerCase().includes(term) ||
    p.email.toLowerCase().includes(term) ||
    p.telefone.toLowerCase().includes(term) ||
    p.categoria.toLowerCase().includes(term) ||
    p.produto.toLowerCase().includes(term) ||
    p.descricao.toLowerCase().includes(term)
  );

  if (encontrado !== -1) {
    renderProducts(produtos);
    const el = document.getElementById(`produto-${encontrado}`);
    if (el) {
      el.scrollIntoView({ behavior: 'smooth', block: 'center' });
      el.style.backgroundColor = '#ffff99';
      setTimeout(() => el.style.backgroundColor = 'transparent', 3000);
    }
  }
});