<?php 
 function datoAPI($array) {
  $url = 'https://graphql.datocms.com/';
  $token = '724e185138f7e236c7b8c842631b97';
  $data = array(
  'query' => "query {". $array ."}"
);

  $options = array(
      'http' => array(
      'method' => 'POST',
      'header' => 'Content-Type: application/json' . "\r\n" .
                  'Accept: application/json' . "\r\n" .
                  'Authorization: Bearer ' . $token . "\r\n",
      'content' => json_encode($data),
      )
);

  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  $response = json_decode($result, true);

  return $response;

  }

  function iterate ($array, $id) {
      foreach ($array as $arr) {
        // Verifica se o ID corresponde
        if ($arr["id"] == $id) {
            // Imprime o texto correspondente
            return $arr["text"];
            break;
        }
    }
  }
  function create_card_project($array) {
    foreach ($array as $arr) {
      echo "
      <!-- Card  -->
      <div class=\"card-project\" id=\"". $arr["id"] ."\">
      
        <div class=\"container-project-img\">
        
          <picture>
            <source media=\"(max-width: 705px)\" srcset=\"". $arr["imageMobilie"]["url"] ."\"
              type=\"image/". $arr["imageMobilie"]["format"] ."\">
            <img src=\"" . $arr["imageDesktop"]["url"] ."\" alt=\"" . $arr["imageDesktop"]["alt"] . "\"
              loading=\"lazy\">
          </picture>
          
        </div>
        
        <h3 class=\"title\">". $arr["title"] ."</h3>
        
        <p class=\"card-text-sub text-content\">
          ". $arr["technology"] ."
        </p>
        <p class=\"project-description text-content\">
          ". $arr["description"] ."
        </p>
        <p class=\"card-text-flex\">
          <a href=\"". $arr["urlRep"] ."\" target=\"_blank\" class=\"buttons\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 640 512\" width=\"24\" height=\"24\">
              <path fill=\"none\" d=\"M0 0h24v24H0z\"></path>
              <path fill=\"currentColor\"
                d=\"M392.8 1.2c-17-4.9-34.7 5-39.6 22l-128 448c-4.9 17 5 34.7 22 39.6s34.7-5 39.6-22l128-448c4.9-17-5-34.7-22-39.6zm80.6 120.1c-12.5 12.5-12.5 32.8 0 45.3L562.7 256l-89.4 89.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l112-112c12.5-12.5 12.5-32.8 0-45.3l-112-112c-12.5-12.5-32.8-12.5-45.3 0zm-306.7 0c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3l112 112c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256l89.4-89.4c12.5-12.5 12.5-32.8 0-45.3z\" />
            </svg>
            Código
          </a>

          <a href=\"". $arr["urlDeploy"] ."\" target=\"_blank\"
            class=\"buttons\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 640 512\" width=\"24\" height=\"24\">
              <path fill=\"none\ d=\"M0 0h24v24H0z\"></path>
              <path fill=\"currentColor\"
                d=\"M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z\" />
            </svg>
            Deploy
          </a>
        </p>
      </div>
      <!------------->";
    }
  }
  


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/projects.css">
  <link rel="shortcut icon" href="assets/favicon_io/favicon-32x32.png" type="image/x-icon">
  <title>Matheus M. Portfolio</title>
  <script src="script/index.js" type="module" defer></script>
  <script src="https://kit.fontawesome.com/42e847d6f9.js" crossorigin="anonymous" defer></script>

</head>

