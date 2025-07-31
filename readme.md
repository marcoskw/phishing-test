
## Simulação de Phishing

Phishing é uma técnica de fraude digital usada por cibercriminosos para enganar pessoas e obter informações sensíveis, como senhas, dados bancários, números de cartão de crédito ou credenciais de acesso.

Geralmente, o ataque acontece por meio de mensagens falsas enviadas por e-mail, SMS, redes sociais ou outros meios, que imitam comunicações legítimas de empresas conhecidas, como bancos, lojas ou órgãos do governo. Esses conteúdos costumam conter links que direcionam a vítima para sites falsos (muito parecidos com os verdadeiros), onde ela é induzida a fornecer suas informações pessoais.

## Documentação do projeto

#### Crie uma pasta, faça o comando

```http
  git clone "https://github.com/marcoskw/phishing-test.git"
```

Crie o ambiente virtual, abra e execute os requirements:

```http
  python -m venv venv
  venv/Scripts/activate
  pip install -r requirements.txt
```

Abra o arquivo, e utilize o link do servidor do Flask para capturar quem cairia em uma tentativa de phishing:

```http
  python servidor_phishing.py
```

O resultado, será um link .CSV onde terá:
```csv
DataHora,IP,Hostname,User-Agent
```