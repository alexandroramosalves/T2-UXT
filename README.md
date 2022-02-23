# AIMT-UXT
Conjunto de aplicações desenvolvidas para realizar a captura e análise de dados de interação entre usuários e interfaces web.

   
  ![Badge](https://img.shields.io/badge/PHP-7.0-information?style=flat&logo=PHP&logoColor=white&color=777BB4![Badge])  ![Badge](https://img.shields.io/badge/framework-%204.5.2-information?style=flat&logo=.NET&logoColor=white&color=512BD4)  ![Badge](https://img.shields.io/badge/%20-5.0-information?style=flat&logo=.NET&logoColor=white&color=512BD4) ![Badge](https://img.shields.io/badge/VS%20Code-1.60-information?style=flat&logo=Visual-Studio-Code&logoColor=white&color=007ACC)
 # T2-UXT: Tracking Techniques User eXperience Tool
Repositório destinado a abrigar o código-fonte de todas as aplicações relacionadas ao ecossistema da T2-UXT.

## Tabela de conteúdos

*  [Pre Requisitos](#pre-requisitos)
*  [Módulos](#Módulos)
* * [Cliente](#cliente)
* * * [Rastreamento de mouse](#rastreamento-de-mouse)
* * * [Rastreamento ocular](#rastreamento-ocular)
* * * [Keylogging](#keylogging)
* * * [Think aloud](#Transcrição-de-voz)
* * [Armazenamento](#armazenamento)
* * [Visualizador](#Visualizador)
* * * [Reprodução de sessão](#reproducao-de-sessao)
* * * [Rastreamento ocular](#rastreamento-ocular)
* * * [Análise de métricas](#analise-de-metricas)
*  [Tecnologias](#tecnologias)

 ## Pré-requisitos

📃 Para a abertura dos projetos contidos neste repositório, estabelecem-se os seguintes requisitos:

*  [.NET 5](https://dotnet.microsoft.com/download/dotnet/5.0)
*  [Servidor PHP](https://www.apachefriends.org/index.html)
*  [Visual Studio Code](https://code.visualstudio.com/download)
*  [Google Chrome](https://www.google.com/chrome/)

## Módulos
A T2-UXT é constituída de 3 módulos: Cliente, Servidor de armazenamento, e visualizador. Os três módulos são responsáveis respectivamente por coletar dados de interação; organizar e armazenar; e prover formas de visualizar os dados capturados. Os módulos são descritos a seguir.
### Cliente
Desenvolvido como uma extensão do navegador Google Chrome utilizando Javascript, este módulo é responsável por capturar - do lado cliente - as interações dos desenvolvedores, no papel de usuários do portal, a partir das técnicas de rastreamento do mouse, do olho e do teclado, além de transcrição de fala. As versões do módulo cliente encontram-se no diretório `clients`.


#### Rastreamento de mouse
A captura de interações do mouse contempla 4 tipos de interação:
* Movimento
* Clique
* Pausa
#### Rastreamento ocular
O rastreamento ocular é realizado por meio de uma versão modificada do [WebGazer](https://github.com/brownhci/WebGazer) (Copyright © 2016-2021, Brown HCI Group).
#### Keylogging
A extensão também pode capturar entradas de teclado, registrando a digitação de caracteres.
#### Transcrição de voz
Utilizando o [WebKit Voice Recognition](https://developer.mozilla.org/en-US/docs/Web/API/SpeechRecognition), o módulo cliente é capaz de capturar voz, transcrever e enviar como entrada de texto.
### Armazenamento
Desenvolvido em PHP, o módulo de armazenamento é o responsável por receber as requisições contendo dados de rastreamento de interações, e em seguida organizá-los e armazená-los. O código-fonte pode ser encontrado no diretório `server`.
### Visualizador
Aplicação desktop desenvolvida em C#/WPF, utilizando .NET Framework 4.5, é responsável por permitir a visualização dos dados armazenados no módulo anterior. Possui três recursos de visualização, descritos a seguir.
#### Reprodução de sessão
Este componente, ou submódulo, reproduz individualmente cada amostra capturada, permitindo a visualização quadro-a-quadro dos movimentos do desenvolvedor registrados a partir das técnicas de rastreamento domouse e do olho. Para a composição da visualização, o módulo utiliza captura de telas registradas durante a interação, e sobre essas posiciona pontos e linhas contínuas representando o caminho percorrido e ações realizadas pelo usuário.
#### Mapa de calor
Este componente produz um mapa de calor para o rastreamento do mouse e do olho. É possível a geração de mapas individuais ou de grupo de desenvolvedores. As representações são constituídas de capturas de tela sobrepostas e encontradas nos dados capturados, de forma a reproduzir a tela da aplicação. Este componente permite a detecção de áreas de interesse, desvios de atenção, zonas não visualizadas, entre outras possibilidades.
#### Análise de métricas
Este componente gera uma planilha que consolida os valores das métricas utilizadas na captura das interações dos desenvolvedores. A tabela gerada pode ser exportada para utilização em outras ferramentas como, por exemplo, modelos de inteligência artificial e de classificação. 
#### Download do estudo
The procedure:
1 - Access the link -> https://t2uxtweb.azurewebsites.net/downloadresearch.php
2 - Click on the "Create Zip" button
3 - Click on the "Download" button
After the steps above, the download of the zip from the Samples folder will start.
## Tecnologias
* [C#](https://docs.microsoft.com/pt-br/dotnet/csharp/)
* [.NET 5](https://docs.microsoft.com/pt-br/dotnet/)
* [JavaScript](https://www.javascript.com/)
* [PHP](https://php.net/)
