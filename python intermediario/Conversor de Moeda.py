import requests

def obter_taxa_cambio(api_key, base, moeda_destino):
    
    url = f"https://v6.exchangerate-api.com/v6/{api_key}/latest/{base}"
    
    
    resposta = requests.get(url)
    
    
    if resposta.status_code == 200:
        dados = resposta.json()
        
       
        if moeda_destino in dados['conversion_rates']:
            taxa = dados['conversion_rates'][moeda_destino]
            return taxa
        else:
            print("Moeda de destino não encontrada.")
            return None
    else:
        print(f"Erro ao acessar a API: {resposta.status_code}")
        return None

def converter_moeda(api_key, valor, base, moeda_destino):
    taxa = obter_taxa_cambio(api_key, base, moeda_destino)
    
    if taxa:
        valor_convertido = valor * taxa
        print(f"{valor} {base} é igual a {valor_convertido:.2f} {moeda_destino}.")
    else:
        print("Conversão falhou.")

def main():
   
    api_key = "SUA_CHAVE_API"
    
    print("Bem-vindo ao conversor de moedas!")
    
   
    valor = float(input("Digite o valor que você deseja converter: "))
    base = input("Digite a moeda de origem (ex: USD, BRL, EUR): ").upper()
    moeda_destino = input("Digite a moeda de destino (ex: USD, BRL, EUR): ").upper()
    
    
    converter_moeda(api_key, valor, base, moeda_destino)

if __name__ == "__main__":
    main()
