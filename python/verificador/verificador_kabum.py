import requests
from bs4 import BeautifulSoup
from .verificador_base import VerificadorProdutos

class VerificadorProdutoKabum(VerificadorProdutos):
    def verificar_disponibilidade_produto(self, url):
        response = requests.get(url)
        soup = BeautifulSoup(response.content, 'html.parser')

        produto_indisponivel_svg = soup.select_one('svg.IconUnavailable')
        produto_indisponivel_texto = soup.select_one('div#main-content div.sc-4e2d4867-0.kfefWY div.sc-4e2d4867-1.dPPiZL span.sc-4e2d4867-2.ccbyaK')

        if produto_indisponivel_svg or (produto_indisponivel_texto and "Ops... Produto indisponível!" in produto_indisponivel_texto.get_text(strip=True)):
            return False

        return True

    def coletar_dados_produto_pagina(self, url):
        response = requests.get(url)
        soup = BeautifulSoup(response.content, 'html.parser')

        try:
            nome = soup.select_one('div.col-purchase h1').get_text(strip=True)
            preco_element = soup.select_one('h4.finalPrice')
            preco = float(preco_element.get_text(strip=True).replace('R$', '').replace('.', '').replace(',', '.').strip()) if preco_element else None
            return {'nome': nome, 'preco': preco}
        except Exception as e:
            print(f"Erro ao coletar dados da página {url}: {e}")
            return None

    def filtrar_urls(self, produtos):
        return [produto for produto in produtos if produto[3].startswith('https://www.kabum.com.br')]