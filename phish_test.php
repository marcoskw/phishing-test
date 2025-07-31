<?php
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$time = date("Y-m-d H:i:s");

// Salva no log
file_put_contents("logs.txt", "[$time] IP: $ip - Hostname: $hostname - User Agent: $user_agent\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Exatron</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
</head>
<body>
  <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <br><br>
        <br>
          <h1 style="color: red;">
            E se essa informação fosse um vírus ou tentativa de phishing?
          </h1>
          <p>
            Os ataques de phishing são geralmente realizados por meio de e-mails, mensagens de texto, chamadas telefônicas
            ou mensagens instantâneas, que parecem ser legítimos à primeira vista. Os golpistas usam técnicas de
            engenharia social para convencer as vítimas a fornecerem suas informações pessoais ou financeiras, muitas
            vezes alegando urgência ou ameaçando com consequências se as informações não forem fornecidas.

            É fundamental compreender a importância de cuidados sobre phishing e tomar medidas para se proteger contra
            essa ameaça. Aqui estão alguns motivos pelos quais os cuidados sobre phishing são essenciais:

            <ul>
              <li>
                <b>Proteção de informações pessoais: </b>
                As informações pessoais, como senhas, números de cartão de crédito, dados bancários e informações de
                identificação pessoal, são valiosas para os criminosos cibernéticos. Ao cair em um ataque de phishing,
                você pode inadvertidamente divulgar essas informações confidenciais, o que pode resultar em roubo de
                identidade, acesso não autorizado a contas e outras formas de fraude.
              </li>
              <li>
                <b>Proteção financeira:</b>
                Proteção da reputação: Se você cair em um ataque de phishing e divulgar informações
                confidenciais, isso pode afetar sua reputação. Por exemplo, se sua conta de mídia social for invadida,
                os criminosos cibernéticos podem postar mensagens falsas ou prejudiciais em seu nome, o que pode causar
                danos à sua reputação pessoal ou profissional.
              </li>
              <li>
                <b>Proteção da reputação:</b>
                Se você cair em um ataque de phishing e divulgar informações confidenciais, isso pode afetar sua reputação.
                Por exemplo, se sua conta de mídia social for invadida, os criminosos cibernéticos podem postar mensagens
                falsas ou prejudiciais em seu nome, o que pode causar danos à sua reputação pessoal ou profissional.
              </li>
              <li>
                <b>Proteção de dados empresariais:</b>
                O phishing não é apenas uma ameaça para indivíduos, mas também para empresas e organizações. Os ataques de
                phishing direcionados a funcionários podem levar a violações de dados, vazamento de informações confidenciais
                da empresa, prejuízos financeiros e danos à reputação da empresa.
              </li>
              <li>
                <b>Prevenção de outros tipos de ataques cibernéticos: </b>
                O phishing também pode ser usado como uma forma de entrada para outros tipos de ataques cibernéticos, como
                malware, ransomware e outros ataques avançados. Ao estar alerta contra o phishing, você pode ajudar a prevenir
                outros tipos de ataques cibernéticos que podem causar danos ainda maiores.
              </li>
            </ul>
          </p>
      </div>
    </div>
    <footer>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="{% static 'vendor/jquery/jquery.slim.min.js'%}"></script>
    <script src="{% static 'vendor/bootstrap/js/bootstrap.bundle.min.js'%}"></script>
  <script>
    fetch("log_user.php?username=" + encodeURIComponent(navigator.userAgent));
  </script>
</body>
</html>
