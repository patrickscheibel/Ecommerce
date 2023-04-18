import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';

function App() {
  const [products, setProducts] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [productsPerPage, setProductsPerPage] = useState();

  useEffect(() => {
    axios.get('http://127.0.0.1:8000/api/product_index/european')
      .then(res => {
        setProducts(res.data);
      })
      .catch(err => {
        console.log(err);
      });
  }, []);

  // Obter a lista de produtos para exibir na página atual
  const indexOfLastProduct = currentPage * productsPerPage;
  const indexOfFirstProduct = indexOfLastProduct - productsPerPage;
  const currentProducts = products.slice(indexOfFirstProduct, indexOfLastProduct);

  // Mudar de página
  const paginate = pageNumber => setCurrentPage(pageNumber);

  const handleViewProducts = () => {
    // Redirecionar para a página de produtos
    window.location.href = '/produtos';
  }

  const renderAdditionalInfo = (product) => {
    if (product.additionalInfo) {
      return product.additionalInfo.map(info => (
        <p key={info}>{info}</p>
      ))
    }
    return null;
  }

  return (
    <div>
      <header>
        <nav>
          <ul>
            <li><button onClick={handleViewProducts}>Home</button></li>
            <li><button onClick={handleViewProducts}>Produtos</button></li>
            <li><button onClick={handleViewProducts}>Carrinho</button></li>
          </ul>
        </nav>
        <div className="banner">
          <h1>Bem-vindo à nossa loja virtual</h1>
          <p>Aqui você encontra os melhores produtos pelo menor preço.</p>
          <button onClick={handleViewProducts}>Ver produtos</button>
        </div>
      </header>
      <main>
        <h2>Produtos</h2>
        <div className="product-list">
          {currentProducts.map(product => (
            <div key={product.id} className="product">
              <div className="product-image">
                <img src={product.gallery} alt="Imagem" />
              </div>
              <h3>{product.name}</h3>
              <p>{product.price}</p>
              {renderAdditionalInfo(product)}
              <button>Adicionar ao carrinho</button>
            </div>
          ))}
        </div>
        <div className="pagination">
          {Array.from({ length: Math.ceil(products.length / productsPerPage) }, (_, i) => i + 1).map(pageNumber => (
            <button key={pageNumber} onClick={() => paginate(pageNumber)}>{pageNumber}</button>
          ))}
        </div>
      </main>
      <footer>
        <p>Todos os direitos reservados - Ecommerce 2023</p>
      </footer>
    </div>
  );
}

export default App;