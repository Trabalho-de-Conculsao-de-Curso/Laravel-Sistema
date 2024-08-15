import sqlite3
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

# Inicializar o WebDriver do Chrome
service = Service()
options = webdriver.ChromeOptions()
driver = webdriver.Chrome(service=service, options=options)

# Função para coletar produtos de uma página
def coletar_produtos_da_pagina(driver):
    produtos = driver.find_elements(By.CSS_SELECTOR, 'article.product')
    resultados = []
    for produto in produtos:
        try:
            # Nome do produto
            nome = produto.find_element(By.CSS_SELECTOR, 'h3.tit').text

            # Preço à vista
            preco_element = produto.find_element(By.CSS_SELECTOR, 'span.h1.text-success')
            preco_texto = preco_element.text
            preco = float(preco_texto.replace('R$', '').replace('.', '').replace(',', '.').strip())
            moeda = 'BRL'

            # Link do produto
            link = produto.find_element(By.CSS_SELECTOR, 'a').get_attribute('href')

            resultados.append({
                'nome': nome,
                'preco': preco,
                'moeda': moeda,
                'link': link
            })
        except Exception as e:
            print("Erro ao processar um produto:", e)
    return resultados

# Função para salvar os produtos, preços e links no banco
def salvar_produtos_no_banco(produtos):
    # Conectar ao banco de dados SQLite
    conn = sqlite3.connect('../database/database.sqlite')
    cursor = conn.cursor()

    for produto in produtos:
        try:
            # Verificar se o link já existe na tabela loja_online
            cursor.execute('''
                SELECT id FROM loja_online WHERE urlLoja = ?
            ''', (produto['link'],))
            loja_online_result = cursor.fetchone()

            if loja_online_result:
                loja_online_id = loja_online_result[0]
            else:
                # Inserir o link na tabela 'loja_online' se não existir
                cursor.execute('''
                    INSERT INTO loja_online (urlLoja, created_at, updated_at)
                    VALUES (?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
                ''', (produto['link'],))
                loja_online_id = cursor.lastrowid  # Recuperar o ID da loja online inserida

            # Inserir o preço na tabela 'precos'
            cursor.execute('''
                INSERT INTO precos (valor, moeda, created_at, updated_at)
                VALUES (?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
            ''', (produto['preco'], produto['moeda']))
            preco_id = cursor.lastrowid  # Recuperar o ID do preço inserido

            # Inserir o produto na tabela 'produtos'
            cursor.execute('''
                INSERT INTO produtos (nome, preco_id, loja_online_id, created_at, updated_at)
                VALUES (?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
            ''', (produto['nome'], preco_id, loja_online_id))

            # Salvar as alterações
            conn.commit()
        except sqlite3.Error as e:
            print(f"Erro ao inserir o produto no banco de dados: {e}")
            conn.rollback()

    # Fechar a conexão
    conn.close()

# Função principal para processar todas as páginas de uma URL específica
def processar_paginas(url_base, max_paginas=1):
    pagina = 1
    todos_produtos = []

    while pagina <= max_paginas:
        url = f"{url_base}?page_number={pagina}"
        driver.get(url)

        # Aguardar o carregamento da página
        driver.implicitly_wait(10)

        # Coletar os produtos da página atual
        produtos_da_pagina = coletar_produtos_da_pagina(driver)

        # Verificar se há produtos na página
        if not produtos_da_pagina:
            break

        # Adicionar os produtos da página à lista total de produtos
        todos_produtos.extend(produtos_da_pagina)

        print(f"Página {pagina} processada para URL: {url_base}")

        # Avançar para a próxima página
        pagina += 1

        # Pequena pausa para evitar sobrecarga do servidor
        time.sleep(2)

    # Salvar todos os produtos coletados no banco de dados
    salvar_produtos_no_banco(todos_produtos)
    print(f"Total de produtos coletados e salvos para {url_base}: {len(todos_produtos)}")

# URLs das diferentes categorias que você quer processar
urls_para_processar = [
    "https://patoloco.com.br/produtos/placa-de-video",
   "https://patoloco.com.br/produtos/processadores",
   "https://patoloco.com.br/produtos/placas-mae",
   "https://patoloco.com.br/produtos/memorias",
   "https://patoloco.com.br/produtos/ssd",
   "https://patoloco.com.br/produtos/ssd-m2",
   "https://patoloco.com.br/produtos/coolers-e-watercoolers",
   "https://patoloco.com.br/produtos/fontes",
]

# Processar todas as URLs
for url in urls_para_processar:
    processar_paginas(url)

# Fechar o navegador
driver.quit()