<body class="dark">

  <div class="container" id="loader">
    <div class="loader"></div>
    <div class="loader"></div>
    <div class="loader"></div>
  </div>

  <div id="container">
    <header class="visible">
      <div class="header-content width-content">
        <div class="icon-container">
          <a href="#" class="title hover-color">
            Matheus M.

          </a>

        </div>
        <nav class="social-nav">
          <ul>
            <li>
              <a href="#projects" class="link-nav title hover-color">Projetos</a>
            </li>
            <li>
              <span class="link-nav title hover-color" id="contactBtn">
                Fale comigo! <i class="fa-solid fa-envelope"></i>
              </span>
            </li>
          </ul>
          <div class="social-links">
            <a href="https://github.com/matheusmorenocf" target="_blank" class="title hover-color"><i
                class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/in/matheus-freitas-6373b7128/" target="_blank"
              class="title hover-color"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://www.instagram.com/morenocf01/" target="_blank" class="title hover-color"><i
                class="fa-brands fa-instagram"></i></a>
            <label class="switch title hover-color" for="theme">
              <input type="checkbox" id="theme">
              <i class="fa-solid fa-moon" id="switcher"></i>
            </label>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <section class="background">
        <div class="title-container width-content border-color">
          <div class="title-content">
            <h1 class="title typing-animation">
              <?php echo iterate(datoAPI('allTitles{text id}')['data']['allTitles'], '138605029')."<mark> ".
                         iterate(datoAPI('allTitles{text id}')['data']['allTitles'], '138605300')."</mark>"?>
            </h1>
            <p class="text-content">
              <?php echo iterate(datoAPI('allMains{text id}')['data']['allMains'], '138580368');?>
            </p>

            <p class="text-content">
              <?php echo iterate(datoAPI('allMains{text id}')['data']['allMains'], '138602867');?>
            </p>

            <a href="assets/doc/MATHEUS FREITAS.pdf" download="matheus-freitas-curriculo.pdf" class="buttons">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path fill="currentColor"
                  d="M1 14.5a6.496 6.496 0 0 1 3.064-5.519 8.001 8.001 0 0 1 15.872 0 6.5 6.5 0 0 1-2.936 12L7 21c-3.356-.274-6-3.078-6-6.5zm15.848 4.487a4.5 4.5 0 0 0 2.03-8.309l-.807-.503-.12-.942a6.001 6.001 0 0 0-11.903 0l-.12.942-.805.503a4.5 4.5 0 0 0 2.029 8.309l.173.013h9.35l.173-.013zM13 12h3l-4 5-4-5h3V8h2v4z">
                </path>
              </svg>
              Curriculo
            </a>
          </div>
          <div class="title-img-container">
            <?php echo "<img src=\"". datoAPI('mainImage{image {url id alt}}')['data']['mainImage']['image']['url'] ."\" alt=\"Matheus\">" ;?>
          </div>
        </div>
      </section>
      <section class="background">
        <div class="technology-container width-content" id="skills">
          <p class="text-content">
            <?php echo iterate(datoAPI('allMains{text id}')['data']['allMains'], '138606095');?>

          </p>
          <div class="list-technology">
            <ul>
              <li> <span class="technology title"><i class="fa-brands fa-html5"></i></span>
                <p class="title">HTML5</p>
              </li>
              <li> <span class="technology title"><i class="fa-brands fa-css3-alt"></i></span>
                <p class="title">CSS3</p>
              </li>
              <li> <span class="technology title"><i class="fa-brands fa-js"></i></span>
                <p class="title">Javascript</p>
              </li>
              <li> <span class="technology title"><i class="fa-brands fa-sass"></i></span>
                <p class="title">Sass</p>
              </li>
              <li> <span class="technology title"><i class="fa-brands fa-bootstrap"></i></span>
                <p class="title">Bootstrap</p>
              </li>
              <li> <span class="technology title"><i class="fa-brands fa-react"></i></span>
                <p class="title">React</p>
              </li>
              <li>
                <span class="technology title"><i class="fa-brands fa-git-alt"></i></span>
                <p class="title">Git</p>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <section class="background">
        <div class="projects-container width-content" id="projects">
          <div class="projects-title-content">
            <h2 class="title">Projetos</h2>

          </div>
          <p class="text-content">
            <?php echo iterate(datoAPI('allMains{text id}')['data']['allMains'], '138606105');?>
          </p>
          <p class="text-content">
            <?php echo iterate(datoAPI('allMains{text id}')['data']['allMains'], '138606095');?>
          </p>
          <div class="container-cards-projects">

            <?php 
            create_card_project(datoAPI('allProjects{id title description urlRep urlDeploy technology imageDesktop { url format alt } imageMobilie { url format alt } } ')['data']['allProjects'])
            
            ?>


            <!-- Card  -->

            <div class="see-more">
              <a href="projects.html" class="buttons">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path fill="currentColor"
                    d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                </svg>
                Ver mais
              </a>
            </div>
          </div>
        </div>
      </section>
      <section class="contact-container form-hidden">
        <div class="form-contact-container">
          <div class="row-form-title">
            <h3 class="color-form">Me envie um e-mail</h3>
            <i class="fa-sharp fa-solid fa-xmark color-form" id="close-form"></i>
          </div>
          <form action="https://api.staticforms.xyz/submit" method="post" id="contactMe" autocomplete="off">
            <div class="row-form">
              <label for="name" class="color-form">
                Nome:
              </label>
              <input type="text" name="name" placeholder="Seu nome..." required>
            </div>
            <div class="row-form">
              <label for="email" class="color-form">
                E-mail:
              </label>
              <input type="email" name="email" placeholder="Seu e-mail..." required>
            </div>
            <div class="row-form">
              <label for="name" class="color-form">
                Mensagem:
              </label>
              <textarea name="message" placeholder="Digite a mensagem..." rows="5" required></textarea>
            </div>
            <div class="row-form">
              <input type="submit" value="Enviar" class="btn-submit">
            </div>
            <input type="hidden" name="accessKey" value="1b88124b-3bc5-4f1d-a9e5-33aea7d9e7d7">
            <input type="hidden" name="redirectTo" value="https://matheusmorenocf.github.io/portfolio/index.html">
          </form>
          <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5571985244558" target="_blank" rel="nofollow"
            class="btn-wpp">
            <i class="fa-brands fa-whatsapp"></i>
            Whats App
          </a>
        </div>
      </section>
    </main>
    <footer class="background">
      <div class="footer-content">
        <div class="icon-container">
          <p class="text-content">Copyright © 2023 <a href="#" class="title hover-color">Matheus M.</a></p>
        </div>

        <div class="social-nav">
          <div class="social-links">
            <a href="https://github.com/matheusmorenocf" target="_blank" class="title hover-color"><i
                class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/in/matheus-freitas-6373b7128/" target="_blank"
              class="title hover-color"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://www.instagram.com/morenocf01/" target="_blank" class="title hover-color"><i
                class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>