from flask import Flask, request, send_file
from datetime import datetime
import socket
import csv
import os

app = Flask(__name__)

LOG_FILE = 'acessos.csv'

# Cria o arquivo de log se não existir
if not os.path.exists(LOG_FILE):
    with open(LOG_FILE, 'w', newline='', encoding='utf-8') as f:
        writer = csv.writer(f)
        writer.writerow(['DataHora', 'IP', 'Hostname', 'User-Agent'])

@app.route('/')
def registrar_acesso():
    ip = request.remote_addr
    user_agent = request.headers.get('User-Agent')
    try:
        hostname = socket.gethostbyaddr(ip)[0]
    except:
        hostname = 'Desconhecido'

    datahora = datetime.now().strftime('%Y-%m-%d %H:%M:%S')

    # Registra no CSV
    with open(LOG_FILE, 'a', newline='', encoding='utf-8') as f:
        writer = csv.writer(f)
        writer.writerow([datahora, ip, hostname, user_agent])

    print(f"[{datahora}] Acesso de {ip} ({hostname}) - {user_agent}")
    
    # Página simples
    return '''
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>⚠️ Alerta de Segurança - Exatron</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <style>
    body {
      background-color: #000;
      color: #ff4c4c;
      font-family: 'Courier New', Courier, monospace;
      margin: 0;
      padding: 0;
      text-align: center;
      animation: flicker 1s infinite alternate;
    }

    @keyframes flicker {
      from { opacity: 1; }
      to { opacity: 0.9; }
    }

    .container {
      padding: 50px 20px;
    }

    h1 {
      font-size: 2.5em;
      animation: glitch 1s infinite;
    }

    @keyframes glitch {
      0% { text-shadow: 2px 0 red, -2px 0 cyan; }
      20% { text-shadow: -2px 0 red, 2px 0 cyan; }
      40% { text-shadow: 2px 2px red, -2px -2px cyan; }
      60% { text-shadow: -2px -2px red, 2px 2px cyan; }
      80% { text-shadow: 2px 0 red, -2px 0 cyan; }
      100% { text-shadow: -2px 0 red, 2px 0 cyan; }
    }

    ul {
      text-align: left;
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.8;
    }

    li {
      margin-bottom: 15px;
    }

    .warning-icon {
      font-size: 4em;
      color: red;
      animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    .logo {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">

    <div class="warning-icon">⚠️</div>

    <h1>E se essa informação fosse um vírus ou tentativa de phishing?</h1>

    <p><strong>Você clicou em um link suspeito.</strong> Esse tipo de comportamento pode comprometer sistemas inteiros e expor dados confidenciais.</p>

    <ul>
      <li><b>Proteção de informações pessoais:</b> Evite fornecer senhas, cartões ou documentos pessoais.</li>
      <li><b>Proteção financeira:</b> Links maliciosos podem roubar seus dados bancários.</li>
      <li><b>Proteção da reputação:</b> Sua identidade pode ser usada para enganar colegas e parceiros.</li>
      <li><b>Proteção de dados empresariais:</b> Um clique pode comprometer toda a rede da empresa.</li>
      <li><b>Prevenção de ataques maiores:</b> Phishing é porta de entrada para ransomware e espionagem digital.</li>
    </ul>

    <p style="color: white; font-size: 0.9em;">Este é apenas um teste de conscientização de segurança cibernética.<br>Fique sempre atento a links suspeitos.</p>
  </div>

  <script>
    fetch("log_user.php?username=" + encodeURIComponent(navigator.userAgent));
  </script>
</body>
</html>
    '''

@app.route('/log')
def baixar_log():
    return send_file(LOG_FILE, as_attachment=True)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
